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

Route::get('/rider-list', 'BEController@riderList')->name('admin-rider-list');
// Add
// Update

Route::get('/customer-list', 'BEController@customerList')->name('admin-customer-list');

Route::get('/product-list', 'BEController@productList')->name('admin-product-list');
Route::post('/product-add', 'BEController@productAdd')->name('admin-product-add');
Route::get('/product-update/{id}', 'BEController@productUpdate')->name('admin-product-update');
Route::post('/product-save-update', 'BEController@productSaveUpdate')->name('admin-product-save-update');

Route::get('/store-list', 'BEController@storeList')->name('admin-store-list');
Route::post('/getvendoraddons', 'BEController@getVendorAddons')->name('admin-get-vendor-addons');
Route::post('/store-add', 'BEController@storeAdd')->name('admin-store-add');
Route::get('/store-update/{id}', 'BEController@storeUpdate')->name('admin-store-update');
Route::post('/store-save-update', 'BEController@storeSaveUpdate')->name('admin-store-save-update');

Route::get('/get-all-riders-by-zip-code/{orderid}/{zipcode}', 'BEController@getAllRidersByZipCode')->name('get-all-riders-by-zip-code');
Route::post('/rider-change-status', 'BEController@riderChangeStatus')->name('rider-change-status');
Route::get('/view-order/{id}', 'BEController@viewOrder')->name('view-order');
Route::post('/assign-order-to-rider', 'BEController@assignOrderToRider')->name('assign-order-to-rider');
Route::post('/order-change-status', 'BEController@orderChangeStatus')->name('order-change-status');


Route::get('/home', 'HomeController@index')->name('home');
