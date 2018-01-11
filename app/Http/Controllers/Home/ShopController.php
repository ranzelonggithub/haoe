<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop_detail()
    {
        //加载店铺详情页
        return view('Home/Shop/shop_detail') ;
    }

    public function shop_comment() 
    {
        //加载店铺评论页
        return view('Home/Shop/shop_comment') ;
    }
    public function shop_brand() 
    {
        //加载店铺大家都在点 页面
        return view('Home/Shop/shop_brand') ;
    }
     public function shop_intro() 
    {
        //加载店铺简介 页面
        return view('Home/Shop/shop_intro') ;
    }
}
