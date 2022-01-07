<?php

use Illuminate\Support\Facades\Route;

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
Route::get('checkout1','checkout\CheckoutController@checkout1')->name('checkout1');
Route::get('checkout','checkout\CheckoutController@checkout')->name('checkout');
Route::post('checkout3','checkout\CheckoutController@checkout3')->name('checkout3');
Route::post('checkout','checkout\CheckoutController@afterpayment')->name('checkout.credit-card');
Route::get('payments','PaymentControler@payment');
