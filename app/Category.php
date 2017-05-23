<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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

    public function getSubCategories()
    {
        return $this->hasOne('App\Category', 'parent_id');
    }

    public function getOptionParentCategories()
    {
    	$categories = $this->where('parent_id', null)->get();
    	$result = [];
    	foreach ($categories as $category) {
    		$result[$category->id] = $category->name;
    	}

    	return $result;
    }

    public function getAllOptionCategories()
    {
        $parentCategories = $this->where('parent_id', null)
            ->with('getSubCategories')
            ->get()
            ->map(function($category) {
                $category->subCategories = $category->where('parent_id', $category->id)->get();
                return $category;
            });

        $result = [];
        foreach ($parentCategories as $parentCategory) {
            $result[$parentCategory->id] =  $parentCategory->name;
            
            foreach ($parentCategory->subCategories as $subCategory) {
                $result[$subCategory->id] = '-- '. $subCategory->name;
            }
        }

        return $result;
    }
}
