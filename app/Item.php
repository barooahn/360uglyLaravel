<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use App\Order;

class Item extends Model
{
    public static $ONE = 97;
    protected static $TWO = 77;
    protected static $FIVE = 57;
    protected static $DELIVERY = 5;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'height', 'length', 'width', 'weight', 'name', 'return'
    ];
    protected $guarded = ['price'];

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

    public static function priceOrder($order)
    {
        $pricePerItem = 0;
        if(count($order->items) > 0){
            $count = count($order->items);
            switch ($count) {
                case ($count==1):
                    $pricePerItem = Item::$ONE;
                    Item::updatePricing($order, Item::$ONE);
                    break;
                case ($count>1 && $count<5):
                    $pricePerItem = Item::$TWO;
                    Item::updatePricing($order, Item::$TWO);
                    break;
                case ($count>=5):
                    $pricePerItem = Item::$FIVE;
                    Item::updatePricing($order, Item::$FIVE);
                    break;
                default:
                    $pricePerItem = 0;
                    break;
            }
        }
        return $pricePerItem;
    }

    public static function updatePricing($order, $price)
    {
        foreach ($order->items as $item) {
            if($item->return == 1)
            {
                $item->price = $price + Item::$DELIVERY;
            }else {
                $item->price = $price;
            }
            $item->update();
        }
    }

    public static function costCollection($order)

    {
        $cost = 0;
        $height = 0;
        $width = 0;
        $length = 0;
        $weight = 0;
        foreach ($order->items as $item) {
            $height += $item->height;
            $width += $item->width;
            $length += $item->length;
            $weight += $item->weight;
        }

        switch ($height) {
            case $height > 40 && $height < 80:
                $cost += 7;
                break;    
            case $height >= 80:
                $cost += 9;
                break;
            default:
                break;
        }
        switch ($width) {
            case $width > 40 && $width < 80:
                $cost += 7;
                break;    
            case $width >= 80:
                $cost += 9;
                break;
            default:
                break;
        }
        switch ($length) {
            case $length > 40 && $length < 80:
                $cost += 7;
                break;    
            case $length >= 80:
                $cost += 9;
                break;
            default:
                break;
        } 
        switch ($weight) {
            case $weight > 2 && $weight < 5:
                $cost += 7;
                break; 
            case $weight >= 5 && $weight < 10:
                $cost += 9;
                break;    
            case $weight >= 10:
                $cost += 12;
                break;
            default:
                break;
        }   

             

        $order->delivery_price = $cost;
        $order->update();
        return $cost;
    }
}
