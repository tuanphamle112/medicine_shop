<?php

namespace App\Eloquent;

class RequestMedicine extends AbstractEloquent
{
    
    const STATUS_NOT_SEEN = 1;
    const STATUS_WATCHED = 2;
    const STATUS_HAS_RESPONDED = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'medicine_name',
        'short_describer',
        'respone_admin',
        'status',
        'user_id',
    ];

    public static function getOptionStatus()
    {
        return [
            self::STATUS_NOT_SEEN => __('Not seen'),
            self::STATUS_WATCHED => __('Watched'),
            self::STATUS_HAS_RESPONDED => __('Has responded'),
        ];
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getItemPrescription()
    {
        return $this->belongsTo(ItemPrescription::class, 'item_prescription_id');
    }

    public function getAllImages()
    {
        return $this->hasMany(Image::class, 'request_medicines_id');
    }
}
