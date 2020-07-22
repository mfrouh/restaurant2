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
 Route::resource('category', 'Admin\CategoryController');
 Route::resource('product', 'Admin\ProductController');
 Route::resource('attribute', 'Admin\AttributeController');
 Route::resource('offer', 'Admin\OfferController');
 Route::resource('variant', 'Admin\VariantController');
 Route::resource('valueable', 'Admin\ValueableController');
 Route::resource('addition', 'Admin\AdditionController');

 Route::get('/valueable/create/{product}','Admin\ValueableController@create');
 Route::get('/variant/create/{product}','Admin\VariantController@create');
 Route::get('/offer/create/{product}','Admin\OfferController@create');

 Route::get('/dashboard','Admin\PagesController@dashboard');
 Route::get('/clients','Admin\PagesController@clients');
 Route::get('/orders','Admin\PagesController@orders');
 Route::get('/order_details/{id}','Admin\PagesController@order_details');
 Route::get('/value','Admin\PagesController@value');
 Route::get('/tag','Admin\PagesController@tag');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
