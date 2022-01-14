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

//frontend
Route::name('frontend.')->group(function () {
    Route::get('/shopping-cart', 'frontend\CartController@index')->name('cart.index');
    Route::get('/', 'SiteController@index')->name('site.index');
    Route::get('/show/product/{product}', 'frontend\ProductController@show')->name('products.show');
    Route::get('/show/categories', 'frontend\CategoryController@index')->name('categories.index');
    Route::get('/show/category/{category}', 'frontend\CategoryController@show')->name('categories.show');
    Route::get('/show/products/last', 'frontend\ProductController@show_new')->name('products.show_new');
    Route::get('/show/products/offers', 'frontend\ProductController@show_offers')->name('products.show_offers');
    Route::post('/show/products/search', 'frontend\ProductController@search')->name('products.search');
    Route::delete('/shopping-cart/{item}', 'frontend\CartController@destroy')->name('cart.destroy');
    Route::post('/shopping-cart/{item}', 'frontend\CartController@store')->name('cart.store');
    Route::post('/shopping-cart', 'frontend\CartController@ajaxStore')->name('cart.ajax_store');//ajax
    Route::get('/checkout/shipping', 'frontend\CheckoutController@createOrder')->name('checkout.create_order');
    Route::post('/checkout/shipping', 'frontend\CheckoutController@storeOrder')->name('checkout.store_order');
    Route::get('/order_success/{order_id}/{public_key}', 'frontend\CheckoutController@success')->name('order_success');
});


//backend
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);
Route::resource('orders', OrderController::class);
Route::get('/home', 'HomeController@index')->name('home');

//auth
Auth::routes();

