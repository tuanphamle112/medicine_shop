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

        $medicine = Category::ShowBar($bar);
        $sMedicines = Category::ShowSBar($medicine->id);
        $items = Category::ShowItem($medicine->id);
        
        return view('medicine', [
            'medicine'=> $medicine,
            'sMedicines'=> $sMedicines,
            'bar'=> $bar,
            'items'=> $items
            ]);
    }
    public function showLink($bar, $link)
    {
        $medicine = Category::ShowBar($bar);
        $subMedicine = Category::ShowSub($link);
        $items = Category::ShowItem($subMedicine->id);
        $sMedicines = Category::ShowSBar($medicine->id);

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
