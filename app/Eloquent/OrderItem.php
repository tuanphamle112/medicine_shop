<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'medicine_id',
        'medicine_name',
        'price',
        'qty_ordered',
        'row_total',
    ];
}
