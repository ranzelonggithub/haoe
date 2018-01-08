<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function map()
    {
        //加载首页 地图
        return view('Home/Index/index_map') ;
    }
    public function index()
    {
        //加载首页 网站首页
        return view('Home/Index/index') ;
    }

    public function coop() {
        //加载网站首页 链接到的商家合作页面
        return view('Home/Index/cooperation') ;
    }
}
