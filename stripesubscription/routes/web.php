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
Route::redirect('/', '/blog', 301);

Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/', '/blog');

Route::get('blog','BlogController@index')->name('blog');
Route::get('Subscription','subscription\SubscriptionController@index')->name('Subscription');

