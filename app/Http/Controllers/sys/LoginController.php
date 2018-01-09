<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder; //验证码
use session;
use App\Model\User_log;
use Hash;
class LoginController extends Controller
{	

	//系统后台登入页面
     public function index()
    {
        return view('system.login.login');
       
    }

    //执行后台登入的方法
    public function login(Request $request)
    {
        
        //获取提交数据
        $res = $request->except('_token');

        //查询登入的信息
        $res = User_log::where('userName',$res['userName'])->first();
        
        //判断是否有权限登入
        // if(!$res->Userlogin->auth == 1){
        //     return redirect('/sys');
        // }

        //判断用户名是否存在
        // if(!$log){
        //     return redirect('/sys');
        // }

        //判断密码是否正确
        // if(!Hash::check($res['passWord']==$log['passWord'])){
        //     return redirect('/sys');
        // }

        //判断验证码
        // if(Session('code') != $res['code']){
        //     return redirect('/sys');
        // }
    	
    }

    //加载验证码
    public function code()
    {
    	$builder = new CaptchaBuilder ; //实例化验证码
		$builder -> build(); //生成验证码
		session(['code'=>$builder->getPhrase()]); //获取验证码内容存入session
		header('Content-type:image/jpeg'); 
		$builder ->output();

    }
}
