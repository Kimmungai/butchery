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
Route::get('test', function() {
    Storage::disk('google')->put('/1X-SCjnpX7QMaVaRup0JC5S-FUPuWPo7h/test.txt', 'Hello World');
});

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

/*Backend routes*/
Route::get('/admin','admin\RegisterUserController@index')->name('Admin');
Route::get('/register-user','admin\RegisterUserController@register_user')->name('Register User');

Route::post('register-user','admin\RegisterUserController@create_user')->name('Create user');


Route::get('supermarket-departments/{id}','SupermarketsController@get_departments')->name('Get departments');
