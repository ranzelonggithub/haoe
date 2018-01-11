<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\food;
use DB;
use App\Model\system;
use App\Http\Requests\FoodRequest;

class FoodsController extends Controller
{
    
    //菜品列表
    public function index(Request $request)
    {   
        $search = $request->input('search');
        $keywords = $request->input('keywords');
        $requestall = $request->all();
        if(!empty($search)){
            $data = food::where('uid',1)->where($search,'like','%'.$keywords.'%')->orderby('sort','asc')->paginate(5); 
        }else{
            $data = food::where('uid',1)->orderby('sort','asc')->paginate(5);//??????????
        }
        return view('shop.foods.index',['data'=>$data,'request'=>$requestall]);
    }


    //跳转到食物增加页面
    public function create()
    {   
        $cateName = ['早餐','午餐','晚餐','宵夜']; //??????????
        return view('shop.foods.add',['cateName'=>$cateName]);
    }

    //执行食物的添加
    public function store(FoodRequest $request)
    {   
        // dd($request->all());
        $request->flashExcept(['_token','picture']);
        $data = $request->except(['_token','picture']);
        $data['picture'] = 'change.jpg'; //??????????
        $data['uid'] = 1; //??????????
        // dd($data);
        $res = food::insert($data);
        if($res){
            return back()->withInput()->with('state','成功');
        }else{
            return back()->withInput()->with('state','失败');
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

    //编辑菜品
    public function edit($id)
    {
        $data = food::where('id',$id)->first();
        $cate = '早餐';//?????????
        $uid = $data->uid;
        $cateName = system::where('id','!=','uid')->get();//?????????
        return view('/shop/foods/edit',['data'=>$data,'cate'=>$cate,'cateName'=>$cateName,'uid'=>$uid]);
    }

    //更新菜品
    public function update(FoodRequest $request, $id)
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


    public function destroy($id)
    {
        $res = food::where('id',$id)->delete();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
}
