<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\order;
use App\Model\sender;
use App\Model\shop;
use DB;

class OrderlistController extends Controller
{
    //显示订单列表
    public function index(Request $request)
    {   
        $shopid = session('shopid');
        $search = $request->input('search');
        $keywords = $request->input('keywords');
        $page = $request->input('page');
        $state = $request->input('state');
        $recSex = $request->input('recSex');
        $req = $request->all();
        $data = order::where('kid',$shopid);

        if(empty($page)){
            $page = 1;
        }

        if(!empty($search)){
            $data = $data->where($search,'like','%'.$keywords.'%');
        }

        if(!empty($recSex)){
            $data = $data->where('recSex',$recSex);
        }

        if(!empty($state)){
            $data = $data->where('state',$state);
        }

        $data = $data->orderby('created_at','desc')->paginate(3);
        return view('/shop/orderList/index',['data'=>$data,'req'=>$req,'page'=>$page,'state'=>$state,'search'=>$search,'recSex'=>$recSex]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    //展示订单详情
    public function show($id)
    {   
        $data = order::where('id',$id)->first();
        $goodsName0 = order::where('id',$id)->value('goodsName');
        $goodsName = explode('&',$goodsName0);
        $goodsAmount0 = order::where('id',$id)->value('goodsAmount');
        $goodsAmount = explode('&',$goodsAmount0);
        $price0 = order::where('id',$id)->value('price');
        $price = explode('&',$price0);
        $subtotal0 = order::where('id',$id)->value('subtotal');
        $subtotal = explode('&',$subtotal0);
        $payment = order::where('id',$id)->value('payment');
        return view('shop/orderList/detail',['data'=>$data,'goodsName'=>$goodsName,'goodsAmount'=>$goodsAmount,'subtotal'=>$subtotal,'price'=>$price,'payment'=>$payment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    //更新订单状态
    public function update(Request $request, $id)
    {
        $send = $request->input('send');
        $rec = $request->input('rec');
        $shopid = session('shopid');
        
        //更改到已发送状态
        if(!empty($send)){
            $sid = rand(1,5);
            $sender = DB::table('senders')->where('sid',$sid)->first();
            $delivery = DB::table('shops')->where('id',$shopid)->value('delivery');
            $sender['state'] = 2;
            $sender['delivery'] = $delivery;

            $res = order::where('id',$id)->update($sender);
            if($res){
                echo 1;
            }else{
                echo 0;
            }
        }

        //更改到已接单状态
        if(!empty($rec)){
            $res = order::where('id',$id)->update(['state'=>2]);
            if($res){
                echo 1;
            }else{
                echo 0;
            }
        }

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
