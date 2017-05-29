<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name_prescription',
        'frequency',
        'guide',
        'status',
        'name_doctor',
    ];

    public function getAllItemPrescriptions()
    {
        return $this->hasMany(ItemPrescription::class, 'prescription_id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function scopeGetPrescriptionsByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
