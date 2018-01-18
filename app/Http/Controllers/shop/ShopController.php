<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\shop;
use App\Model\food;
use App\Http\Requests\ShopRequest;
use App\Model\system;
class ShopController extends Controller
{
    //显示店铺信息
    public function index()
    {   

        $data = shop::where('id',1)->first();//??????
        $count = food::where('uid',1)->count();//??????
        $shop = shop::where('id',1)->first();
        $shopCate = $shop->systemCate->cateName;////?????????
        return view('shop/shop/index',['data'=>$data,'count'=>$count,'shopCate'=>$shopCate]);
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

    //修改店铺信息
    public function edit($id)
    {
        $data = shop::where('id',$id)->first();
        $shopCate = $data->shopCate;
        $cateName = system::lists('cateName');
        return view('shop/shop/edit',['data'=>$data,'cateName'=>$cateName]);
    }

    //更新店铺信息
    public function update(ShopRequest $request, $id)
    {
        $data = $request->except(['_token','_method']);
        $res = shop::where('id',$id)->update($data);
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
