<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Image;
use App\Medicine;
use App\RateMedicine;
use Auth;
class DetailMedicinesController extends Controller
{
    public function index($id)
    {   
        $showD= Medicine::where('id', $id)->first();
        $imageD=Image::where('medicine_id', $showD->id)->first();
        $user_id = Auth::user()->id;
        $check_rated = RateMedicine::where('user_id',$user_id)->where('medicine_id',$id)->first();
        // dd($check_rated);die;
        return view('medicineDetail', [
            'showD'=>$showD,
            'imageD'=>$imageD,
            'id'=>$id,
            'check_rated'=>$check_rated
        ]);
    }
    public function avg(Request $request, $id) {
        $user_id = Auth::user()->id;
        $check_rated = RateMedicine::where('user_id',$user_id)->where('medicine_id',$id)->first();
        $showD= Medicine::where('id', $id)->first();
        $imageD=Image::where('medicine_id', $showD->id)->first();

        $reliable = $request->input('reliable');
        $quality = $request->input('quality');
        $avg = ($reliable + $quality)/2;

        if(!isset($check_rated)) {
            $rate_medicines = new RateMedicine;
            $rate_medicines->user_id = $user_id;
            $rate_medicines->medicine_id = $id;
            $rate_medicines->point_rate = $avg;
            $rate_medicines->save();
            $total_rate = ($showD->total_rate + $avg)/2;
        }

        
        // var_dump($total_rate);die;

        return view('medicineDetail',[
                'showD'=>$showD,
                'imageD'=>$imageD,
                'id'=>$id,
                'avg'=>$avg,
                'check_rated'=>$check_rated
            ]);
    }
    public function editRating(Request $request, $id) {
        $user_id = Auth::user()->id;
        $check_rated = RateMedicine::where('user_id',$user_id)->where('medicine_id',$id)->first();
        $showD= Medicine::where('id', $id)->first();
        $imageD=Image::where('medicine_id', $showD->id)->first();

        $reliable = $request->input('reliable');
        $quality = $request->input('quality');
        $avg = ($reliable + $quality)/2;
        // var_dump($id);die;
        RateMedicine::where('user_id',$user_id)
        ->where('medicine_id', $id)
        ->update(['point_rate'=>$avg]);

        return view('medicineDetail',[
                'showD'=>$showD,
                'imageD'=>$imageD,
                'id'=>$id,
                'avg'=>$avg,
                'check_rated'=>$check_rated
            ]);
    }
}
