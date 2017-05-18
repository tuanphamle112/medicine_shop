<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class MedicinesList extends Controller
{
    public function showSubbar($bar) 
    {
        $medicine = Category::where('link', $bar)-> first();  
        $sMedicines = Category::where('parent_id', $medicine->id)-> get();
        return view('medicine', [
            'medicine'=> $medicine,
            'sMedicines'=> $sMedicines,
            'bar'=> $bar
        ]);
    }

    public function showLink($bar, $link) 
    {
        $medicine = Category::where('link', $bar)-> first();  
        $title = Category::where('link', $link)-> first();
        $sMedicines = Category::where('parent_id', $medicine->id)-> get();
        return view('subcate', [
            'sMedicines'=> $sMedicines,
            'link'=> $link,
            'title'=> $title,
            'bar'=> $bar,
            'medicine'=> $medicine
        ]);
    }

}
