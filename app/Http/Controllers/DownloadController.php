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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('downloads/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('downloads/create');
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
        $item = Item::find($download->item_id);
        $order = $item->order;
        $user = $order->user;
        $user_name = substr($user->email, 0, strrpos($user->email, '@'));
        $download->name = str_replace(' ', '_', $item->name).'000'.$order->id.'000'.$item->id; 
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

        $download->frames = count($files) -1;
        $download->digits = 2;

        $download -> save();

        Download::writeToFile($download);

        if(Download::checkAllItems($order)){
            Order::updateStatus($user->id, 'await');
        }

        return view('downloads/index');
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
}
