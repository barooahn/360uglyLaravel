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

Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 


Route::get('clean', 'OrderController@clean');
Route::get('home', 'UserController@home');
Route::get('user/home', 'UserController@home');
Route::get('user/process', 'UserController@process');
Route::get('user/download', 'UserController@download');
Route::post('/enquiry', 'EnquiryController@store')->middleware('auth');

Route::get('/confirm', 'ConfirmController@confirm')->middleware('auth');


Route::resource('downloads', 'DownloadController');
Route::resource('orders', 'OrderController');
Route::get('orders/arrived/{id}', 'OrderController@arrived');
Route::resource('addresses', 'AddressController');
Route::get('address/existing/{id}', 'AddressController@useExisting');
Route::get('address/self/{id}', 'AddressController@postSelf');
Route::resource('items', 'ItemController');

Route::get('payment', 'PayPalPaymentController@getCheckout');
Route::get('payment/done', 'PaypalPaymentController@getDone');
Route::post('payment/done', 'PaypalPaymentController@getDone');
Route::get('downloads/download/{id}', 'DownloadController@download');
Route::get('downloads/create/{id}', 'DownloadController@create');

