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
Route::group(['prefix' => 'admin','middleware'=>['auth','checkrole:admin']], function () {
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
Route::group(['prefix' => 'manager','middleware'=>['auth','checkrole:manager']], function () {
    Route::resource('restaurant','Manager\RestaurantController')->except(['edit','show','create']);

});
Route::group(['prefix' => 'manager','middleware'=>['auth','checkrole:manager','HasRestaurant']], function () {
    Route::resource('product',   'Manager\ProductController');
    Route::resource('attribute', 'Manager\AttributeController');
    Route::resource('offer',     'Manager\OfferController');
    Route::resource('variant',   'Manager\VariantController');
    Route::resource('valueable', 'Manager\ValueableController');
    Route::resource('addition',  'Manager\AdditionController');
    Route::resource('employee',  'Manager\EmployeeController',['parameters' => [
        'employee' => 'user'
    ]]);

    Route::get('/valueable/create/{product}','Manager\ValueableController@create');
    Route::get('/variant/create/{product}','Manager\VariantController@create');
    Route::get('/offer/create/{product}','Manager\OfferController@create');
    Route::get('/addition/create/{product}','Manager\AdditionController@create');
    Route::get('/addition/create', function (){return abort(404);});
    Route::get('/variant/create', function (){return abort(404);});
    Route::get('/offer/create', function (){return abort(404);});
    Route::get('/valueable/create', function (){return abort(404);});
    Route::get('/dashboard','Manager\PagesController@dashboard');
    Route::get('/category','Manager\PagesController@category');
    Route::get('/clients','Manager\PagesController@clients');
    Route::get('/orders','Manager\PagesController@orders');
    Route::get('/order_details/{id}','Manager\PagesController@order_details');
    Route::get('/value','Manager\PagesController@value');
    Route::get('/tag','Manager\PagesController@tag');
    Route::get('/block/{user}','Manager\ManagerController@block');


});
Route::group(['prefix' => 'chef'], function () {

});
Route::group(['prefix' => 'client'], function () {

});

Auth::routes();

Route::get('/setting', 'HomeController@setting');
Route::post('/changepassword','HomeController@changepassword');
Route::post('/changeinformation','HomeController@changeinformation');
Route::get('/cart', 'Front\CartController@all');
Route::get('/cart/empty', 'Front\CartController@empty');
Route::post('/cart', 'Front\CartController@create');
Route::get('/cart/{id}', 'Front\CartController@destroy');
Route::get('/wishlist', 'Front\WishlistController@all');
Route::get('/wishlist/empty', 'Front\WishlistController@empty');
Route::get('/wishlist/create/{product}', 'Front\WishlistController@create');
Route::get('/wishlist/{id}', 'Front\WishlistController@destroy');
Route::get('/product/{product}', 'Front\ProductController@product');
Route::get('/products', 'Front\ProductController@products');
Route::get('/restaurant/{restaurant}', 'Front\RestaurantController@restaurant');
Route::get('/restaurants', 'Front\RestaurantController@restaurants');
Route::get('/allrestaurants', 'Front\RestaurantController@getallrestaurant');
Route::get('/checkout', 'Front\PagesController@checkout');
Route::post('/checkout', 'Front\PagesController@savecheckout');
Route::get('/restaurantproducts/{id}/{category}', 'Front\RestaurantController@restaurantproducts');


