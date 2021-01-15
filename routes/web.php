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
//Category Product
Route::get('category', 'front_control@categories' );
Route::get('category/{name}', 'front_control@products');
Route::get('product/{name}', 'front_control@productDetail');
//Cart
Route::post('cartadd', 'cart@AddToCart');
Route::get('cart', 'cart@CartView');
Route::patch('update-cart', 'cart@update');
Route::delete('remove-from-cart', 'cart@remove');
Route::get('clearcart', 'cart@removeall');
//Checkout
Route::get('checkout', 'front_control@checkout');
Route::post('payment', 'front_control@payment');
//Dasboard
Route::post('login','front_control@login');
Route::get('dashboard', 'front_control@dashboard');
Route::post('dashboard/profileimageupload', 'front_control@profileimageupload');
Route::get('dashboard/changepassword', 'front_control@changepassword');
Route::get('dashboard/locationremove/{id}', 'front_control@LocationRemove');
Route::get('logout', 'front_control@Logout');


//     _       _           _       
//    / \   __| |_ __ ___ (_)_ __  
//   / _ \ / _` | '_ ` _ \| | '_ \ 
//  / ___ \ (_| | | | | | | | | | |
// /_/   \_\__,_|_| |_| |_|_|_| |_|

Route::get('laravel-admin','admin_control@index');
Route::post('laravel-admin/authenticate','admin_control@Authenticate');

Route::get('laravel-admin/dashboard', 'admin_control@dashboard');
Route::get('laravel-admin/logout', 'admin_control@Logout');

Route::get('laravel-admin/category', 'admin_control@Category');
Route::get('laravel-admin/category/add', 'admin_control@CategoryAdd');
Route::get('laravel-admin/category/edit/{id}', 'admin_control@CategoryAdd');
Route::post('laravel-admin/category/insert', 'admin_control@CategoryInsert');

Route::get('laravel-admin/product', 'admin_control@Product');
Route::get('laravel-admin/product/add', 'admin_control@ProductAdd');
Route::get('laravel-admin/product/edit/{id}', 'admin_control@ProductAdd');
Route::post('laravel-admin/product/insert', 'admin_control@ProductInsert');

Route::get('laravel-admin/order', 'admin_control@Order');
Route::get('laravel-admin/coupon', 'admin_control@Coupon');
