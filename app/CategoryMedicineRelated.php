<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryMedicineRelated extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'medicine_id',
    ];

    public function getAllMedicines()
    {
        return $this->belongsTo('App\Medicine');
    }
    public function getAllCategories()
    {
        return $this->belongsTo('App\Category');
    }
}
