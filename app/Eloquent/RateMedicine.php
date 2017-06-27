<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\User;

class RateMedicine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'medicine_id',
        'point_rate',
        'title',
        'content',
    ];
    public function scopeGetRateId($query, $medicine_id)
    {
        return $query->where('medicine_id', $medicine_id);
    }

    public function scopeStarNumber($query, $id, $point_rate) 
    {
        return $query->where('medicine_id', $id)->where('point_rate', $point_rate);    
    }
    
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getMedicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    public function scopeCheckRated($query, $user_id, $id) 
    {
        return $query->where('user_id', $user_id)->where('medicine_id', $id);
    }
}
