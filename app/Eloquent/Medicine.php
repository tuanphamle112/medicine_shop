<?php

namespace App\Eloquent;

class Medicine extends AbstractEloquent
{
    const ALLOWED_BUY = 1;
    const NOT_ALLOWED_BUY = 0;
    
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
        'quantity',
        'allowed_buy',
        'unit',
        'guide',
        'ingredient',
        'made_in',
        'unintended_effect',
        'contraindications',
    ];

    public static function getOptionAllowedBuy()
    {
        return [
            self::NOT_ALLOWED_BUY => __('Not allowed to buy'),
            self::ALLOWED_BUY => __('Allowed buy'),
        ];
    }

    public function getAllCategories()
    {
        return $this->belongsToMany(Medicine::class, 'category_medicine_related', 'medicine_id', 'category_id');
    }

    public function getAllImages()
    {
        return $this->hasMany(Image::class, 'medicine_id');
    }

    public function getAllRateMedicines()
    {
        return $this->hasMany(RateMedicine::class, 'medicine_id');
    }

    public function getAllComments()
    {
        return $this->hasMany(Comment::class, 'medicine_id');
    }
    
    public function getCreatedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
