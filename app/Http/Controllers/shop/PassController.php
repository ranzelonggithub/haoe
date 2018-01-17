<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\http\Requests\CpassRequest;
use App\http\Requests\RepassRequest;
use App\Model\seller_log;
use Hash;

class PassController extends Controller
{
    //跳转到修改密码页
    public function index()
    {   
        $id = 1;//??????
        if(1){
            return view('shop/center/repass',['id'=>$id]);
        }else{
            return view('shop/center/cpass');
        }
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

    //创建密码
    public function store(CpassRequest $request)
    {

        $pass = $request->input('pass');
        
        $hash = Hash::make($pass);
        $res = seller_log::where('id',1)->update(['password'=>$hash]);//????????????
        if($res){
            echo 1;
        }else{
            echo 0;
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
    public function update(RepassRequest $request, $id)
    {
        $oldPass = $request->input('oldPass');
        $newPass = $request->input('newPass');
        $password = seller_log::where('id',$id)->value('password');
        if (Hash::check($oldPass, $password)) {
            $hash = Hash::make($newPass);
            $res = seller_log::where('id',$id)->update(['password'=>$hash]);
            if($res){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 3;
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
