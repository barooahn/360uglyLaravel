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

    public static function makeDirectory ($item)
    {
        $user = $item->order->user;
        $user_name = substr($user->email, 0, strrpos($user->email, '@'));
        $path = './uploads/'.$user_name.'/'.$item->order->id.'/'.$item->name;
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true);
        }
        
    }

}
