<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkMedicine extends Model
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
        return $this->belongsTo(User::class);
    }
    public function getMedicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
