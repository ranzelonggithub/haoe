<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\user_info ;
use App\Model\user_log ;
use Hash ;
use App\Model\order ;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *  加载个人订单
     * @return \Illuminate\Http\Response
     */
    public function member_order(Request $req)
    {
        $id = $req->input('id') ;
        //根据用户id查询 订单表order
        $data = order::where('uid',$id)->get() ;
        // dump($data) ;
        //订单状态
        $state = ['未发送','正在发送','已接受','未接单'] ;
        return view('Home/User/member_order',['data'=>$data,'state'=>$state,'id'=>$id]) ;
    }
    //加载订单详情页面
    public function member_collect(Request $req)
    {
        //当前用户id
        $uid = $req->input('uid') ;
        //当前订单号
        $order_id = $req->input('order_id') ;
        /*dump($uid) ;
        dump($order_id) ;*/
        //查询当前订单信息
        $data = order::where('id',$order_id)->get() ;
        //食品名称
        $goodsName = order::where('id',$order_id)->value('goodsName') ;
        $goodsNames = explode('&',$goodsName) ;
        //dump($goodsNames) ;
        //食品数量
        $goodsAmount = order::where('id',$order_id)->value('goodsAmount') ;
        $goodsAmounts = explode('&',$goodsAmount) ;
        //dump($goodsAmounts) ;
        //小计
        $subtotal = order::where('id',$order_id)->value('subtotal') ;
        $subtotals = explode('&',$subtotal) ;
        //dump($subtotals) ;
        return view('Home/User/member_collect',['id'=>$uid,'data'=>$data,'goodsNames'=>$goodsNames,'goodsAmounts'=>$goodsAmounts,'subtotals'=>$subtotals]) ;
    }
    //用户地址管理member_addr
     public function member_addr()
    {
        return view('Home/User/member_addr') ;
    }
    //账号管理  个人中心member_index
    public function member_index()
    {
        //用户id 先定死
        $id = 5;
        //user_info表查询用户详细信息
        $data = user_info::where('uid',$id)->join('user_logs','user_infos.uid','=','user_logs.id')->get() ; 
        //dump($data) ;
        //根据用户id 查询order表 state=3已接收 
        //总订单数
        $total_order = user_info::where('user_infos.uid',$id)->join('orders','user_infos.uid','=','orders.uid')->count() ;
        //成功单数 state=3已接收
        $success_order = user_info::where('user_infos.uid',$id)->join('orders','user_infos.uid','=','orders.uid')->where('orders.state',3)->count() ;
        // dump($total_order) ;
        // dump($success_order) ;
        return view('Home.User.member_index',['data'=>$data,'total_order'=>$total_order,'success_order'=>$success_order,'id'=>$id]) ;
    }
    //修改用户名
    public function userName_edit(Request $req) {
        $id = $req->input('id') ;
        //根据id查询当前用户名
        $userName = user_log::where('id',$id)->value('userName') ;
        // dump($userName) ;
        return view('Home.User.userName_edit',['userName'=>$userName,'id'=>$id]) ;
    }
    //用户名执行修改
    public function userName_change(Request $req) 
    {
        $userName = $req->input('name') ;
        $id = $req->input('id') ;
        //userName唯一  先查询 在修改
        $a = user_log::where('userName',$userName)->get() ;
        // echo count($a) ;
        if(count(user_log::where('userName',$userName)->get()) > 0){
            echo '用户名已经存在' ;
        }else {
            $res = user_log::where('id',$id)->update(['userName'=>$userName]) ;
            if($res) {
                echo '修改成功' ;
            }else {
                echo '修改失败' ;
            }
        }
    }
    //用户性别修改
    public function sex_edit(Request $req) 
    {
        $id = $req->input('id') ;
        //根据id查询 用户性别
        $sex = user_info::where('uid',$id)->value('sex') ;
        //dump($sex) ;
        return view('Home.User.sex_edit',['sex'=>$sex,'id'=>$id]) ;
    }

    //执行性别修改
    public function sex_change(Request $req) 
    {
        $id = $req->input('id') ;
        $sex = $req->input('sex') ;
        //dump($sex) ;
        if($sex == '男') {
            $sex = 'm' ;
        }else {
            $sex = 'w' ;
        }
        //dump($sex) ;
        //执行修改
        $res = user_info::where('uid',$id)->update(['sex'=>$sex]) ;
        if($res) {
            echo '修改成功' ;
        }else {
            echo '修改失败' ;
        }

    }
    //密码添加页面
    public function pass_add(Request $req) 
    {
        //获取id 
        $id = $req->input('id') ;
        return view('Home.User.pass_add',['id'=>$id]) ;
    }
    public function pass_add_do(Request $req) {
        $id = $req->input('id') ;
        $pass = $req->input('passWord') ;
        //密码哈希加密之后 存入数据库
        $passWord = Hash::make($pass) ;
        //修改 存入数据库
        $res = user_log::where('id',$id)->update(['passWord'=>$passWord]) ; 
        if($res) {
            echo '密码添加成功' ;
        }else {
            echo '密码添加失败' ;
        }
        
    }
    //若是有密码  密码修改
    public function pass_edit(Request $req) 
    {
        $id = $req->input('id') ;
     
        return view('Home.User.pass_edit',['id'=>$id]) ;
    }
    //验证原密码
    public function pass_edit_do(Request $req) 
    {
        // echo 1 ;
        $id = $req->input('id') ;
        //查询原密码
        //echo $id ;
        $old_pass = user_log::where('id',$id)->value('passWord') ; 
        //echo $pass ;
        $pass = $req->input('text') ;
        /*echo $old_pass . '<br />';
        echo $pass ;*/
        //验证输入的原密码是否正确
        if (Hash::check($pass, $old_pass)) {
            echo '继续修改...' ;
        }else {
            echo '原密码输入错误' ;
        }
    }
    //执行密码修改
    public function pass_edit_do_go(Request $req) 
    {
        $id = $req->input('id') ;
        $pass = $req->input('passWord') ;
        //加密后 存入数据库
        //密码哈希加密之后 存入数据库
        $passWord = Hash::make($pass) ;
        //修改 存入数据库
        $res = user_log::where('id',$id)->update(['passWord'=>$passWord]) ; 
        if($res) {
            echo '密码修改成功' ;
        }else {
            echo '密码修改失败' ;
        }
    }
    
}
