<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\shop;
use App\model\food;

class ShopController extends Controller
{
    //显示店铺信息
    public function index()
    {   

        $data = shop::where('uid',1)->first();
        return view('shop/shop/system',['data'=>$data]);
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
            //1.获取文件
            $pic = $request -> file('logo');
             //2.获取文件后缀名
            $hz = $pic->getClientOriginalExtension();
            //3.随机文件名字
            $temp_name = md5(time()+rand(10000,99999));
            // //4.拼接
            $filename = $temp_name.'.'.$hz;
            // $disk = \Storage::disk('qiniu');
            // $disk->put('shop/shop/'.$filename,$contents);
            $pic->move('./upload/shop/shop',$filename);
            return $filename;
            // dd($request->all());


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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
