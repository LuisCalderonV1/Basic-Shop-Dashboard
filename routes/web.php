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


Route::get('/', 'SiteController@index')->name('frontend/home');
Route::get('/show/product/{product}', 'frontend\ProductController@show')->name('frontend.products.show');
Route::get('/show/categories', 'frontend\CategoryController@index')->name('frontend.categories.index');
Route::get('/show/category/{category}', 'frontend\CategoryController@show')->name('frontend.categories.show');
Route::get('/show/products/last', 'frontend\ProductController@show_new')->name('frontend.products.show_new');
Route::get('/show/products/offers', 'frontend\ProductController@show_offers')->name('frontend.products.show_offers');

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
