<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    
    const TYPE_BILLING = 'billing';
    const TYPE_SHIPPING = 'shipping';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_email',
        'user_display_name',
        'user_address',
        'user_gender',
        'user_phone',
    ];

    public function scopeGetBillingOrderAddress($query, $orderId)
    {
        return $query->where('order_id', $orderId)->where('address_type', self::TYPE_BILLING);
    }

    public function scopeGetShippingOrderAddress($query, $orderId)
    {
        return $query->where('order_id', $orderId)->where('address_type', self::TYPE_SHIPPING);
    }

    public function getOrder()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
