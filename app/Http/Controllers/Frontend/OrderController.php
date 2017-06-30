<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eloquent\Prescription;
use App\Eloquent\ItemPrescription;
use App\Eloquent\InforWebsite;
use App\Eloquent\Order;
use App\Eloquent\Medicine;
use App\Eloquent\OrderItem;
use App\Eloquent\OrderAddress;
use App\Helpers\Helper;
use App\Mail\OrderEmail;
use Session;
use Auth;
use DB;
use Mail;

class OrderController extends Controller
{
    protected $prescription;
    protected $itemPrescription;
    protected $order;
    protected $medicine;

    public function __construct(
        Prescription $prescription,
        Order $order,
        ItemPrescription $itemPrescription,
        Medicine $medicine
    ){
        $this->prescription = $prescription;
        $this->order = $order;
        $this->itemPrescription = $itemPrescription;
        $this->medicine = $medicine;
    }

    public function convertToOrder($prescriptionId)
    {    
        $prescription = $this->prescription
            ->with('getUser', 'getAllItemPrescriptions.getMedicine.getAllImages', 'getDoctor')
            ->find($prescriptionId);
        
        if (!$prescription || ($prescription->user_id != Auth::user()->id)) {
            return redirect()->route('frontend.prescription.index');
        }

        return view('frontend.order.convert-order', compact(['prescription']));
    }

    public function checkout()
    {
        $carts = Helper::getCarts();
        if (!$carts) {
            Helper::addMessageFlashFrontendSession(__('Error'), __('No products to order!'), 'danger');
            
            return redirect()->back();
        }

        $allowOrdered = Helper::getSetupAllowOrder();
        $items = []; $error = false;
        foreach ($carts as $itemId => $itemData) {
            $items[$itemId]['item'] = $this->itemPrescription
                ->with('getPrescription', 'getMedicine.getAllImages')->find($itemId);
            $items[$itemId]['cart'] = $itemData;

            $prescription = $items[$itemId]['item']->getPrescription;
            $medicine = $items[$itemId]['item']->getMedicine;

            // Check order when enough quantity
            if (!$allowOrdered && $medicine->quantity < $itemData['qty_ordered']) {
                $error = true;
                $message = __('Only extant :qty :unit :medicine, not enough for you to order!', [
                    'qty' => $medicine->quantity,
                    'unit' => $medicine->unit,
                    'medicine' => $medicine->name,
                ]);
                Helper::addMessageFlashFrontendSession(__('Error'), $message, 'danger');
            }

            // Check order over quantity 
            if (config('custom.order.max_qty_ordered') < $itemData['qty_ordered']) {
                $error = true;
                $message = __('You are only allowed to place a maximum of :maxnumber for each medicines.', [
                    'maxnumber' => config('custom.order.max_qty_ordered'),
                ]);
                $message .= __('The medicine :name you have placed exceeds the quantity!', [
                    'name' => $medicine->name,
                ]);
                Helper::addMessageFlashFrontendSession(__('Error'), $message, 'danger');
            }
        }

        if ($error) {
            return redirect()->back();
        }

        return view('frontend.order.checkout', compact(['items', 'prescription']));
    }

    public function checkoutStore(Request $request)
    {

        $carts = Helper::getCarts();
        if (!$carts) {
            Helper::addMessageFlashFrontendSession(__('Error'), __('No products to order!'), 'danger');
            
            return redirect()->back();
        }

        $order = $this->order;
        $order->prescription_id = $request->prescription_id;
        $order->user_id = Auth::user()->id;
        $order->user_email = $request->user_email;
        $order->user_display_name = $request->user_display_name;
        $order->status = Order::STATUS_PENDING;
        
        DB::beginTransaction();
        try {
            
            $order->save();

            $dataBilling['user_email'] = $request->billing_email;
            $dataBilling['user_display_name'] = $request->billing_display_name;
            $dataBilling['user_address'] = $request->billing_address;
            $dataBilling['user_phone'] = $request->billing_phone;
            Helper::saveOrderAddress($order->id, $dataBilling, OrderAddress::TYPE_BILLING);

            $dataShipping['user_email'] = $request->shipping_email;
            $dataShipping['user_display_name'] = $request->shipping_display_name;
            $dataShipping['user_address'] = $request->shipping_address;
            $dataShipping['user_phone'] = $request->shipping_phone;
            Helper::saveOrderAddress($order->id, $dataShipping, OrderAddress::TYPE_SHIPPING);

            $total_items = 0; $grand_total = 0;
            foreach ($carts as $itemId => $itemData) {
                $total_items += $itemData['qty_ordered'];
                $grand_total += $itemData['row_total'];

                $orderItem = new OrderItem;
                $orderItem->order_id = $order->id;
                $orderItem->medicine_id = $itemData['medicine_id'];
                $orderItem->medicine_name = $itemData['medicine_name'];
                $orderItem->price = $itemData['price'];
                $orderItem->qty_ordered = $itemData['qty_ordered'];
                $orderItem->row_total = $itemData['row_total'];
                $orderItem->save();

                Helper::changeQuantityMedicine($itemData['medicine_id'], $itemData['qty_ordered']);
            }

            $order->grand_total = $grand_total;
            $order->total_items = $total_items;
            $order->save();

            DB::commit();
            
            Mail::to($request->user_email)->send(new OrderEmail($order->id));

            Helper::addMessageFlashFrontendSession(__('Success'), __('Created order successfully!'), 'success');
            Helper::emptyCarts();
            Session::flash('frontend_order_success', $order);

            return redirect()->route('frontend.order.success');
        } catch (Exception $e) {
            DB::rollBack();
            Helper::addMessageFlashFrontendSession(__('Error'), $e->getMessage(), 'danger');
            
            return redirect()->back();
        }        
    }

    public function orderSuccess()
    {
        $order = Session::get('frontend_order_success', []);
        if (!$order){
            return redirect()->route('welcome');
        }

        return view('frontend.order.success', compact(['order']));
    }
}
