<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eloquent\Prescription;
use App\Eloquent\Medicine;
use App\Eloquent\ItemPrescription;
use App\Eloquent\RequestMedicine;
use App\Helpers\Helper;
use Response;
use Auth;
use DB;

class PrescriptionController extends Controller
{

    protected $prescription;

    public function __construct(Prescription $prescription)
    {
        $this->prescription = $prescription;
    }

    public function index()
    {
        return view('frontend.prescription.prescriptions-list');
    }

    public function getJsonList()
    {
        $prescription = $this->prescription
            ->with('getUser', 'getAllItemPrescriptions', 'getDoctor')
            ->getPrescriptionsByUser(Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(config('model.prescription.items_limit'));
        
        return  Response::json($prescription);
    }

    public function editPrescription($id)
    {
        $prescription = $this->prescription
            ->with('getUser', 'getAllItemPrescriptions', 'getDoctor')
            ->find($id);
            
        if (!$prescription || ($prescription->user_id != Auth::user()->id)) {
            return redirect()->route('frontend.prescription.index');
        }
        $data['prescription'] = $prescription;

        return view('frontend.prescription.prescription-edit', ['data' => $data]);
    }

    public function updatePrescription(Request $request, $id)
    {
        $prescription = $this->prescription->find($id);

        if (!$prescription || ($prescription->user_id != Auth::user()->id)) {
            return redirect()->route('frontend.prescription.index');
        }

        $itemIDs = is_array($request->item_id) ? $request->item_id : [];
        $medicinesName = is_array($request->name_medicine) ? $request->name_medicine : [];
        $medicineIds = is_array($request->medicine_id) ? $request->medicine_id : [];
        $amounts = is_array($request->amount) ? $request->amount : [];
        $shortDescribers = is_array($request->short_describer) ? $request->short_describer : [];

        DB::beginTransaction();
        try {

            // Delete Item
            $itemsPrescription = $prescription->getAllItemPrescriptions;
            foreach ($itemsPrescription as $itemPrescription) {
                if (in_array($itemPrescription->id, $itemIDs)) {
                    continue;
                }
                
                $requestMedicine = $itemPrescription->getRequestMedicine;
                if ($requestMedicine) {
                    $requestMedicine->delete();
                }
                $itemPrescription->delete();
            }

            // Add New Item
            foreach ($itemIDs as $key => $itemID) {
                if ($itemID) {
                    continue;
                }

                $item = new ItemPrescription;
                $item->prescription_id = $prescription->id;
                $item->medicine_id = $medicineIds[$key];
                $item->name_medicine = $medicinesName[$key];
                $item->amount = $amounts[$key];
                if (!$medicineIds[$key]) {
                    $item->status = ItemPrescription::STATUS_OUT_STORE;
                }

                $item->save();

                if ($item->id && !$medicineIds[$key]) {
                    $requestMedicine = new RequestMedicine;
                    $requestMedicine->item_prescription_id = $item->id;
                    $requestMedicine->medicine_name = $medicinesName[$key];
                    $requestMedicine->short_describer = $shortDescribers[$key];
                    $requestMedicine->save();
                }
            }

            $prescription->fill($request->all());
            $prescription->save();

            $message = __('Save successfully!');
            Helper::addMessageFlashFrontendSession(__('Success'), $message, 'success');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Helper::addMessageFlashFrontendSession(__('Error'), $e->getMessage(), 'danger');
        }

        return redirect()->route('frontend.prescription.index');
    }

    public function addNewPrescription()
    {
        return view('frontend.prescription.prescription-addnew');
    }

    public function storeNewPrescription(Request $request)
    {
        $prescription = $this->prescription;
        $prescription->fill($request->all());
        $prescription->user_id = Auth::user()->id;

        DB::beginTransaction();
        try {
            $prescription->save();

            $medicinesName = is_array($request->name_medicine) ? $request->name_medicine : [];
            $medicineIds = is_array($request->medicine_id) ? $request->medicine_id : [];
            $amounts = is_array($request->amount) ? $request->amount : [];
            $shortDescribers = is_array($request->short_describer) ? $request->short_describer : [];

            foreach ($medicineIds as $key => $medicineId) {
                $item = new ItemPrescription;
                $item->prescription_id = $prescription->id;
                $item->medicine_id = $medicineId;
                $item->name_medicine = $medicinesName[$key];
                $item->amount = $amounts[$key];
                if (!$medicineId) {
                    $item->status = ItemPrescription::STATUS_OUT_STORE;
                }

                $item->save();

                if ($item->id && !$medicineId) {
                    $requestMedicine = new RequestMedicine;
                    $requestMedicine->item_prescription_id = $item->id;
                    $requestMedicine->medicine_name = $medicinesName[$key];
                    $requestMedicine->short_describer = $shortDescribers[$key];
                    $requestMedicine->save();
                }
            }

            DB::commit();
            $message = __('Add new prescription successfully!');
            Helper::addMessageFlashFrontendSession(__('Success'), $message, 'success');
        } catch (Exception $e) {
            DB::rollBack();
            Helper::addMessageFlashFrontendSession(__('Error'), $e->getMessage(), 'danger');
        }

        return redirect()->route('frontend.prescription.index');
    }

    public function jsonSeachMedicines(Request $request)
    {
        $keyword = $request->keyword;
        $medicines = Medicine::select(['name', 'id'])
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('symptom', 'like', '%' . $keyword . '%')
            ->take(config('model.prescription.autocomple_limit'))
            ->orderBy('id', 'desc')->get();
        
        return Response::json($medicines);
    }

    public function destroyPrescription($id)
    {
        $prescription = $this->prescription->find($id);

        if (!$prescription || ($prescription->user_id != Auth::user()->id)) {
            return redirect()->route('frontend.prescription.index');
        }

        DB::beginTransaction();
        try {

            // Delete Item
            $itemsPrescription = $prescription->getAllItemPrescriptions;
            foreach ($itemsPrescription as $itemPrescription) {
                $itemPrescription->delete();
            }

            $prescription->delete();
            DB::commit();
            $message = __('Delete prescription :name successfully!', ['name' => $prescription->name_prescription]);
            Helper::addMessageFlashFrontendSession(__('Success'), $message, 'success');
        } catch (Exception $e) {
            DB::rollBack();
            Helper::addMessageFlashFrontendSession(__('Error'), $e->getMessage(), 'danger');
        }

        return redirect()->route('frontend.prescription.index');
    }
}
