<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Download;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DownloadController extends Controller
{
      /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => 'download']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', '<>', 'pay2')->get();
        return view('downloads/index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($item_id)
    {
        return view('downloads/create')->with('item_id', $item_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $download = new Download($request->all());
        $item = Item::findorFail($download->item_id);
        $order = $item->order;
        $user = $order->user;
        $user_name = substr($user->email, 0, strrpos($user->email, '@'));
        $download->name = str_replace(' ', '_', $item->name). sprintf('%04d', $order->id).sprintf('%04d', $item->id); 
        $download->path = $user_name.'/'.$order->id.'/'.$download->name; 

        $files = $request->file('files');

        if($request->hasFile('files'))
        {
            $file_number = 0; 
            foreach ($files as $file) {
                $filename = $download->name . sprintf('%02d', $file_number).'.jpg';
                $file->storeAs($download->path, $filename, 'public');
                $file_number++;
            }
        }

        // set orientation
        $file = $request->file('files')[0];

        list($width, $height) = getimagesize($file);

        if( $width > $height) {
             $download->portrait = 0;
        } else {
            $download->portrait = 1;
        }
        // end orientaion

        $download->frames = count($files) -1;
        $download->digits = 2;

        $download -> save();

        Download::writeToFile($download);

        if(Download::checkAllItems($order)){
           $order->updateStatus('pay2');
        }

        return redirect()->action('DownloadController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download($id)
    {
        $download = Download::find($id);
        $path = 'storage/'.$download->path;
        $path = str_replace($download->name, '', $path);
        if (File::exists($path.$download->name.'_with_jquery.zip'))
        {
            $path = $path.$download->name.'_with_jquery.zip';
        }else {
            $path = $path.$download->name.'_without_jquery.zip';
        }
        return view('downloads/download')->with('path', $path);
    }
}
