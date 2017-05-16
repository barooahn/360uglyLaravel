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

    public static function updateStatus($user_id, $status)
    {
        $order = Order::where('user_id', $user_id)->orderBy('created_at', 'desc')->first();
        $order->status = $status;
        $order->save();
    }
}
