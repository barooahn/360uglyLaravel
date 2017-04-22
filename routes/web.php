<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');
Route::post('/enquiry', 'EnquiryController@store')->middleware('auth');
Route::get('/order', 'OrderController@create')->middleware('auth');
Route::post('/order', 'OrderController@store')->middleware('auth');
Route::get('/address', 'AddressController@create')->middleware('auth');
Route::post('/address', 'AddressController@store')->middleware('auth');
Route::get('/item', 'ItemController@create')->middleware('auth');
Route::post('/item', 'ItemController@show')->middleware('auth');
