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
    ];
    public function getAllMedicines()
    {
    	return $this->belongsToMany('App\Medicine','category_medicine_related','category_id','medicine_id');
    }
}
