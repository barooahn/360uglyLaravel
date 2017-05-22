<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zipper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Download extends Model
{
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'name', 'path', 'frames', 'digits'
    ];
    
    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    // check if all items on order are complete return bool
    public static function checkAllItems($order)
    {
        $items = $order->items;
        $count = 0;
        if(count($items) > 0){
            foreach ($items as $item) 
            {
                if ($item->download) 
                {
                    $count++;
                }
            }
        }
        return $check = count($items) == $count ? true : false;
    }

    public static function writeToFile($download)
        {

        $frames = $download->frames;
        $name = $download->name;
        $filename = $download->name .'.js';
        $order = $download->item->order;
        $path = $download->path;
        $path = str_replace($download->name, '', $path);

        $file = "var frames = SpriteSpin.sourceArray('[name]/[name]{frame}.jpg', {
    frame: [0, [frames]],
    digits: 2
});

var width = $('.[name]').width() - 10;
var height = width / 1.5;
var spin = $('.[name]');
// initialise spritespin
spin.spritespin({
      source: frames,
        width: width,
        height: height,
        frameTime: 120
});
spin.bind(\"onLoad\", function() {
    $('.loader').css({
        opacity: 1,
        display: \"none\"
    }).animate({
        opacity: 0
    }, 'slow');
});";

        $file = str_replace ('[name]', $name, $file);
        $file = str_replace ('[frames]', $frames, $file);

        Storage::put('/public/'.$path .'/'. $filename, $file, 'public');

        Download::makeZip($download);
    }

    public static function makeZip($download, $jq = true)
    {
        
        $zipper = new \Chumper\Zipper\Zipper;

        $path = 'storage/'.$download->path;
        $path = str_replace($download->name, '', $path);
        if($jq == true){
            $zipper->make($path.$download->name.'_with_jquery.zip')->add($path);
            $zipper->make($path.$download->name.'_with_jquery.zip')->add('storage/randj');
        } else {
            $zipper->make($path.$download->name.'_without_jquery.zip')->add($path);
            $zipper->make($path.$download->name.'_without_jquery.zip')->add('storage/ronly');
        }
        $zipper->close();

    }
}
