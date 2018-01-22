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
//商铺登录路由
Route::group(['prefix'=>'shop','namespace'=>'shop'],function(){
	//手机登录
	Route::get('login','LoginController@login');
	Route::post('phone','LoginController@phone');
	Route::post('code','LoginController@code');
	Route::post('dologin','LoginController@dologin');
	

	//普通登录
	Route::post('plogin','LoginController@plogin');
});
//商铺路由组
Route::group(['prefix'=>'shop','namespace'=>'shop','middleware'=>'shopLogin'],function(){
	
	//进入首页
	Route::post('shouye','LoginController@index');

	//退出登录
	Route::get('logout','LoginController@logout');
	
	//主页
	Route::get('index','IndexController@index');

	//食品管理
	Route::resource('/foods','FoodsController');
	Route::post('/foods/picture','FoodsController@chengePicture');

	//店铺管理
	Route::resource('/shop','ShopController');
	Route::resource('cate','CateController');

	//订单管理
	Route::resource('/order','OrderlistController');

	//个人中心
	Route::resource('/center','centerController');

	//密码修改
	Route::resource('/pass','PassController');

	//评论管理
	Route::resource('/comment','CommentController');
	
});



Route::group(['prefix'=>'home','namespace'=>'Home'],function() {
	 //加载登陆注册界面
	// Route::get('login','LoginController@index') ;
	Route::resource('/login/login','LoginController') ;
	 //加载首页 地图
	Route::get('map','IndexController@map') ;
	//加载首页 网站首页
	Route::get('list','IndexController@index') ;
	//加载网站首页 链接到的商家合作页面
	Route::get('coop','IndexController@coop') ;

	//店铺信息
	Route::group(['prefix'=>'shop'],function() {
		//加载店铺详情页
		Route::get('shop_detail','ShopController@shop_detail') ;
		//加载店铺评论页
		Route::get('shop_comment','ShopController@shop_comment') ;
		////加载店铺大家都在点 页面
		Route::get('shop_brand','ShopController@shop_brand') ;
		//加载店铺简介 页面
		Route::get('shop_intro','ShopController@shop_intro') ;
	}) ;
	Route::group(['prefix'=>'user'],function() {
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

}) ;







//系统后台登入的路由
Route::group(['prefix'=>'sys','namespace'=>'sys'],function(){
	//系统后台登入页面
	Route::get('/do','LoginController@index');

	//系统后台验证码生成路由
	Route::get('/code','LoginController@code');

	//执行登入的路由
	Route::post('/login','LoginController@login');
});

//系统后台主页路由
Route::group(['prefix'=>'sys','namespace'=>'sys','middleware'=>'login'],function(){
	
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
	Route::post('/doconfig/{id}','ConfigController@update');

	//系统广告管理路由
	Route::resource('ad','AdController');
	
	//商圈管理路由
	Route::resource('business','BusinessController');
});





