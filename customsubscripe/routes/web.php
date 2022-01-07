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


Auth::routes();


Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('get','SubscribeController@get')->name('get');
    Route::get('show','SubscribeController@show')->name('show');
    Route::post('/subscription', 'SubscribeController@create')->name('subscription.create');

     //Routes for create Plan
     Route::get('create/plan', 'SubscribeController@createPlan')->name('create.plan');
     Route::post('store/plan', 'SubscribeController@storePlan')->name('store.plan');

});