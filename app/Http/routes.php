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

Route::group(['prefix'=>'sys','namespace'=>'sys'],function(){
	//后台登入路由
	Route::get('login','LoginController@login');
	//后台首页路由
	Route::get('index','IndexController@index');
	//用户管理路由
	Route::resource('user','UserController');
	//店家管理路由
	Route::resource('shop','ShopController');
	//订单管理的路由
	Route::resource('order','OrderController');
	//申请管理路由
	Route::resource('shenqing','ShenqingController');
	//分类管理路由
	Route::resource('category','CategoryController');
	//配置管理路由
	Route::resource('config','ConfigController');
	//广告管理路由
	Route::resource('ad','AdController');
	
});