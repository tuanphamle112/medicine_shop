<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Eloquent\Category;
use App\Eloquent\Image;
use App\Eloquent\Medicine;
use App\Eloquent\RateMedicine;
use App\Eloquent\MarkMedicine;
use App\Eloquent\Comment;
use Auth;
use Response;

class DetailMedicinesController extends Controller
{
    public function index($id)
    {
        $medicine = Medicine::with('getAllImages')->find($id);

        if (!$medicine) {
            return redirect()->route('welcome');
        }
        $check_marked = [];
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $medicine_id = $medicine->id;
            $check_marked = MarkMedicine::checkMarkMedicine($user_id, $medicine_id)->first();
        }

        return view('frontend.medicine.detail', [
            'medicine' => $medicine,
            'check_marked' => $check_marked
            ]);
    }
    public function avg(Request $request, $id) {
        $user_id = Auth::user()->id;
        $check_rated = RateMedicine::checkRated($user_id, $id);

        $showD= Medicine::medicineItem($id);

        // caculator rating point
        $reliable = $request->input('reliable');
        $quality = $request->input('quality');
        $avg = ($reliable + $quality)/2;
        
        if (empty($check_rated->id)) {
            $rate_medicines = new RateMedicine;
            $rate_medicines->user_id = $user_id;
            $rate_medicines->medicine_id = $id;
            $rate_medicines->point_rate = $avg;
            $rate_medicines->save();
        }

        $collectionRate = RateMedicine::where('medicine_id', $id)->get();

        $avgMedicine = $collectionRate->avg('point_rate');
        $countTotalRate = count($collectionRate);

        $showD->avg_rate = $avgMedicine;
        $showD->total_rate = $countTotalRate;
        $showD->save();

        return redirect()
        ->route('detail', [$id, str_slug($showD->name)])
        ->with('check_rated', $check_rated);
    }

    public function editRating(Request $request, $id) {
        $user_id = Auth::user()->id;

        $reliable = $request->input('reliable');
        $quality = $request->input('quality');
        $avg = ($reliable + $quality)/2;

        RateMedicine::where('user_id', $user_id)->where('medicine_id', $id)->update(['point_rate' => $avg]);

        $medicine = Medicine::find($id);

        $collectionRate = RateMedicine::where('medicine_id', $id)->get();

        $avgMedicine = $collectionRate->avg('point_rate');
        $countTotalRate = count($collectionRate);

        $medicine->avg_rate = $avgMedicine;
        $medicine->total_rate = $countTotalRate;
        $medicine->save();

        return redirect()->route('detail', [$id, str_slug($medicine->name)]);
    }
    public function addToBox(Request $request) {
        $medicine_id = $request->medicine_id;
        $user_id = Auth::user()->id;
       
        $check_added = MarkMedicine::checkMarkMedicine($user_id, $medicine_id)->first();
       
       
        if (!empty($check_added->id))
        {
            $check_added->delete();

            return __('<i class="fa fa-heart-o" aria-hidden="true"></i>');
        }

        $mark_medicines = new MarkMedicine;
        $mark_medicines->user_id = $user_id;
        $mark_medicines->medicine_id= $medicine_id;
        $mark_medicines->save();

        return __(' <i class="fa fa-heart" aria-hidden="true"></i>');
    }

    public function jsonCommentList(Request $request)
    {
        $user_id = 0;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }

        $medicineId = $request->medicineId;

        $comments = Comment::with('getUser')
        ->where('medicine_id', $medicineId)
        ->where('status', Comment::STATUS_ENABLE)
        ->orderBy('id', 'desc')
        ->paginate(5);

        $data['comments'] = $comments;
        $data['currentUserId'] = $user_id;

        return Response::json($data);
    }

    public function addComment(Request $request)
    {
        $user_id = Auth::user()->id;
        $medicine_id = $request->medicineId;
        $content = $request->content;

        $comment = new Comment;
        $comment->user_id = $user_id;
        $comment->medicine_id = $medicine_id;
        $comment->content = $content;
        $comment->save();

        $comments = Comment::with('getUser')
            ->where('medicine_id', $medicine_id)
            ->where('status', Comment::STATUS_ENABLE)
            ->orderBy('id', 'desc')->paginate(5);

        $data['comments'] = $comments;
        $data['currentUserId'] = $user_id;

        return Response::json($data);
    }
}
