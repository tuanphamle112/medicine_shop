<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class RequestPrescription extends Model
{
    const STATUS_NEW = 0;
    const STATUS_WATCHECD = 1;
    const STATUS_RESPONSE = 2;
    
    const PATH_REQUEST = 'uploads/request-prescription/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'describer',
    ];
    
    public function getOptionStatus()
    {
        return [
            self::STATUS_NEW => __('Not seen'),
            self::STATUS_WATCHECD => __('Watched'),
            self::STATUS_RESPONSE => __('Has responded'),
        ];
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getAllImages()
    {
        return $this->hasMany(Image::class, 'request_prescription_id');
    }

    public function getAllPrescription()
    {
        return $this->hasMany(Prescription::class, 'request_prescription_id');
    }

    public function scopeGetRequestByUser($query ,$user_id)
    {
        return $query->where('user_id', $user_id);
    }
}
