<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    
    const PATH_MEDICINE = 'uploads/medicines/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'symptom',
        'short_describer',
        'detail',
        'user_id',
        'avg_rate',
        'total_rate',
        'related_medicine',
    ];
    public function getAllCategories()
    {
        return $this->belongsToMany('App\Category','medicine_id','category_id');
    }
    public function getAllImages()
    {
        return $this->hasMany('App\Image');
    }
    public function getAllRateMedicines()
    {
        return $this->hasMany('App\RateMedicine');
    }
    public function getAllComments()
    {
        return $this->hasMany('App\Comment');
    }
    public function getCreatedUser()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
