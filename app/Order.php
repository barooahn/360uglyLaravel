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
        'item', 'paid', 'phone', 'message'
    ];

     /**
     * Get the items for the order.
     */
    public function item()
    {
        return $this->hasMany('App\Item');
    }

    public function enquiry()
    {
        return $this->belongsTo('App\Enquiry');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
