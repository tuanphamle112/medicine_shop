<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Image;
use App\Medicine;
use App\RateMedicine;
use App\MarkMedicine;
use App\Comment;
use Auth;
use Response;

class DetailMedicinesController extends Controller
{
    public function index($id)
    {
        $showD= Medicine::find($id);
        if (!$showD){
            return redirect()->route('welcome');
        }

        $imageD=Image::where('medicine_id', $showD->id)->first();
        if (Auth::check())
            {
                $user_id = Auth::user()->id;
                $check_rated = RateMedicine::checkRated($user_id, $id);

                return view('medicineDetail', [
                    'showD'=>$showD,
                    'imageD'=>$imageD,
                    'id'=>$id,
                    'check_rated'=>$check_rated
                ]);
            }
        else
            {
                return view('medicineDetail', [
                    'showD'=>$showD,
                    'imageD'=>$imageD,
                    'id'=>$id,
                ]);
            }
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
        RateMedicine::where('user_id', $user_id)
            ->where('medicine_id', $id)
            ->update(['point_rate' => $avg]);

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
        $user_id = $request->user_id;
        $medicine_name = Medicine::find($medicine_id);
        $check_added = MarkMedicine::where('user_id',$user_id)->where('medicine_id',$medicine_id)->first();

        if(!empty($check_added->id))
        {
            return __('This medicine already in your box!');
        }
        else
        {
            $mark_medicines = new MarkMedicine;
            $mark_medicines->user_id = $user_id;
            $mark_medicines->medicine_id= $medicine_id;
            $mark_medicines->save();

            return $medicine_name->name . __(' has been added');
        }

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
        $comments->currentUserId = $user_id;

        $data['comments'] = $comments;
        $data['currentUserId'] = $user_id;

        return Response::json($data);
    }
}
