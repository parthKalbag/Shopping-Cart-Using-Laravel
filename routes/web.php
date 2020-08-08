<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('main');
Route::resource('products', 'ProductController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
