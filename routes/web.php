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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function () {
 Route::resource('category',  'Admin\CategoryController');
 Route::resource('restaurant','Admin\RestaurantController');

 Route::get('/dashboard','Admin\PagesController@dashboard');
 Route::get('/clients','Admin\PagesController@clients');
 Route::get('/orders','Admin\PagesController@orders');
 Route::get('/order_details/{id}','Admin\PagesController@order_details');
 Route::get('/value','Admin\PagesController@value');
 Route::get('/tag','Admin\PagesController@tag');
 Route::get('/product',   'Admin\PagesController@product');
 Route::get('/attribute', 'Admin\PagesController@attribute');
 Route::get('/offer',     'Admin\PagesController@offer');
 Route::get('/variant',   'Admin\PagesController@variant');
 Route::get('/valueable', 'Admin\PagesController@valueable');
 Route::get('/addition',  'Admin\PagesController@addition');


});
Route::group(['prefix' => 'manager'], function () {
    Route::resource('product',   'Manager\ProductController');
    Route::resource('attribute', 'Manager\AttributeController');
    Route::resource('offer',     'Manager\OfferController');
    Route::resource('variant',   'Manager\VariantController');
    Route::resource('valueable', 'Manager\ValueableController');
    Route::resource('addition',  'Manager\AdditionController');
    Route::resource('restaurant','Manager\RestaurantController');
    Route::get('/valueable/create/{product}','Manager\ValueableController@create');
    Route::get('/variant/create/{product}','Manager\VariantController@create');
    Route::get('/offer/create/{product}','Manager\OfferController@create');   
    Route::get('/dashboard','Manager\PagesController@dashboard');
    Route::get('/clients','Manager\PagesController@clients');
    Route::get('/orders','Manager\PagesController@orders');
    Route::get('/order_details/{id}','Manager\PagesController@order_details');
    Route::get('/value','Manager\PagesController@value');
    Route::get('/tag','Manager\PagesController@tag');
});
Route::group(['prefix' => 'chef'], function () {

});
Route::group(['prefix' => 'client'], function () {

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
