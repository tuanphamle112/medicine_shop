<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class RequestPrescription extends Model
{
    
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
