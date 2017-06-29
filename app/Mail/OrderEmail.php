<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Eloquent\Order;
use App\Eloquent\OrderAddress;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $orderId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = Order::with('getOrderItems')->find($this->orderId);
        $address['billing'] = OrderAddress::getBillingOrderAddress($this->orderId)->first();
        $address['shipping'] = OrderAddress::getShippingOrderAddress($this->orderId)->first();
        return $this->from(config('custom.email.from'), config('custom.email.from_name'))
            ->subject(__('Created order successfully!'))
            ->view('emails.orders.create-order')
            ->with([
                'order' => $order,
                'address' => $address,
            ]);
    }
}
