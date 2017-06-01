<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Medicine;
use App\Image;
use App\Category;
use App\MarkMedicine;
use App\InforWebsite;
use App\Helpers\Helper;
use Session;
use Response;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newestProducts = Medicine::orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::whereNotNull('parent_id')->get();
        
        return view('welcome', [
            'newestProducts'=> $newestProducts,
            'categories'=> $categories
            ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $items = Medicine::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('symptom', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')->paginate(8);

        $items->withPath('/search?keyword=' . $keyword);
        
        return view('frontend.search.result', ['items' => $items, 'keyword' => $keyword]);
    }

    public function jsonSearch(Request $request)
    {
        $keyword = $request->keyword;
        $medicines = Medicine::select(['name', 'id'])
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('symptom', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')->get();
        
        return Response::json($medicines);
    }

    public function markMedicineIndex()
    {
        $marks = MarkMedicine::with('getMedicine')
            ->getMarkByUser(Auth::user()->id)
            ->orderBy('id', 'desc')->paginate(10);

        return view('frontend.mark-medicine.list', ['marks' => $marks]);
    }

    public function markMedicineDestroy($id)
    {
        $mark = MarkMedicine::find($id);

        if (!$mark || ($mark->user_id != Auth::user()->id)) {
            return redirect()->route('frontend.mark-medicine.index');
        }

        DB::beginTransaction();
        try {
            $mark->delete();
            DB::commit();
            Helper::addMessageFlashFrontendSession(__('Success'), __('Delete successfully!'), 'success');
        } catch (Exception $e) {
            DB::rollBack();
            Helper::addMessageFlashFrontendSession(__('Error'), $e->getMessage(), 'danger');
        }

        return redirect()->route('frontend.mark-medicine.index');
    }

    public function sendEmail(Request $request)
    {

        $info = InforWebsite::getInfoWebsite()->first();

        $data['firstname'] = $request->firstname;
        $data['email'] = $request->email;
        $data['content'] = $request->message;
        Mail::send('emails.contact', $data, function($message) use ($info, $data) {
            $message->from($data['email'], $info->title);
            $message->subject($info->title);
            $message->to('tai.dinhvan2702@gmail.com');
        });
        Session::flash('sent_email_contact', 'true');

        return redirect()->route('welcome');
    }
    
}
