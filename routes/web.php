<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('main');
Route::resource('carts', 'CartController')->only(['index']);
Route::resource('products.carts', 'ProductCartController')->only(['store', 'destroy']);
Route::resource('orders', 'OrderController')->only(['store', 'create']);
Route::resource('orders.payments', 'OrderPaymentController')->only(['store', 'create']);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
