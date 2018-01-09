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

 //加载登陆注册界面
Route::resource('/login','Home\LoginController') ;

Route::group(['prefix'=>'home','namespace'=>'Home'],function() {
	 //加载首页 地图
	Route::get('map','IndexController@map') ;
	//加载首页 网站首页
	Route::get('list','IndexController@index') ;
	//加载网站首页 链接到的商家合作页面
	Route::get('coop','IndexController@coop') ;
}) ;
//店铺信息
Route::group(['prefix'=>'shop','namespace'=>'Home'],function() {
	//加载店铺详情页
	Route::get('shop_detail','ShopController@shop_detail') ;
	//加载店铺评论页
	Route::get('shop_comment','ShopController@shop_comment') ;
	////加载店铺大家都在点 页面
	Route::get('shop_brand','ShopController@shop_brand') ;
	//加载店铺简介 页面
	Route::get('shop_intro','ShopController@shop_intro') ;
}) ;

Route::group(['prefix'=>'user','namespace'=>'Home'],function() {
	//加载用户订单页面
	Route::get('member_order','UserController@member_order') ;
	//加载用户收藏页面
	Route::get('member_collect','UserController@member_collect') ;
	//用户地址管理
	Route::get('member_addr','UserController@member_addr') ;
	//账号管理 个人中心
	Route::get('member_index','UserController@member_index') ;
}) ;


Route::group(['prefix'=>'order','namespace'=>'Home'],function() {
	//用户下单页面  店铺详情页购物车 跳转过来的
	Route::get('order','OrderController@order') ;
	//下单成功页面
	Route::get('order_success','OrderController@order_success') ;
}) ;
