<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class ShenqingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载申请管理视图
        $res = DB::table('seller_logs')
            ->join('seller_infos', 'seller_logs.id', '=', 'seller_infos.id')
            ->join('shops', 'seller_logs.id', '=', 'shops.uid')
            ->where('auth','=',0)
            ->select('seller_logs.*', 'seller_infos.identify','shops.auth','seller_infos.busi_license','seller_infos.cate_licence')
            ->paginate(2);

        return view('system.shenqing.design',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加申请视图
        return view('system.shenqing.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //详情
        
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
        $res = DB::table('shops')->where('id',$id)->first();
        dump($res); 
        return view('/system/shenqing/show',['res'=>$res]);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //执行修改
        dump($id);
         
        $auth = $request->only('auth');
        $res = DB::table('shops')->where('id',$id)->update($auth);
        if($res){
            echo '<script>alert("修改成功");location.href="/sys/shop"</script>';
        }else{
            echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
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
