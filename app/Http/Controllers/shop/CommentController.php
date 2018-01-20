<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\comment;
use App\Model\order;
use DB;

class CommentController extends Controller
{
    //评论列表
    public function index(Request $request)
    {   
        $search = $request->input('search');
        $keywords = $request->input('keywords');
        $page = $request->input('page');
        $comState = $request->input('comState');
        $req = $request->all();
        $data = DB::table('orders')->where('kid','1')->where('comState',2)
                ->join('comments','orders.id','=','comments.oid')
                ->select('comments.*','orders.orderNum','orders.payment','orders.recName','orders.recPhone');//?????????

        if(empty($page)){
            $page = 1;
        }

        if(!empty($search)){
            $data = $data->where($search,'like','%'.$keywords.'%');
        }

        // if(!empty($comState)){
        //     $data = $data->where('comState','=',$comState);
        // }

        $data = $data->orderby('comments.time','desc')->paginate(3);
        return view('shop.comment.index',['data'=>$data,'req'=>$req,'page'=>$page,'search'=>$search,'comState'=>$comState]);
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

    //评价详情
    public function show($id)
    {   
        $data = comment::where('id',$id)->first();
        $data['orderNum'] = $data->order->orderNum;
        $data['recName'] = $data->order->recName;
        $data['recPhone'] = $data->order->recPhone;
        $data['deliName'] = $data->order->deliName;
        $data['deliPhone'] = $data->order->deliPhone;
        $food = $data->order->goodsName;
        $food = explode('&',$food);
        $goodsAmount =  $data->order->goodsAmount;
        $goodsAmount = explode('&',$goodsAmount);
        $goodsGrade = $data->goodsGrade;
        $goodsGrade = explode('&',$goodsGrade);
        return view('shop.comment.detail',['data'=>$data,'food'=>$food,'goodsAmount'=>$goodsAmount,'goodsGrade'=>$goodsGrade]);
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

    //执行回复
    public function update(Request $request, $id)
    {
        $reply = $request->input('reply');
        $res = comment::where('id',$id)->update(['reply'=>$reply]);
        if($res){
            echo 1;
        }else{
            echo 0;
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
