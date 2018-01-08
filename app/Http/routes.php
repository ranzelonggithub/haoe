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

Route::resource('/login','Home\LoginController') ;

Route::group(['prefix'=>'home','namespace'=>'Home'],function() {
	Route::get('map','IndexController@map') ;
	Route::get('list','IndexController@index') ;
	Route::get('coop','IndexController@coop') ;
}) ;

Route::group(['prefix'=>'shop','namespace'=>'Home'],function() {
	Route::get('shop_list','ShopController@shop_list') ;
}) ;
