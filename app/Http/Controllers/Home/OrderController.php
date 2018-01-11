<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order()
    {
        //加载用户下订单页面
        return view('Home/Order/order') ;
    }
    //加载下单成功页面order_success
     public function order_success()
    {
        //加载用户下订单页面
        return view('Home/Order/order_success') ;
    }

    
}
