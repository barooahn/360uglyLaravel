<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\CollectProduct;

class ConfirmController extends Controller
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
     * Display a confirm view.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm()
    {
        $user = Auth::user();
        $order = Order::find(Session::get('order_id'));
        $items = $order->items;
        $address = $user->addresses->last();
        Mail::to($user)->queue(new CollectProduct($order, $user, $items, $address));
        return view('confirm')->with('user', $user)->with('order', $order);
    }
}
