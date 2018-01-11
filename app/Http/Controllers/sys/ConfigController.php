<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载配置管理视图
        return view('system.config.system');
    }

    /**
     * 执行网站配置修改
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    
    }
}
