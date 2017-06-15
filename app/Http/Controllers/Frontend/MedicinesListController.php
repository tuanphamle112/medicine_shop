<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Eloquent\Category;
use App\Eloquent\CategoryMedicineRelated;
use App\Eloquent\Medicine;

class MedicinesListController extends Controller
{
    public function showParentCategories($parentLink)
    {
        $parentCategory = Category::getParentCategoryByLink($parentLink)->first();

        $subCategories = Category::getSubCategoryByParentId($parentCategory->id)->get();

        $categoryIDs = [$parentCategory->id];
        foreach ($subCategories as $subCategory) {
            $categoryIDs[] = $subCategory->id;
        }
        
        $allMedicines = CategoryMedicineRelated::whereIn('category_id', $categoryIDs)->get();
        $medicineIDs = [];
        foreach ($allMedicines as $value) {
            $medicineIDs[$value->medicine_id] = $value->medicine_id;
        }

        $items = Medicine::whereIn('id', $medicineIDs)
            ->with('getAllImages')
            ->orderBy('id', 'desc')->paginate(12);

        $ItemSlideInCategories =Medicine::orderBy('id', 'desc')
            ->take(12)
            ->get();

        $ItemSlideInCategoriesArr = [];
        foreach ($ItemSlideInCategories as $ItemSlideInCategory) {
            $ItemSlideInCategoriesArr[] = $ItemSlideInCategory->id;
        }
        $SlideInCategoriesArrChunk = array_chunk($ItemSlideInCategoriesArr, 2);
        // dd($SlideInCategoriesArrChunk);
        return view('frontend.categories.parent-category', [
            'parentCategory' => $parentCategory,
            'subCategories' => $subCategories,
            'parentLink' => $parentLink,
            'items' => $items,
            'ItemSlideInCategories'=> $ItemSlideInCategories,
            'SlideInCategoriesArrChunk'=> $SlideInCategoriesArrChunk
        ]);
    }
    public function showSubCategory($parentLink, $subLink)
    {
        $parentCategory = Category::getParentCategoryByLink($parentLink)->first();

        $subCategories = Category::getSubCategoryByParentId($parentCategory->id)->get();

        $selectSubCate = Category::getSubCaregoryByLink($subLink, $parentCategory->id)
            ->with('getAllMedicines.getAllImages')
            ->first();
        // dd($selectSubCate);
        $items = $selectSubCate->getAllMedicines()->paginate(12);

        $ItemSlideInCategories =Medicine::orderBy('id', 'desc')
            ->take(12)
            ->get();

        $ItemSlideInCategoriesArr = [];
        foreach ($ItemSlideInCategories as $ItemSlideInCategory) {
            $ItemSlideInCategoriesArr[] = $ItemSlideInCategory->id;
        }
        $SlideInCategoriesArrChunk = array_chunk($ItemSlideInCategoriesArr, 2);

        return view('frontend.categories.sub-category', [
            'subCategories' => $subCategories,
            'parentCategory' => $parentCategory,
            'selectSubCate' => $selectSubCate,
            'subLink' => $subLink,
            'parentLink' => $parentLink,
            'items' => $items,
            'SlideInCategoriesArrChunk' => $SlideInCategoriesArrChunk
        ]);
    }
}
