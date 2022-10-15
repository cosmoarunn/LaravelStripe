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

Route::get('dark-mode-switcher', [App\Http\Controllers\DarkModeController::class, 'switch'])->name('dark-mode-switcher');


Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    //Route::get('/plans', 'SubscriptionPlanController@index')->name('plans.index');
    Route::get('plans', [App\Http\Controllers\StripePlanController::class, 'index'])->name('subscription-view');
    Route::get('show', [App\Http\Controllers\StripePlanController::class, 'show'])->name('subscription-show');
      
    Route::get('/subscription/checkout', [App\Http\Controllers\SubscriptionController::class,'checkoutSubscription'])->name('subscription.checkout');
    Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
 
});