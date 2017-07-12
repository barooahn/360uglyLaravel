<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;
use Session;

class ItemController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Order::find(Session::get('order_id'));
        return view('/items.create')->with('order', $order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|min:6',
            'height' => 'required|digits_between:1,40',
            'length' => 'required|digits_between:1,40',
            'width' => 'required|digits_between:1,40',
            'weight' => 'required|digits_between:1,5'
        ]);

        $item = new Item($request->all());
        $item->order_id = Session::get('order_id');
        $item->price = Item::$ONE;
        $item-> save();
        $order = Order::find($item->order_id);
        $item->price = Item::priceOrder($order);
        if(!$order->post){
            Item::costCollection($order);
        }
        Order::orderPrice($order->id);
        return redirect('items/create');
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
        $item = Item::find($id);
        $order = $item->order;
        $item->delete();
        Item::costCollection($order);
        Item::priceOrder($order);
        Order::orderPrice($order->id);
        return redirect()->back();
    }
}
