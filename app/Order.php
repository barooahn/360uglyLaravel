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
        'paid', 'phone', 'message'
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
}
