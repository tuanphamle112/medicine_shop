<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category;
use App\Image;

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
        'price',
    ];
    public function scopemedicineItem($query, $id) {
        $showD= $query->where('id', $id)->first();

        return $showD;
    }
    public function scopemedicineImage($query, $id) {
        $imageD= $query->where('id', $id)->getAllImages;
        // dd($imageD);
        return $imageD;
    }
    public function getAllCategories()
    {
        return $this->belongsToMany(Medicine::class, 'category_medicine_related', 'medicine_id', 'category_id');
    }
    public function getAllImages()
    {
        return $this->hasMany(Image::class);
    }
    public function getAllRateMedicines()
    {
        return $this->hasMany(RateMedicine::class);
    }
    public function getAllComments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getCreatedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
