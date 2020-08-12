<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('main');
Route::resource('products', 'ProductController');
Route::resource('carts', 'CartController')->only(['index']);
Route::resource('products.carts', 'ProductCartController')->only(['store', 'destroy']);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
