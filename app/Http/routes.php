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

//系统后台路由
Route::group(['prefix'=>'sys','namespace'=>'sys'],function(){

	//系统后台登入页面
	Route::get('/','LoginController@index');

	//验证码生成路由
	Route::get('code','LoginController@code');

	//执行登入的路由
	Route::post('login','LoginController@login');

	//系统后台首页路由
	Route::get('index','IndexController@index');

	//系统用户管理路由
	Route::resource('user','UserController');

	//系统店家管理路由
	Route::resource('shop','ShopController');

	//系统订单管理的路由
	Route::resource('order','OrderController');

	//系统申请管理路由
	Route::resource('shenqing','ShenqingController');

	//系统分类管理路由
	Route::resource('category','CategoryController');

	//系统配置管理路由
	Route::resource('config','ConfigController');

	//系统广告管理路由
	Route::resource('ad','AdController');
	
});