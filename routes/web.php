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

Route::get('/',[
    'uses'  =>  'EcommerceController@index',
    'as'    =>  '/'
]);

Route::get('/product-details/{id}',[
    'uses'  =>  'EcommerceController@productDetails',
    'as'    =>  'product-details'
]);
Route::get('/category/{id}',[
    'uses'  =>  'EcommerceController@Category',
    'as'    =>  'category'
]);
Route::get('/add-cart/{id}',[
    'uses'  =>  'CartController@addCart',
    'as'    =>  'add-cart'
]);
Route::get('cart',[
    'uses'  =>  'CartController@showCart',
    'as'    =>  'cart'
]);
Route::post('/remove',[
    'uses'  =>  'CartController@remove',
    'as'    =>  'remove'
]);
Route::get('/destroy',[
    'uses'  =>  'CartController@destroy',
    'as'    =>  'destroy'
]);
Route::get('/checkout',[
    'uses'  =>  'CheckoutController@checkout',
    'as'    =>  'checkout'
]);
Route::post('/new-customer',[
    'uses'  =>  'CheckoutController@newCustomer',
    'as'    =>  'new-customer'
]);
Route::post('/shipping-info',[
    'uses'  =>  'CheckoutController@newShipping',
    'as'    =>  'shipping-info'
]);
Route::get('/payment-info',[
    'uses'  =>  'CheckoutController@paymentInfo',
    'as'    =>  'payment-info'
]);
Route::post('/new-order',[
    'uses'  =>  'OrderDetailsController@newOrderDetails',
    'as'    =>  'new-order'
]);
Route::get('/confirm-order',[
    'uses'  =>  'OrderDetailsController@confirmOrder',
    'as'    =>  'confirm-order'
]);







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::get('/add-category',[
    'uses'  =>  'CategoryController@addCategory',
    'as'    =>  'add-category'
]);
Route::post('/category.store',[
    'uses'  =>  'CategoryController@storeCategory',
    'as'    =>  'category.store'
]);
Route::get('/manage-category',[
    'uses'  =>  'CategoryController@manageCategory',
    'as'    =>  'manage-category'
]);
Route::get('/add-brand',[
    'uses'  =>  'BrandController@addBrand',
    'as'    =>  'add-brand'
]);
Route::post('/brand.store',[
    'uses'  =>  'BrandController@storeBrand',
    'as'    =>  'brand.store'
]);
Route::get('/manage-brand',[
    'uses'  =>  'BrandController@manageBrand',
    'as'    =>  'manage-brand'
]);
Route::get('/edit-category/{id}',[
    'uses'  =>  'CategoryController@editCategory',
    'as'    =>  'edit-category'
]);
Route::post('/update-category',[
    'uses'  =>  'CategoryController@updateCategory',
    'as'    =>  'update-category'
]);
Route::get('/delete-category/{id}',[
    'uses'  =>  'CategoryController@deleteCategory',
    'as'    =>  'delete-category'
]);
Route::get('/edit-brand/{id}',[
    'uses'  =>  'BrandController@editBrand',
    'as'    =>  'edit-brand'
]);
Route::post('/update-brand',[
    'uses'  =>  'BrandController@updateBrand',
    'as'    =>  'update-brand'
]);
Route::get('/delete-brand/{id}',[
    'uses'  =>  'BrandController@DeleteBrand',
    'as'    =>  'delete-brand'
]);
Route::get('/add-product',[
    'uses'  =>  'ProductController@addProduct',
    'as'    =>  'add-product'
]);
Route::post('/new-product',[
    'uses'  =>  'ProductController@newProduct',
    'as'    =>  'new-product'
]);
Route::get('/manage-product',[
    'uses'  =>  'ProductController@manageProduct',
    'as'    =>  'manage-product'
]);
Route::get('/edit-product/{id}',[
    'uses'  =>  'ProductController@editProduct',
    'as'    =>  'edit-product'
]);
Route::post('/update-product',[
    'uses'  =>  'ProductController@updateProduct',
    'as'    =>  'update-product'
]);

Route::get('/manage-order',[
    'uses'  =>  'OrderController@newOrder',
    'as'    =>  'manage-order'
]);
Route::get('/order-details/{id}',[
    'uses'  =>  'OrderController@orderDetails',
    'as'    =>  'order-details'
]);
