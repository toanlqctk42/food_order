<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*==============Category start here===============================*/
Route::get('/category/add','categoryController@index')->name('show_cate_table');
Route::post('/category/save','categoryController@save')->name('cate_save');
Route::get('/category/manage','categoryController@manage')->name('manage_cate');

Route::get('/category/active/{category_id}','categoryController@active')->name('category_active');

Route::get('/category/Inactive/{category_id}','categoryController@Inactive')->name('Inactive_cate');

Route::get('/category/delete/{category_id}','categoryController@delete')->name('delete_cate');

Route::post('/category/update','categoryController@update')->name('cate_update');

/*==============Category end here=================================*/

/*==============Delivery Boy start here=================================*/
Route::get('/delivery/boy/add','deliveryBoyController@index')->name('show_deliveryBoy_add_table');
Route::post('/delivery/boy/save','deliveryBoyController@save_boy')->name('delivery_save');
Route::get('/delivery/boy/manage','deliveryBoyController@boy_manage')->name('delivery_boy_manage');
Route::get('/delivery/boy/delete/{delivery_boy_id}','deliveryBoyController@boy_delete')->name('delivery_boy_delete');
Route::get('/delivery/boy/inactive/{delivery_boy_id}','deliveryBoyController@boy_inactive')->name('delivery_boy_inactive');
Route::get('/delivery/boy/active/{delivery_boy_id}','deliveryBoyController@boy_active')->name('delivery_boy_active');
Route::post('/delivery/boy/update','deliveryBoyController@boy_update')->name('delivery_boy_update');

/*==============Delivery Boy end here===================================*/

/*==============Coupon Code start here==================================*/
Route::get('/coupon/code/add','CouponController@index')->name('show_coupon_table');
Route::post('/coupon/code/save','CouponController@code_save')->name('save_coupon_code');
Route::get('/coupon/code/manage','CouponController@code_manage')->name('manage_coupon_code');
Route::get('/coupon/code/delete/{coupon_id}','CouponController@code_delete')->name('delete_coupon_code');
Route::get('/coupon/code/inactive/{coupon_id}','CouponController@code_inactive')->name('inactive_coupon_code');
Route::get('/coupon/code/active/{coupon_id}','CouponController@code_active')->name('active_coupon_code');
Route::post('/coupon/code/update','CouponController@code_update')->name('update_coupon_code');

/*==============Coupon Code end here==================================*/