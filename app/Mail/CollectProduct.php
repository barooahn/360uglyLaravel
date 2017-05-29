<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CollectProduct extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $user;
    public $items;
    public $address;

    public function __construct($order, $user, $items, $address)
    {
        $this->order = $order->toArray();
        $this->items = $items->toArray();
        $this->user = $user->toArray();
        if ($address != null){
            $this->address = $address->toArray();
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.collectproduct')
        ->with(
            ['order', $this->order],
            ['user', $this->user],
            ['items', $this->items],
            ['address', $this->address]
        );
    }
}
