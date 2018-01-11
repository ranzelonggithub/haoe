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
<<<<<<< HEAD
     * 执行网站配置修改
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //去除_token
        $res = $request->except(['_token']);
        //判断是否有文件上传
        if($request->hasFile('loge')){
            $loge = $request -> file('loge');

        };

        

        //检测
        if($request->hasFile('pic')){
            //1.创建上传对象
            $pic = $request -> file('pic');
            //2.获取文件后缀名
            $hz = $pic->getClientOriginalExtension();
            //3.随机文件名字
            $temp_name = md5(time()+rand(10000,99999));
            //4.拼接
            $filename = $temp_name.'.'.$hz;
            //5.上传
            $pic->move('./uploads/'.date("Ymd",time()),$filename);
        }else{
            dd('没有文件上传');
        }
=======
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function create(Request $request, $id)
=======
    public function update(Request $request, $id)
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
