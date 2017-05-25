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

    protected $table = 'category_medicine_related';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function getAllMedicines()
    {
        return $this->belongsTo('App\Medicine');
    }
    public function getAllCategories()
    {
        return $this->belongsTo('App\Category');
    }
}
