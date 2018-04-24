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
Route::get('/help', 'StaticController@help')->name('help');
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
