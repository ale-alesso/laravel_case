<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Order has been Shipped')
            ->view('emails.orders.shipped')
            ->with([
                'orderId' => $this->order->id,
                'orderAmount' => bcdiv($this->order->quantity * $this->order->product->price, 1, 2),
                'productName' => $this->order->product->name,
            ]);
    }
}
