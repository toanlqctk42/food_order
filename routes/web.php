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
    return view('welcome');
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

/*==============Delivery Boy end here===================================*/