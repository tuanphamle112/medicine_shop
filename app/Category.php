<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Medicine;

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
    public function scopeShowBar($query, $bar)
    {
        $medicine = $query->where('link', $bar)->first();

        return $medicine;
    }
    public function scopeShowSBar($query, $id)
    {
        $sMedicines = $query->where('parent_id', $id)->get();

        return $sMedicines;
    }
    public function scopeShowItem($query, $id)
    {
        $items = $query->find($id)->getAllMedicines;
        return $items;
    }
    public function scopeShowSub($query, $link)
    {
        $subMedicine = $query->where('link', $link)->first();

        return $subMedicine;
    }
    public function getAllMedicines()
    {
        return $this->belongsToMany(Medicine::class, 'category_medicine_related', 'category_id', 'medicine_id');
    }
    public function getSubCategories()
    {
        return $this->hasOne(Category::class, 'parent_id');
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
            ->map(function ($category) {
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
