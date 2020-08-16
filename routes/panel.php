<?php

use Illuminate\Support\Facades\Route;

Route::resource('products', 'ProductController');
Route::get('panel', 'PanelController@index')->name('panel');