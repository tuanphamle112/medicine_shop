<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryMedicineRelated;
use App\Medicine;
class MedicinesList extends Controller
{
    public function showSubbar($bar) 
    {
        $medicine = Category::where('link', $bar)-> first();  
        $sMedicines = Category::where('parent_id', $medicine->id)-> get();
        $items = Category::find($medicine->id)->getAllMedicines;
        return view('medicine', [
            'medicine'=> $medicine,
            'sMedicines'=> $sMedicines,
            'bar'=> $bar,
            'items'=> $items
            ]);
    }
    public function showLink($bar, $link) 
    {
        $medicine = Category::where('link', $bar)-> first();  
        $subMedicine = Category::where('link', $link)-> first();
        $items = Category::find($subMedicine->id)->getAllMedicines;

        $sMedicines = Category::where('parent_id', $medicine->id)-> get();
        return view('subcate', [
            'sMedicines'=> $sMedicines,
            'link'=> $link,
            'subMedicine'=> $subMedicine,
            'bar'=> $bar,
            'medicine'=> $medicine,
            'items'=> $items
            ]);
    }

}
