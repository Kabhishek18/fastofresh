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
Route::get('product/{id}', 'front_control@productDetail');
Route::post('productsearch', 'front_control@productSearch');
Route::post('search', 'front_control@Search');
Route::post('blog', 'front_control@BlogDetail');
Route::post('blog/{$id}', 'front_control@BlogDetail');
Route::get('test', 'front_control@testRoute');

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

Route::get('laravel-admin/home_list', 'admin_control@Homelist');
Route::post('laravel-admin/home_list/insert', 'admin_control@HomelistInsert');

Route::get('laravel-admin/category', 'admin_control@Category');
Route::get('laravel-admin/category/add', 'admin_control@CategoryAdd');
Route::get('laravel-admin/category/edit/{id}', 'admin_control@CategoryAdd');
Route::post('laravel-admin/category/insert', 'admin_control@CategoryInsert');
Route::get('laravel-admin/category/delete/{id}', 'admin_control@CategoryDelete');

Route::get('laravel-admin/product', 'admin_control@Product');
Route::get('laravel-admin/product/add', 'admin_control@ProductAdd');
Route::get('laravel-admin/product/edit/{id}', 'admin_control@ProductAdd');
Route::post('laravel-admin/product/insert', 'admin_control@ProductInsert');
Route::get('laravel-admin/product/delete/{id}', 'admin_control@ProductDelete');

Route::get('laravel-admin/order', 'admin_control@Order');
Route::get('laravel-admin/coupon', 'admin_control@Coupon');

Route::get('laravel-admin/blog', 'admin_control@Blog');
Route::get('laravel-admin/blog/add', 'admin_control@BlogAdd');
Route::get('laravel-admin/blog/edit/{id}', 'admin_control@BlogAdd');
Route::post('laravel-admin/blog/insert', 'admin_control@BlogInsert');
Route::get('laravel-admin/blog/delete/{id}', 'admin_control@BlogDelete');
Route::get('laravel-admin/print', 'admin_control@PrintThermaal');

Route::get('laravel-admin/recipe', 'admin_control@Recipe');
Route::get('laravel-admin/recipe/add', 'admin_control@RecipeAdd');
Route::get('laravel-admin/recipe/edit/{id}', 'admin_control@RecipeAdd');
Route::post('laravel-admin/recipe/insert', 'admin_control@RecipeInsert');
Route::get('laravel-admin/recipe/delete/{id}', 'admin_control@RecipeDelete');