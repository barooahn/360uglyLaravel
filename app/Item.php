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

    public static function priceOrder($orderId)
    {
        $order = Order::find($orderId);
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
            $item->save();
        }
    }
}
