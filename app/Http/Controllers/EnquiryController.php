<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use Illuminate\Support\Facades\Auth;

class EnquiryController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = $request->get('type');

        $enquiry = new Enquiry($request->all());
        if($type == 'order'){
            $enquiry-> order = 1;
        } else {
            $enquiry-> order = 0;
        }
        $enquiry -> save();

        if($type == 'order'){
        //     if(Auth::user()){
        //         return view('address')->with('item', $enquiry->item);
        //     }else {
        //         return view('auth.loginRegister')
        //             ->with('name', $enquiry->name)
        //             ->with('email', $enquiry->email);
        //     }
            return view('address')->with('item', $enquiry->item);
        }else {
            return view('enquiry');
        }
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

    public function address()
    {
        return view('address');
    }

    public function item()
    {
        return view('item');
    }
}
