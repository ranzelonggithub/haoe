<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\config;
use DB;
class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载配置管理视图
        $res = DB::table('configs')->get();

        return view('system.config.system',['res'=>$res]);
    }

    /**
     * 执行网站配置修改
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        //获取提交的数据
        $date =$request->except('_token');

        $file = $request->file('logo');
        //获取文件路径
        $filepath = $file->getRealPath();

        //获取文件后缀名
        $hz = $file->getClientOriginalExtension();

        $filename = md5(time()+rand(0,99999)).'.'.$hz;

        $disk = \Storage::disk('qiniu');
        $res = $disk->put('/systems/sysimgs/'.$filename,file_get_contents($filepath));

        $date['logo'] = $filename;
       
        $data = DB::table('configs')->where('id',$id)->update($date);

        //修改成功
        if($data){
            echo '<script>alert("修改成功");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }else{
            echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }
    }
}
    