<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder; //验证码
use session;
use DB;
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
        $res = DB::table('user_logs');
        dump($res);
    	dump(session('code'));
    	dump($request->all());
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
