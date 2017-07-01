<?php

namespace App\Eloquent;

use App\Eloquent\Medicine;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    const PATH_CATEGORIES = 'uploads/categories/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
        'link',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function getAllMedicines()
    {
        return $this->belongsToMany(Medicine::class, 'category_medicine_related', 'category_id', 'medicine_id');
    }

    public function getSubCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getParentFromSubCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function scopeGetParentCategoryByLink($query, $link)
    {
        return $query->where('link', $link)->whereNull('parent_id');
    }

    public function scopeGetSubCategoryByParentId($query, $parent_id)
    {
        return $query->where('parent_id', $parent_id);
    }

    public function scopeGetSubCaregoryByLink($query, $link, $parent_id)
    {
        return $query->where('link', $link)->where('parent_id', $parent_id);
    }
    
    public function scopeAllParentCategories($query)
    {
        return $query->whereNull('parent_id');
    }

    public function getOptionParentCategories()
    {
        $categories = $this->whereNull('parent_id')->get();
        $result = [];
        foreach ($categories as $category) {
            $result[$category->id] = $category->name;
        }

       	return $result;
    }

    public function getAllOptionCategories()
    {
        $parentCategories = $this->whereNull('parent_id')->with('getSubCategories')->get();

        $result = [];
        foreach ($parentCategories as $parentCategory) {
            $result[$parentCategory->id] =  $parentCategory->name;
            
            foreach ($parentCategory->getSubCategories as $subCategory) {
                $result[$subCategory->id] = '-- '. $subCategory->name;
            }
        }

        return $result;
    }
}
