<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front_control;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|         _____                _   
|        |  ___| __ ___  _ __ | |_ 
|        | |_ | '__/ _ \| '_ \| __|
|        |  _|| | | (_) | | | | |_ 
|        |_|  |_|  \___/|_| |_|\__|
*/
Route::get('', 'front_control@index' );
Route::get('category', 'front_control@categories' );
Route::get('category/{name}', 'front_control@products');
Route::post('cartadd', 'cart@AddToCart');
Route::get('cart', 'cart@CartView');
Route::patch('update-cart', 'cart@update');
Route::delete('remove-from-cart', 'cart@remove');
Route::get('clearcart', 'cart@removeall');
