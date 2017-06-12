<?php

namespace App\Eloquent;

class RelatedDoctorRequest extends AbstractEloquent
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id',
        'request_prescription_id',
    ];

    public function getDoctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function getRequestPrescription()
    {
        return $this->belongsTo(RequestPrescription::class, 'request_prescription_id');
    }
}
