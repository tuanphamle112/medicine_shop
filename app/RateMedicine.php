<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    ];
    public function scopecheckRated($query, $user_id, $id) {
        $check_rated = $query->where('user_id', $user_id)->where('medicine_id', $id)->first();

        return $check_rated;
    }
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getMedicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}
