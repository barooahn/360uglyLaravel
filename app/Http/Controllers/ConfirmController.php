<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Order;

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
        return view('confirm')->with('user', $user)->with('order', $order);
    }
}
