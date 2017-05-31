<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Received extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $items;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $user, $items)
    {
        $this->order = $order->toArray();
        $this->items = $items->toArray();
        $this->user = $user->toArray();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.received')
        ->with(
            ['order', $this->order],
            ['user', $this->user],
            ['items', $this->items]
        );
    }
}
