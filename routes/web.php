<?php

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

Auth::routes();

// FRONTEND ROUTES
Route::get('/', 'FEController@index')->name('index');
Route::get('/our-menu', 'FEController@menu')->name('menu');
Route::get('/menu-detail/{id}', 'FEController@menuDetails')->name('menu-details');
Route::get('/contact', 'FEController@contact')->name('contact');
Route::get('/dashboard', 'FEController@dashboard')->name('dashboard');
Route::get('/track-order', 'FEController@trackorder')->name('trackorder');

Route::post('/addordertocart', 'FEController@addOrderandTrack')->name('ad-to-cart');
Route::get('/getcart', 'FEController@getCartDetails')->name('get-cart');
Route::post('/getcartaddons/{id}', 'FEController@getCartAddonDetails')->name('get-cart-addons');
Route::post('/removecartitem/{id}', 'FEController@removeCartItem')->name('remove-cart-item');
Route::get('/getcartcount', 'FEController@getCartCount')->name('get-cart-count');
Route::post('/addnewaddress', 'FEController@addNewAddress')->name('add-new-address');
Route::get('/getmyaddress', 'FEController@getMyAddress')->name('get-my-address');
Route::post('/removeaddress/{id}', 'FEController@removeAddress')->name('remove-address');
Route::post('/confirmorder', 'FEController@confirmOrder')->name('confirm-order');

// BACKEND ROUTES
Route::get('/admin', 'BEController@index')->name('admin-index');

Route::get('/rider', 'BEController@rider')->name('admin-rider');
// Route::get('/get-all-riders', 'BEController@getAllRiders')->name('get-all-riders');


Route::get('/home', 'HomeController@index')->name('home');
