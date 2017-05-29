<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Session;

class OrderController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->name != $request->name  || $user->email != $request->email ){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }
        $order = new Order($request->all());
        $order -> user_id = Auth::user()->id;
        $order -> save();
        Session::put('order_id', $order->id);
        return redirect('addresses/create');
        //return view('/address.create')->with('item', $order->item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$order = Order::find($id);
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
        Order::destroy($id);
    }

    public static function clean()
    {

        $orders = Order::where('user_id', Auth::user()->id)->get();
        
        foreach ($orders as $order) 
        {
            if($order->items->count() < 1) 
            {
                Order::destroy($order->id);
            }
        }
        return view('welcome');
    }

    public function arrived($order_id)
    {
        $order = Order::find($order_id);
        $order->updateStatus('process');
        return redirect()->back();
    }
}
