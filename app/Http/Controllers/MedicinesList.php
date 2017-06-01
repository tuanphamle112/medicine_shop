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

        $catedoryIDs = [$medicine->id];
        foreach ($sMedicines as $subCategory) {
            $catedoryIDs[] = $subCategory->id;
        }
        $allMedicines = CategoryMedicineRelated::whereIn('category_id', $catedoryIDs)->get();
        $medicineIDs = [];
        foreach ($allMedicines as $value) {
            $medicineIDs[$value->medicine_id] = $value->medicine_id;
        }

        $items = Medicine::whereIn('id', $medicineIDs)->orderBy('id', 'desc')->paginate(12);
        
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
        $items = Category::find($subMedicine->id)->getAllMedicines()->paginate(12);;
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
