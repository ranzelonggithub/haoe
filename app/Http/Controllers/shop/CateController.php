<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\shop;

class CateController extends Controller
{

    public function index()
    {
        $cate = shop::where('id',1)->value('cate');//?????????
        $cate = explode('&',$cate);
        return view('/shop/category/index',['cate'=>$cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $newName = $request->input('newName');
        $cate = shop::where('id',1)->value('cate');//?????
        $cate = explode('&',$cate);
        if(in_array($newName,$cate)){
            echo 'has';
        }else{
            $cate[] = $newName;
            $num = count($cate)-1;
            $cate = implode('&',$cate);
            $res = shop::where('id',1)->update(['cate'=>$cate]);
            if($res){
                echo $num;
            }else{
                echo 'fail';
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

    //编辑种类
    public function update(Request $request, $id)
    {
        $newName = $request->input('newName');
        $cate = shop::where('id',1)->value('cate');//?????
        $cate = explode('&',$cate);
        // $key = array_search($id,$cate);
        array_splice($cate,$id,1,$newName);
        $cate = implode('&',$cate);
        $res = shop::where('id',1)->update(['cate'=>$cate]);
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }

    //删除种类
    public function destroy($id)
    {
        $cate = shop::where('id',1)->value('cate');//?????
        $cate = explode('&',$cate);
        array_splice($cate,$id,1);
        $cate = implode('&',$cate);
        $res = shop::where('id',1)->update(['cate'=>$cate]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
}
