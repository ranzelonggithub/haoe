<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\user_log;
use Hash;
use App\Http\Requests\UserInfoRequest;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        return view('system.index.index');
    }


    //加载修改密码的视图
    public function pass()
    {
        $res = user_log::where('id','=',session('id'))->first();
        
        return view('system.index.edit',['res'=>$res]);
    }

    //执行修改密码的视图
    public function update(UserInfoRequest $request)
    {
        $id = $request->id;
        $res = $request->except('_token');
        

        //判断密码是否一致
        if(!($res['passWord'] == $res['repass'])){
            echo '<script>alert("密码不一致");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }
        
        $password = Hash::make($res['passWord']);
        //执行添加
        $res = user_log::where('id',$id)->update(['passWord'=>$password]);
        if($res){
            echo '<script>alert("修改成功");location.href="/sys/do"</script>';
        }else{
            echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }

    }

    //执行退出的方法
    public function del(Request $request)
    {
        $res = $request->session()->forget('id');
       
        if($res == null){
            echo '<script>alert("退出成功");location.href="/sys/do"</script>';
        }

        return view('system.index.index');
    }

}
