<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home() {
    	$user = Auth::user();
    	return view('user/home',compact('user')); 
    }

    public function process() {
    	$user = Auth::user();
    	return view('user/process',compact('user')); 
    }

	public function download() {
		$user = Auth::user();
    	return view('user/download',compact('user'));  
    }


}
