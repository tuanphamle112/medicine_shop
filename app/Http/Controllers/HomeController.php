<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;
use App\Image;
use App\Category;
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
}
