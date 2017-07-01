<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\User;

class AddressController extends Controller
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
        if(count(Auth::user()->addresses) > 0){
            $address = Auth::user()->addresses->last();
        } else {
            $address = null;
        }
        return view('/addresses.create')->with('address', $address);
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
        $order = $user->orders->last();

        $order->updateStatus('pay1');

        $address = new Address($request->all());
        $address -> user_id = $user->id;
        $address -> save();
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
        $address = Address::findOrFail($id);
        return view('addresses.edit')->with('address', $address);
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
        $address = Address::findOrFail($id);
        $user = Auth::user();
        $address -> update($request->all());
        return view('user/home')->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $user = Auth::user();
        $address->delete();
        return view('user/home')->with('user', $user);
    }

    public function useExisting($user_id)
    {
        $user = User::find($user_id);
        $order = $user->orders->last();
        $order->updateStatus('pay1');
        return redirect('items/create');
    }

    public function postSelf($order_id)
    {
        Order::postSelf(Order::find($order_id));
        return redirect('items/create');
    }
}
