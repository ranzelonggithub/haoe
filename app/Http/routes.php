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



//系统后台登入的路由
Route::group(['prefix'=>'sys','namespace'=>'sys'],function(){
	//系统后台登入页面
	Route::get('/do','LoginController@index');

	//系统后台验证码生成路由
	Route::get('/code','LoginController@code');

	//执行登入的路由
	Route::post('/login','LoginController@login');
});

//中间件

//系统后台主页路由
Route::group(['prefix'=>'sys','namespace'=>'sys','Middleware'=>'Login'],function(){
	
	//系统后台首页路由
	Route::get('index','IndexController@index');

	//加载系统修改密码路由
	Route::get('/pass','IndexController@pass');

	//执行修改密码的路由
	Route::post('/update/{id}','IndexController@update');

	//执行退出的路由
	Route::get('del','IndexController@del');

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
	Route::get('config','ConfigController@index');

	//修改网站配置路由
	Route::post('doconfig','ConfigController@update');

	//系统广告管理路由
	Route::resource('ad','AdController');
	
});



