<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use App\Model\user_log;
use Hash;

class LoginController extends Controller
{
    //显示登录界面
    public function login()
    {
        return view('Home.login.login');
    }

    //检查电话号码是否正确
    public function phone(Request $request)
    {
        $phone = $request->input('phone');  
        if(!preg_match("/^1[34578]{1}\d{9}$/",$phone)){  
            echo "not"; //不是电话号码
        }else{  
             $res = user_log::where('phone',$phone)->first();
             if($res){
                echo 'ok'; //电话可用
             }else{
               $res = user_log::insert(['phone'=>$phone]);
               if($res){
                    echo 'ok';
               }else{
                    echo 'not';
               }
             }
        }  
    }

    //发送验证码
    public function code(Request $request)
    {
        $phone = $request->input('phone');
        $config = [
            'accessKeyId'    => 'LTAIoIL9CepmtlBW',
            'accessKeySecret' => 'y8cJCQJazGlX1KIhLbNrPw4O3kYomW',
        ];

        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers($phone);
        $sendSms->setSignName('冉泽龙');
        $sendSms->setTemplateCode('SMS_120405864');
        $code = rand(100000, 999999);
        $sendSms->setTemplateParam(['code' => $code]);
        $sendSms->setOutId('demo');
        session(['code'=>$code]);
        $client->execute($sendSms);
        echo 1;
    }

    //执行登录
    public function dologin(Request $request)
    {
        $code = $request->input('code');
        $phone = $request->input('phone');
        $userid = user_log::where('phone',$phone)->value('id');
        session(['userid'=>$userid]);
        if($code == session('code')){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function plogin(Request $request)
    {   
        $flag = 0;
        $txtUser = $request->input('txtUser');
        $password = $request->input('password');
        $password1 = user_log::where('userName',$txtUser)->value('passWord');
        $password2 = user_log::where('phone',$txtUser)->value('passWord');
        $password3 = user_log::where('email',$txtUser)->value('passWord');
        // echo password1;
        if(!empty($password1)){
            if(Hash::check($password, $password1)){
                $flag = 1;
                $userid = user_log::where('userName',$txtUser)->value('id');
            }
        }

        if(!empty($password2)){
            if(Hash::check($password, $password2)){
                $flag = 1;
                $userid = user_log::where('phone',$txtUser)->value('id');
            }
        }

        if(!empty($password3)){
            if(Hash::check($password, $password3)){
                $flag = 1;
                $userid = user_log::where('email',$txtUser)->value('id');
            }
        }

        if($flag){
            session(['userid'=>$userid]);
            echo 1;
        }else{
            echo 0;
        }


    }

    public function logout()
    {
        session(['userid'=>null]);
        return redirect('/home/list');
    }


}
