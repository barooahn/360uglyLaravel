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
Route::get('/options', function () {
    return view('options');
});

Auth::routes();


Route::get('clean', 'OrderController@clean');
Route::get('home', 'UserController@home');
Route::get('user/home', 'UserController@home');
Route::get('user/process', 'UserController@process');
Route::get('user/download', 'UserController@download');
Route::post('/enquiry', 'EnquiryController@store')->middleware('auth');
// Route::get('/order', 'OrderController@create')->middleware('auth');
// Route::post('/order', 'OrderController@store')->middleware('auth');
//Route::get('/address', 'AddressController@create')->middleware('auth');
// Route::post('/address', 'AddressController@store')->middleware('auth');
// Route::get('/item', 'ItemController@create')->middleware('auth');
// Route::post('/item', 'ItemController@store')->middleware('auth');
// Route::get('item/{id}/delete', ['as' => 'item.delete', 'uses' => 'ItemController@destroy'])->middleware('auth');
Route::get('/confirm', 'ConfirmController@confirm')->middleware('auth');


Route::resource('downloads', 'DownloadController');
Route::resource('orders', 'OrderController');
Route::resource('addresses', 'AddressController');
Route::resource('items', 'ItemController');



