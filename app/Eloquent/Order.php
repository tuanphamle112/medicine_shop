<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETE = 'complete';
    const STATUS_CANCEL = 'cancel';
    const STATUS_REFUND = 'refund';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'user_id',
        'prescription_id',
        'user_email',
        'user_display_name',
    ];

    public static function getOptionStatus()
    {
        return [
            self::STATUS_PENDING => __('Pending'),
            self::STATUS_COMPLETE => __('Complete'),
            self::STATUS_CANCEL => __('Cancel'),
            self::STATUS_REFUND => __('Refund'),
        ];
    }

    public function getOrderAddress()
    {
        return $this->hasMany(OrderAddress::class, 'order_id');
    }

    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
