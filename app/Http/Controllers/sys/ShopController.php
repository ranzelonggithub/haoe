<?php
namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\seller_log;
use App\Model\seller_info;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $res = DB::table('seller_logs')
            ->join('seller_infos', 'seller_logs.id', '=', 'seller_infos.id')
            ->join('shops', 'seller_logs.id', '=', 'shops.uid')
            ->where('auth','=',1)
            ->select('seller_logs.*', 'shops.auth','seller_infos.busi_license','seller_infos.cate_licence')
            ->paginate(1);
        //dump($res);
        //
        $data = DB::table('systems')->get();
        
        //加载店家管理页面
        return view('system.shop.design',['res'=>$res,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载店家添加页面
        return view('system.shop.insert');
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
        $data = $request->except(['_token']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //店铺详情页

        $res = DB::table('shops')->where('id','=',$id)->first();

        return view('system.shop.show',['res'=>$res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //加载店家修改页面
        return view('system.shop.edit');
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
        //删除
        $res = DB::table('seller_logs')->where('id',$id)->delete();
        if($res){
            echo '<script>alert("删除成功");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }else{
            echo '<script>alert("删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }
    }
}
