<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *  加载个人订单
     * @return \Illuminate\Http\Response
     */
    public function member_order()
    {
        return view('Home/User/member_order') ;
    }
    //加载用户收藏页面
    public function member_collect()
    {
        return view('Home/User/member_collect') ;
    }
    //用户地址管理member_addr
     public function member_addr()
    {
        return view('Home/User/member_addr') ;
    }
    //账号管理  个人中心member_index
    public function member_index()
    {
        return view('Home/User/member_index') ;
    }
    
}
