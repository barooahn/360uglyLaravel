<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'message'
    ];

     /**
     * Get the items for the order.
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function updateStatus($status)
    {
        $this->status = $status;
        $this->update();
    }

    public static function orderPrice($orderId)
    {
        $order = Order::find($orderId);
        $items = $order->items;
        $price = 0;
        foreach ($items as $item) {
            $price += $item->price;
        }
        $order->total_price = $price;
        $order->update(); 
        return $price;
    }

    public static function deliveryPrice($orderId)
    {
        $order = Order::find($orderId);
        $delivery = $order->delivery_price;
        return $delivery;
    }



    public static function postSelf($order)
    {
        $order->post = 1;
        $order->update();
    }

    public function deliveryDiscount($orderId)
    {
        $order = Order::find($orderId);
        $items = $order->items;

        $count = $items->count();

        if ($count == 1)
        {
            $item = $items->first();
            $item->price = $item->price - $order->delivery_price;
            $item->update();
        }

        if ($count>1) {
            $item = $items->last();
            $item->price = $item->price - $order->delivery_price;
            $item->update();
        }

        return $item->price;

    }
}
