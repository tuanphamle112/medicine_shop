<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Eloquent\Medicine;
use App\Eloquent\Image;
use App\Eloquent\Category;
use App\Eloquent\MarkMedicine;
use App\Eloquent\InforWebsite;
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
        $subCategories = Category::with('getParentFromSubCategory')->whereNotNull('parent_id')->get();
        
        return view('frontend.home.index', compact(['newestProducts', 'subCategories']));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $items = Medicine::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('symptom', 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->paginate(config('model.medicine.result_limit'));

        $items->withPath('/search?keyword=' . $keyword);
        
        return view('frontend.search.result', compact(['items' => $items, 'keyword' => $keyword]));
    }

    public function jsonSearch(Request $request)
    {
        $keyword = $request->keyword;
        $medicines = Medicine::select(['name', 'id'])
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('symptom', 'like', '%' . $keyword . '%')
            ->take(config('model.medicine.autocomple_limit'))
            ->orderBy('id', 'desc')->get();
        
        return Response::json($medicines);
    }

    public function markMedicineIndex()
    {
        $marks = MarkMedicine::with('getMedicine.getAllImages')
            ->with('getMedicine.getAllRateMedicines')
            ->with('getMedicine.getAllComments')
            ->getMarkByUser(Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(config('model.mark_medicine.items_limit'));

        return view('frontend.mark-medicine.list', compact(['marks']));
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
