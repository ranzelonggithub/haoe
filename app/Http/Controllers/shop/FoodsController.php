<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\food;
use DB;
use App\Model\system;

class FoodsController extends Controller
{
    
    //菜品列表
    public function index()
    {   
        $data = food::paginate(5);
        return view('shop.foods.index',['data'=>$data]);
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

    //编辑菜品
    public function edit($id)
    {
        $data = food::where('id',$id)->first();
        $cate = $data->cate->cateName;
        $uid = $data->uid;
        $cateName = system::where('id','!=','uid')->get();
        return view('/shop/foods/edit',['data'=>$data,'cate'=>$cate,'cateName'=>$cateName,'uid'=>$uid]);
    }

    //更新菜品
    public function update(Request $request, $id)
    {   

        $data = $request->except(['_token','_method','picture']);
        $data['picture'] = 'change.jpg';
        $res = food::where('id',$id)->update($data);
        if($res){
            return redirect('/shop/foods');
        }else{
            echo "<script>location.history=".$_SERVER['HTTP_REFERER']."</script>";
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
