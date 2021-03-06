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
// URL::forceScheme('https');
Route::group(['middleware' => ['web']], function () {
Route::get('', 'front_control@index' );
//Route::get('', 'front_control@dummy' );
Route::get('about-us', 'front_control@about' );
Route::get('privacyandpolicy', 'front_control@privacy' );
Route::get('faq', 'front_control@faq' );
Route::get('terms', 'front_control@terms' );
Route::get('refundandcancel', 'front_control@cancellation' );
Route::get('why', 'front_control@why' );
Route::get('test', 'front_control@Test' );

//Category Product
Route::get('category', 'front_control@categories' );
Route::get('category/{name}', 'front_control@products');
Route::get('product/{id}', 'front_control@productDetail');
Route::post('productsearch', 'front_control@productSearch');
Route::post('search', 'front_control@Search');
Route::post('blog', 'front_control@BlogDetail');
Route::get('blog/{id}', 'front_control@BlogDetail');
Route::get('test', 'front_control@test');
Route::post('location/saved', 'front_control@LocationSaved');
Route::post('pincode/saved', 'front_control@PincodeSaved');
Route::post('applycoupon', 'cart@ApplyCoupon');
Route::get('removeCoupon', 'cart@removeCoupon');
Route::post('cancelorder', 'front_control@CancelOrder');
Route::get('invoice/{id}','front_control@OrderInvoice');

Route::get('recipes/{id}', 'front_control@recipeDetail');

//Cart
Route::post('cartadd', 'cart@AddToCart');
Route::get('cartquant', 'cart@CartQuant');
Route::post('cartline', 'cart@AjaxToCart');
Route::get('cart', 'cart@CartView');
Route::patch('update-cart', 'cart@update');
Route::post('update-ajax', 'cart@AjaxUpdate');
Route::post('remove-from-cart', 'cart@remove');
Route::get('clearcart', 'cart@removeall');

//Checkout
Route::get('checkout', 'front_control@checkout');
Route::post('payment', 'front_control@payment');
Route::post('paysuccess', 'RazorpayController@razorPaySuccess');
Route::get('thank-you', 'RazorpayController@RazorThankYou');

// Route::post('payment', 'front_control@payment');
// Route::post('ccavRequestHandler', 'front_control@ccavRequestHandler');
// Route::post('ccavResponseHandler', 'front_control@ccavResponseHandler');
//Dasboard
Route::post('login','front_control@login');
Route::post('register','front_control@register');
Route::post('otpverify','front_control@otpVerifcation');
Route::get('resendotp','front_control@otpResend');
Route::get('otpverifys','front_control@otpVerifcations');
Route::post('emailotpverify','front_control@EmailotpForgot');
Route::post('passwordforget','front_control@ForgotUpdate');
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
Route::get('laravel-admin/order/edit/{id}', 'admin_control@OrderAdd');
Route::post('laravel-admin/order/insert', 'admin_control@OrderInsert');
Route::post('laravel-admin/order/status', 'admin_control@OrderStatus');
Route::get('laravel-admin/order/delete/{id}', 'admin_control@OrderDelete');

Route::get('laravel-admin/coupon', 'admin_control@Coupon');
Route::get('laravel-admin/coupon/add', 'admin_control@CouponAdd');
Route::get('laravel-admin/coupon/edit/{id}', 'admin_control@CouponAdd');
Route::post('laravel-admin/coupon/insert', 'admin_control@CouponInsert');
Route::post('laravel-admin/coupon/status', 'admin_control@CouponStatus');
Route::get('laravel-admin/coupon/delete/{id}', 'admin_control@CouponDelete');

Route::get('laravel-admin/blog', 'admin_control@Blog');
Route::get('laravel-admin/blog/add', 'admin_control@BlogAdd');
Route::get('laravel-admin/blog/edit/{id}', 'admin_control@BlogAdd');
Route::post('laravel-admin/blog/insert', 'admin_control@BlogInsert');
Route::get('laravel-admin/blog/delete/{id}', 'admin_control@BlogDelete');
Route::get('laravel-admin/print/{id}', 'admin_control@PrintThermaal');

Route::get('laravel-admin/recipe', 'admin_control@Recipe');
Route::get('laravel-admin/recipe/add', 'admin_control@RecipeAdd');
Route::get('laravel-admin/recipe/edit/{id}', 'admin_control@RecipeAdd');
Route::post('laravel-admin/recipe/insert', 'admin_control@RecipeInsert');
Route::get('laravel-admin/recipe/delete/{id}', 'admin_control@RecipeDelete');


//     _          _    ____            _             _ 
//    / \   _ __ (_)  / ___|___  _ __ | |_ _ __ ___ | |
//   / _ \ | '_ \| | | |   / _ \| '_ \| __| '__/ _ \| |
//  / ___ \| |_) | | | |__| (_) | | | | |_| | | (_) | |
// /_/   \_\ .__/|_|  \____\___/|_| |_|\__|_|  \___/|_|
//         |_|  


Route::get('api/order', 'apicontrol@GetOrderApi');
Route::post('api/order/date', 'apicontrol@GetOrderByDateApi');
Route::get('api/order/orderid/{id}', 'apicontrol@GetOrderById');


});