<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\cart ;
use App\Model\address ;
use App\Model\shop ;
use App\Model\order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {   
        //加载用户下订单页面 点击购物车结算过来的
        $uid = session('userid'); //用户id
        $sid = $request->input('id') ; 
        $id = cart::where('uid',$uid)->where('sid',$sid)->value('id');//购物车id
        $cart =  cart::where('uid',$uid)->where('sid',$sid)->first();
        // dump($cart);
        /*
            应该是点击结算  购物信息存储在redis里面
            提交订单之后  再写入数据库
        */
      

        //根据uid 查询address表
        $addrs = address::where('uid',$uid)->get() ; 
      
        //根据id查询cart表 获取购物车商品信息
        //备注  填写完保存订单表
        //商品名
        $goods = $cart->goods;
        // $goodsNames = explode('&',$goodsName)  ;
        $goods = json_decode($goods,true);
        $goodsNames = [];   //食品名称
        $goodsAmounts = []; //食品数量
        $prices = [];       //食品单价
        $subtotals = [];    //食品小计
        foreach($goods as $k => $v){
            $goodsNames[] = $v['goodsName'];
            $goodsAmounts[] = $v['goodsAmount'];
            $prices [] = $v['price'];
            $subtotals[] = $v['subtotal'];
        }

        
        //总计
        $payment = $cart->payment;

        //根据店铺id sid=1 查询店铺配送费
        
        $deliPrice = shop::where('id',$sid)->value('deliPrice') ;
        return view('Home.Order.order',['addrs'=>$addrs,'uid'=>$uid,'cartid'=>$id,'goodsNames'=>$goodsNames,'goodsAmounts'=>$goodsAmounts,'prices'=>$prices,'subtotals'=>$subtotals,'payment'=>$payment,'deliPrice'=>$deliPrice]) ;
    }
    //加载新增地址页面
    public function order_add(Request $req) 
    {   
        $id = $req->input('id') ;
        
        return view('Home.Order.order_add',['id'=>$id]) ;
    }
    //执行地址添加
    public function order_insert(Request $req) 
    {
        $id = $req->input('id') ;
        //收货人姓名
        $recName = $req->input('recName') ;
        //收货人电话
        $recPhone = $req->input('recPhone') ;
        //收货人地址
        $detailAddr = $req->input('detailAddr') ;

        //写入 address数据库
        $res = address::insert(['recName'=>$recName,'recPhone'=>$recPhone,'detailAddr'=>$detailAddr,'uid'=>$id]) ;
        if($res) {
            echo '添加成功' ;
        }else {
            echo '添加失败' ;
        }

    }
    //地址删除
    public function order_del(Request $req) 
    {
        $id = $req->input('id') ;
        // echo $id ;
        //根据id 删除address记录
        $res = address::where('id',$id)->delete() ;
        if($res) {
            echo '删除成功' ;
        }else {
            echo '删除失败' ;
        }
    }
    //地址修改
    public function order_edit(Request $req) 
    {   
        $id = $req->input('id') ;
        //根据id 查询地址信息
        $data_edit = address::where('id',$id)->get() ;
        return $data_edit ;
    }
    //执行地址修改
    public function order_update(Request $req) 
    {
        $id = $req->input('id') ;
        $detailAddr = $req->input('detailAddr') ;
        $recName = $req->input('recName') ;
        $recPhone = $req->input('recPhone') ;

        //echo  $id . ' ' . $detailAddr . ' ' . $recName . ' ' . $recPhone ;
        $res = address::where('id',$id)->update(['recName'=>$recName,'recPhone'=>$recPhone,'detailAddr'=>$detailAddr]) ;
       if($res) {
            echo '修改成功' ;
        }else {
            echo '修改失败' ;
        }
    }


    //加载下单成功页面order_success
     public function order_success(Request $request)
    {   
        // $comment = $request->input('com');
        // $uid = $request->input('userid'); //用户id;
        // $cartid = $request->input('cartid'); //购物车id
        // $aid = $request->input('addrid'); //地址id
        // $cart = cart::where('id',$cartid)->first();
        // $kid = $cart->sid; //店铺id;

        
        // $goods = $cart->goods;
        // // $goodsNames = explode('&',$goodsName)  ;
        // $goods = json_decode($goods,true);
        // $fid = array_keys($goods);
        // $fid = implode('&',$fid); //食品id
        // $picture = shop::where('id',$kid)->value('logo'); //店铺图片
        // $picture = shop::where('id',$kid)->value('shopName'); //店铺名称
        // $shopPhone = shop::where('id',$kid)->value('shopPhone'); //店铺电话
        // $orderNum = time().rand(100000,999999); //订单号
        // $goodsNames = [];   //食品名称
        // $goodsAmounts = []; //食品数量
        // $prices = [];       //食品单价
        // $subtotals = [];    //食品小计
        // foreach($goods as $k => $v){
        //     $goodsNames[] = $v['goodsName'];
        //     $goodsAmounts[] = $v['goodsAmount'];
        //     $prices [] = $v['price'];
        //     $subtotals[] = $v['subtotal'];
        // }

        // $goodsNames = implode('&',$goodsNames );   //食品名称
        // $goodsAmounts = implode('&',$goodsAmounts ); //食品数量
        // $prices = implode('&',$prices );       //食品单价
        // $subtotals =implode('&',$subtotals );    //食品小计
        
        
        // $payment = $cart->payment; //实际支付
        // $deliPrice =  shop::where('id',$kid)->value('deliPrice'); //配送费
        // //根据uid 查询address表
        // $addrs = address::where('uid',$aid)->first() ;
        // $recName  = $addrs->recName; //收货人姓名
        // $recPhone = $addrs->recPhone;
        // $autoAddr = $addrs->autoAddr;
        // $detailAddr = $addrs->detailAddr;
        // $recSex = $addrs->recSex;

        $data['comment'] = $request->input('com');
        $data['uid'] = $request->input('userid'); //用户id;
        $uid = $request->input('userid'); //用户id;
        $cartid = $request->input('cartid'); //购物车id
        $data['aid'] = $request->input('addrid'); //地址id
        $aid = $request->input('addrid'); //地址id
        $cart = cart::where('id',$cartid)->first();
        // dd($cartid);
        $data['kid'] = $cart->sid; //店铺id;
        $kid = $cart->sid;//店铺id;

        
        $goods = $cart->goods;
        // $goodsNames = explode('&',$goodsName)  ;
        $goods = json_decode($goods,true);
        $fid = array_keys($goods);
        $data['fid'] = implode('&',$fid); //食品id
        $data['picture'] = shop::where('id',$kid)->value('logo'); //店铺图片
        $data['shopName'] = shop::where('id',$kid)->value('shopName'); //店铺名称
        $data['shopPhone'] = shop::where('id',$kid)->value('shopPhone'); //店铺电话
        $data['orderNum'] = time().rand(100000,999999); //订单号
        $goodsNames = [];   //食品名称
        $goodsAmounts = []; //食品数量
        $prices = [];       //食品单价
        $subtotals = [];    //食品小计
        foreach($goods as $k => $v){
            $goodsNames[] = $v['goodsName'];
            $goodsAmounts[] = $v['goodsAmount'];
            $prices [] = $v['price'];
            $subtotals[] = $v['subtotal'];
        }

        $data['goodsName'] = implode('&',$goodsNames );   //食品名称
        $data['goodsAmount'] = implode('&',$goodsAmounts ); //食品数量
        $data['price'] = implode('&',$prices );       //食品单价
        $data['subtotal'] =implode('&',$subtotals );    //食品小计
        
        
        $data['payment'] = $cart->payment; //实际支付
        $data['deliPrice'] =  shop::where('id',$kid)->value('deliPrice'); //配送费
        //根据uid 查询address表
        $addrs = address::where('id',$aid)->first() ;
        $data['recName']  = $addrs->recName; //收货人姓名
        $data['recPhone'] = $addrs->recPhone;
        $data['autoAddr'] = $addrs->autoAddr;
        $data['detailAddr'] = $addrs->detailAddr;
        $data['recSex'] = $addrs->recSex;
        $data['time'] = date("Y-m-d H:i:s",time());
        $res = order::insert($data);
        if($res){
            cart::where('id',$cartid)->delete();
            // echo "<script>history.go(-1)</script>";
            //加载用户下订单页面
            return view('Home/Order/order_success') ;
        }else{
            echo "<script>history.go(-1)</script>";
        }

        
    }

    
}
