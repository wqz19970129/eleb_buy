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

/*Route::get('/', function () {
    return view('welcome');
});*/
//商家
//登录路由
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');
Route::get('/', 'StaticController@help')->name('help');
Route::get('/name', 'StaticController@show')->name('show');
/*Route::resource('buys','BuysController');*/
Route::resource('admin','AdminController');
Route::resource('plople','PlopleController');
Route::get('/password', 'PasswordController@index')->name('password');
Route::post('/password', 'PasswordController@edit')->name('edit');
Route::resource('goods','GoodsController');
Route::resource('goodscate','GoodscateController');
Route::post('/upload', 'UploaderController@upload');

Route::resource('activity','ActivityController');
Route::resource('Addoder','AddoderController');
//日订单
Route::get('/care', 'AddoderController@care')->name('care');
Route::get('/show', 'AddoderController@show1')->name('show1');
//月订单
Route::get('/care1', 'AddoderController@care1')->name('care1');
Route::get('/show1', 'AddoderController@show2')->name('show2');
//总数
Route::get('/care2', 'AddoderController@care2')->name('care2');
//菜订单
Route::get('/goods1', 'AddoderController@goods')->name('goods');
//Route::get('/goods1', 'AddoderController@show1')->name('goods');
//日菜订单
Route::get('/goods2', 'AddoderController@goods2')->name('goods2');
Route::get('/show3', 'AddoderController@show3')->name('show3');
//月菜订单
Route::get('/goods3', 'AddoderController@goods3')->name('goods3');
Route::get('/show4', 'AddoderController@show4')->name('show4');

//活动
Route::resource('events','EventController');
//
Route::get('/event', 'EventController@hert')->name('hert');



