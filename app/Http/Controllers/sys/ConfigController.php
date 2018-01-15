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
        dump($res);
        return view('system.config.system',['res'=>$res]);
    }

    /**
     * 执行网站配置修改
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        dump($id);

        $date =$request->except('_token');

        $file = $request->file('loge');
        //获取文件路径
        $filepath = $file->getRealPath();

        //获取文件后缀名
        $hz = $file->getClientOriginalExtension();

        $filename = md5(time()+rand(0,99999)).'.'.$hz;

        $disk = \Storage::disk('qiniu');
        $res = $disk->put('/sys/imgs'.$filename,$filepath);
        dump($res);
        $date['loge'] = $filename;
        dump($date);
       
        $data = DB::table('configs')->where('id',$id)->update($date);
        dump($data);
    }
}
    