<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use App\Model\seller_log;

class LoginController extends Controller
{
    //显示登录界面
    public function login()
    {
    	return view('shop.login.login');
    }

    //检查电话号码是否正确
    public function phone(Request $request)
    {
    	$phone = $request->input('phone');  
		if(!preg_match("/^1[34578]{1}\d{9}$/",$phone)){  
		    echo "not"; //不是电话号码
		}else{  
		     $res = seller_log::where('phone',$phone)->first();
		     if($res){
		     	echo 'ok'; //电话可用
		     }else{
		     	echo 'no'; //不是商家电话
		     }
		}  
    }

    //发送验证码
    public function code(Request $request)
    {
    	// $phone = $request->input(phone);
    	// $config = [
    	//     'accessKeyId'    => 'LTAIoIL9CepmtlBW',
    	//     'accessKeySecret' => 'y8cJCQJazGlX1KIhLbNrPw4O3kYomW',
    	// ];

    	// $client  = new Client($config);
    	// $sendSms = new SendSms;
    	// $sendSms->setPhoneNumbers($phone);
    	// $sendSms->setSignName('冉泽龙');
    	// $sendSms->setTemplateCode('SMS_120405864');
    	$code = rand(100000, 999999);
    	// $sendSms->setTemplateParam(['code' => $code);
    	// $sendSms->setOutId('demo');
    	session(['code'=>$code]);
    	// $client->execute($sendSms);
    	echo $code;
    }

    //执行登录
    public function dologin(Request $request)
    {
    	$code = $request->input('code');
    	$phone = $request->input('phone');
    	// $id = shop::where('phone',$phone)->id;
    	//session(['shopid'=>$id]);
    	if($code == session('code')){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }



}
