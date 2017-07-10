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

    public static function checkDelivery($order)
    {
        if($order->status == 'delivery_paid'){
            return true;
        }
        return false;
    }

    public static function writeToFile($download)
        {

        $frames = $download->frames;
        $name = $download->name;
        $filename = $download->name .'.js';
        $order = $download->item->order;
        $path = $download->path;
        $path = str_replace($download->name, '', $path);
        $orientation = $download->portrait;
        $orientationModifier = $orientation === 1 ? '*' : '/';

        $file = "var frames = SpriteSpin.sourceArray('[name]/[name]{frame}.jpg', {
    frame: [0, [frames]],
    digits: 2
});

var width = $('.[name]').width() - 10;
var height = width {$orientationModifier} 1.5;
var spin = $('.[name]');
// initialise spritespin
spin.spritespin({
      source: frames,
        width: width,
        height: height,
        frameTime: 120
});";

        $file = str_replace ('[name]', $name, $file);
        $file = str_replace ('[frames]', $frames, $file);


        Storage::put('/public/'.$path .'/'. $filename, $file, 'public');

        $orientationStyle = $orientation === 1? 'height:600px; width:400px;' : 'height:400px; width:600px;';
        $webpage = "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"UTF-8\">
    <title>title</title>
    <script src=\"randj.js\"></script>
  </head>
  <body>
    <div style=\"{$orientationStyle}\" class=\"[name]\"></div>
    <script src=\"[name].js\"></script>
  </body>

</html>";

        $webpage = str_replace ('[name]', $name, $webpage);

        Storage::put('/public/'.$path .'/'. 'exampleWebpage.html', $webpage, 'public');

        Download::makeZip($download);
    }

    public static function makeZip($download, $jq = true)
    {
        
        $zipper = new \Chumper\Zipper\Zipper;

        $path = 'storage/'.$download->path;
        $path = str_replace($download->name, '', $path);
        if($jq){
            $zipper->make($path.$download->name.'_with_jquery.zip')->add($path);
            $zipper->make($path.$download->name.'_with_jquery.zip')->add('storage/randj');
        } else {
            $zipper->make($path.$download->name.'_without_jquery.zip')->add($path);
            $zipper->make($path.$download->name.'_without_jquery.zip')->add('storage/ronly');
        }
        $zipper->close();

    }
}
