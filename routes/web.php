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

Route::post('mpesa-payment','MpesaPaymentsController@mpesa')->name('Mpesa Processor');
Route::post('mpesa-callback','MpesaPaymentsController@mpesa_callback')->name('Mpesa Callback');








/*Backend routes*/

//user
Route::get('/admin','admin\RegisterUserController@index')->name('Admin');
Route::get('/register-user','admin\RegisterUserController@register_user')->name('Register User');
Route::post('register-user','admin\RegisterUserController@create_user')->name('Create user');
Route::post('update-user','admin\RegisterUserController@update_user')->name('Update user');
Route::get('supermarket-departments/{id}','SupermarketsController@get_departments')->name('Get departments');
Route::get('customer/{id}','admin\UsersController@get_customer')->name('Get customer');
Route::get('admin/{id}','admin\UsersController@get_admin')->name('Get admin');
Route::get('staff/{id}','admin\UsersController@get_staff')->name('Get staff');
Route::get('delete-user/{id}','admin\UsersController@soft_delete_user')->name('Delete user');
Route::get('remove-user/{id}','admin\UsersController@remove_user')->name('Remove user');
Route::get('trashed-users','admin\UsersController@get_trashed_users')->name('Get trashed users');
Route::get('trashed-user/{id}','admin\UsersController@get_trashed_user')->name('Get trashed user');
Route::get('restore-user/{id}','admin\UsersController@restore_user')->name('Restore user');

//product
Route::get('/register-product','admin\ProductsController@register_product')->name('Product register form');
Route::post('/create-product','admin\ProductsController@create_product')->name('Create product');
Route::get('/product/{id}','admin\ProductsController@get_product')->name('Get product');
Route::post('/update-product','admin\ProductsController@update_product')->name('Update product');
Route::get('/delete-product/{id}','admin\ProductsController@delete_product')->name('Delete Product');
Route::get('/trashed-products','admin\ProductsController@get_trashed_products')->name('Get trashed products');
Route::get('/trashed-product/{id}','admin\ProductsController@get_trashed_product')->name('Get trashed product');
Route::get('/restore-product/{id}','admin\ProductsController@restore_product')->name('Restore product');
Route::get('/remove-product/{id}','admin\ProductsController@remove_product')->name('Remove product');

//department
Route::get('/register-department','admin\DepartmentsController@register_department')->name('Department register form');
Route::post('/create-department','admin\DepartmentsController@create_department')->name('Create department');
Route::get('/department/{id}','admin\DepartmentsController@get_department')->name('Get Department');
Route::post('/update-department','admin\DepartmentsController@update_department')->name('Update Department');
Route::get('/delete-department/{id}','admin\DepartmentsController@delete_department')->name('Delete Department');
Route::get('/trashed-departments','admin\DepartmentsController@get_trashed_departments')->name('Get trashed departments');
Route::get('/trashed-department/{id}','admin\DepartmentsController@get_trashed_department')->name('Get trashed department');
Route::get('/restore-department/{id}','admin\DepartmentsController@restore_department')->name('Restore Department');
Route::get('/remove-department/{id}','admin\DepartmentsController@remove_department')->name('Remove Department');

//category
Route::get('/category/{id}','admin\CategoriesController@get_category')->name('Get Category');
Route::get('/register-category','admin\CategoriesController@register_category')->name('Category register form');
Route::post('/create-category','admin\CategoriesController@create_category')->name('Create Category');
Route::post('/update-category','admin\CategoriesController@update_category')->name('Update Category');
Route::get('/delete-category/{id}','admin\CategoriesController@delete_category')->name('Delete Category');
Route::get('/trashed-categories','admin\CategoriesController@trashed_categories')->name('Get trashed Categories');
Route::get('/trashed-category/{id}','admin\CategoriesController@trashed_category')->name('Get trashed Category');
Route::get('/restore-category/{id}','admin\CategoriesController@restore_category')->name('Restore Category');
Route::get('/remove-category/{id}','admin\CategoriesController@remove_category')->name('Remove Category');

//orders
Route::get('order/{id}','admin\OrdersController@get_order')->name('Get Order');
Route::post('update-order','admin\OrdersController@update_order')->name('Update Order');
Route::get('delete-order/{id}','admin\OrdersController@delete_order')->name('Delete Order');
Route::get('trashed-orders','admin\OrdersController@get_trashed_orders')->name('Get trashed orders');
Route::get('trashed-order/{id}','admin\OrdersController@get_trashed_order')->name('Get trashed order');
Route::get('restore-order/{id}','admin\OrdersController@restore_order')->name('Restore trashed order');
Route::get('remove-order/{id}','admin\OrdersController@remove_order')->name('Remove trashed order');
