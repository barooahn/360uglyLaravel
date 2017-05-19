<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Item extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'height', 'length', 'width', 'weight', 'name',
    ];

     /**
     * Get the order for the item.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function download()
    {
        return $this->hasOne('App\Download');
    }
}
