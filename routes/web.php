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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* Front End Routes */
Route::get('/home', 'HomeController@index')->name('Home');
//Route::post('/set-supermarket','SupermarketController@set_supermarket')->name("Set Supermarket");
Route::post('/home', 'HomeController@index');

Route::post('/add-to-cart','ShoppingCartController@add_to_cart')->name('Add product to cart');
Route::post('/remove-from-cart','ShoppingCartController@remove_from_cart')->name('Remove product from cart');
Route::post('/empty-cart','ShoppingCartController@empty_cart')->name('Empty cart');

Route::get('/check-out','CheckOutController@index')->name('Check out');
Route::post('/new-order','CheckOutController@new_order')->name("New order");
Route::get('/order-payment','CheckOutController@order_payment')->name('Order payment');
Route::get('/thank-you','CheckOutController@thank_you')->name('Thank you');

Route::post('/mpesa-payment','MpesaPaymentsController@mpesa')->name('Mpesa Processor');
Route::post('/mpesa-callback','MpesaPaymentsController@mpesa_callback')->name('Mpesa Callback');