<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuthMiddleware;

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

Route::get('/','FrontEndController@index');

Route::get('/category/dish/show/{category_id}','FrontEndController@dish_show')->name('category_dish');

/* ================= cart route start here====================*/
Route::post('add/cart','cartController@insert')->name('add_to_cart');
Route::get('cart/show','cartController@show')->name('cart_show');
Route::get('cart/remove/{rowId}','cartController@remove')->name('remove_item');
Route::post('cart/update','cartController@update')->name('update_cart');
/* ================= cart route end here====================*/

/*================= check out route start here =================*/
Route::get('/checkout/payment','CheckOutController@payment')->name('checkout_payment');
Route::get('/checkout/new/order','CheckOutController@order')->name('new_order');
Route::get('/checkout/order/complete','CheckOutController@complete')->name('order_complete');
/*================= check out route end here ===================*/

/*================= customer start here ===================*/
Route::get('/register/customer','CustomerController@show')->name('sign_up');
Route::post('/register/customer/store','CustomerController@store')->name('store_customer');

Route::get('/login/customer','CustomerController@login')->name('login_in');
Route::post('/logout/customer','CustomerController@logout')->name('log_out');
Route::post('/check/customer/login','CustomerController@check')->name('check_login');

Route::get('/shipping','CustomerController@shipping');
Route::post('/checkout/shipping/store','CustomerController@save')->name('shipping_store');
/*================= customer end here ===================*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*==============Category start here===============================*/
Route::prefix('category')->middleware([CheckAuthMiddleware::class])->group(function (){

    Route::get('/add','categoryController@index')->name('show_cate_table');
    Route::post('/save','categoryController@save')->name('cate_save');
    Route::get('/manage','categoryController@manage')->name('manage_cate');
    
    Route::get('/active/{category_id}','categoryController@active')->name('category_active');
    
    Route::get('/Inactive/{category_id}','categoryController@Inactive')->name('Inactive_cate');
    
    Route::get('/delete/{category_id}','categoryController@delete')->name('delete_cate');
    
    Route::post('/update','categoryController@update')->name('cate_update');
    
});
/*==============Category end here=================================*/

/*==============Delivery Boy start here=================================*/
Route::prefix('delivery_boy')->middleware([CheckAuthMiddleware::class])->group(function(){

    Route::get('/add','deliveryBoyController@index')->name('show_deliveryBoy_add_table');
    Route::post('/save','deliveryBoyController@save_boy')->name('delivery_save');
    Route::get('/manage','deliveryBoyController@boy_manage')->name('delivery_boy_manage');
    Route::get('/delete/{delivery_boy_id}','deliveryBoyController@boy_delete')->name('delivery_boy_delete');
    Route::get('/inactive/{delivery_boy_id}','deliveryBoyController@boy_inactive')->name('delivery_boy_inactive');
    Route::get('/active/{delivery_boy_id}','deliveryBoyController@boy_active')->name('delivery_boy_active');
    Route::post('/update','deliveryBoyController@boy_update')->name('delivery_boy_update');
    
});
/*==============Delivery Boy end here===================================*/
/*==============Coupon Code start here==================================*/
Route::prefix('coupon')->middleware([CheckAuthMiddleware::class])->group(function(){
    Route::get('/add','CouponController@index')->name('show_coupon_table');
    Route::post('/save','CouponController@code_save')->name('save_coupon_code');
    Route::get('/manage','CouponController@code_manage')->name('manage_coupon_code');
    Route::get('/delete/{coupon_id}','CouponController@code_delete')->name('delete_coupon_code');
    Route::get('/inactive/{coupon_id}','CouponController@code_inactive')->name('inactive_coupon_code');
    Route::get('/active/{coupon_id}','CouponController@code_active')->name('active_coupon_code');
    Route::post('/update','CouponController@code_update')->name('update_coupon_code');
    
});
/*==============Coupon Code end here==================================*/
/*==============Dish start here==================================*/
Route::prefix('dish')->middleware([CheckAuthMiddleware::class])->group(function(){
    Route::get('/add','DishController@index')->name('show_dish_table');
    Route::post('/save','DishController@save_dish')->name('save_dish_data');
    Route::get('/manage','DishController@manage_dish')->name('manage_dish_table');
    Route::get('/active/{dish_id}','DishController@active_dish')->name('dish_active');
    Route::get('/inactive/{dish_id}','DishController@inactive_dish')->name('dish_inactive');
    Route::get('/delete/{dish_id}','DishController@delete_dish')->name('dish_delete');
    Route::post('/update','DishController@update_dish')->name('update_dish');
});
/*==============Dish end here==================================*/
Route::prefix('order')->middleware([CheckAuthMiddleware::class])->group(function(){
    /*==============Order start here==================================*/
    Route::get('/manage','OrderController@manageOrder')->name('show_order');
    Route::get('/view/detail/{order_id}','OrderController@viewOrder')->name('view_order');
    Route::get('/view/invoice/{order_id}','OrderController@viewInvoice')->name('view_order_invoice');
    Route::get('/download/invoice/{order_id}','OrderController@downloadInvoice')->name('download_order_invoice');
    Route::get('/delete/{order_id}','OrderController@deleteOrder')->name('delete_order');
});
/*==============Order end here====================================*/

