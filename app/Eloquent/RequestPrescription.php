<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class RequestPrescription extends Model
{
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
}
