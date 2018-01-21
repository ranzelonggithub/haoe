<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\business;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = business::get();
        return view('system.business.index',['data'=>$data]);
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
        $id = $request->input('id');
        $newName = $request->input('newName');
        $model = $request->input('m');
        $res = business::where('area',$newName)->first();
        //判断是否已存在
        if($res){
            $data['state'] = 'has';
            return $data;
        }

        if($id == 'a'){
             $res = business::insertGetId(['area'=>$newName,'pid'=>0]);
             if($res){
                $data = ['state'=>'add_city','id'=>$res];
                return $data; //添加市级分类
             }else{
                $data['stata'] = 'fail';
                return $data;
             }
        }else{
            $res = business::insertGetId(['area'=>$newName,'pid'=>$id]);
             if($res){
                $data = ['state'=>$model,'id'=>$res,];
                return $data; //添加区以及商圈分类
             }else{
                $data['state'] = 'fail';
                return $data;
             }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = business::where('pid',$id)->get();
        return $data;
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
        $newName = $request->input('newName');
        $res = business::where('id',$id)->update(['area'=>$newName]);
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }

    //删除
    public function destroy($id)
    {
        $res = business::where('pid',$id)->first();
        if($res){
            return 3;
        }

        $res = business::where('id',$id)->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
}