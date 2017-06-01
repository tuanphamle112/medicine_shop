<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Image;
use App\Medicine;
use App\RateMedicine;
use App\MarkMedicine;
use Auth;

class DetailMedicinesController extends Controller
{
    public function index($id)
    {
        $showD= Medicine::medicineItem($id);
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
        // dd($check_rated);
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
        // var_dump($countTotalRate);die;
        return redirect()->route('detail', [
            'id' => $id,
            str_slug($showD->name),
            ])
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
            return 'This medicine already in your box';
        }
        else
        {
            $mark_medicines = new MarkMedicine;
            $mark_medicines->user_id = $user_id;
            $mark_medicines->medicine_id= $medicine_id;
            $mark_medicines->save();

            return $medicine_name->name . ' has been added';
        }

    }
}
