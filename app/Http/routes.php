<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//商铺路由组
Route::group(['prefix'=>'shop','namespace'=>'shop'],function(){
	
	//登录
	Route::get('login','LoginController@login');
	Route::post('phone','LoginController@phone');
	Route::post('code','LoginController@code');
	Route::post('dologin','LoginController@dologin');
	Route::post('shouye','LoginController@index');
	
	//主页
	Route::get('index','IndexController@index');

	//食品管理
	Route::resource('/foods','FoodsController');
	// Route::post('');
	// Route::resource('/com','CommentController');
	// Route::resource('/order','OrderlistController');
	// Route::resource('/shop','ShopController');
});