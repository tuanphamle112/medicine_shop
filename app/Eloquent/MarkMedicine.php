<?php

namespace App\Eloquent;

class MarkMedicine extends AbstractEloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'mark_medicine';

    protected $fillable = [
        'medicine_id',
        'user_id',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function getMedicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    public function scopeGetMarkByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
