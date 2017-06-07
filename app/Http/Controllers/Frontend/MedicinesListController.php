<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Eloquent\Category;
use App\Eloquent\CategoryMedicineRelated;
use App\Eloquent\Medicine;

class MedicinesListController extends Controller
{
    public function showParentCategories($linkParentCategory)
    {
        $parentCategory = Category::getParentCategoryByLink($linkParentCategory)->first();

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
        
        return view('frontend.categories.parent-category', [
            'parentCategory' => $parentCategory,
            'subCategories' => $subCategories,
            'linkParentCategory' => $linkParentCategory,
            'items' => $items,
        ]);
    }
    public function showSubCategory($parentLink, $subLink)
    {
        $parentCategory = Category::getParentCategoryByLink($parentLink)->first();

        $subCategories = Category::getSubCategoryByParentId($parentCategory->id)->get();

        $selectSubCate = Category::getSubCaregoryByLink($subLink, $parentCategory->id)
            ->with('getAllMedicines.getAllImages')
            ->first();

        $items = $selectSubCate->getAllMedicines()->paginate(12);

        return view('frontend.categories.sub-category', [
            'subCategories' => $subCategories,
            'parentCategory' => $parentCategory,
            'selectSubCate' => $selectSubCate,
            'parentLink' => $parentLink,
            'items' => $items,
        ]);
    }
}
