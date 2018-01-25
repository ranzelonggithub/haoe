<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\user_log;
use App\Model\user_info;
use App\Http\Requests\UserInfoRequest;
use DB;
use Hash;
use Illuminate\Pagination\LengthAwarePaginator; 
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        //搜索
        $res = DB::table('user_logs')
            ->join('user_infos', 'user_logs.id', '=', 'user_infos.uid')
            ->select('user_logs.*', 'user_infos.auth')
            ->paginate(2);
        //加载用户管理视图
        return view('system.user.design',['res'=>$res]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载用户添加视图
        return view('system.user.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInfoRequest $request)
    {
        $file = $request->file('photo');
        //获取文件路径
        $filepath = $file->getRealPath();
        //获取文件后缀名
        $hz = $file->getClientOriginalExtension();

        $filename = md5(time()+rand(0,99999)).'.'.$hz;
        // dump($filename); 
     
        //上传图像七牛
        $disk = \Storage::disk('qiniu');
        $res = $disk->put("/home/user/".$filename,file_get_contents($filepath));
        
        $data = $request->except(['_token','_method','photo','auth','repass']); 
        
        $user = DB::table('user_logs')->where('userName','=',$data['userName'])->first();
        
        if($data['userName'] == $user['userName']){
            echo '<script>alert("用户名已存在");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
            return;
        }
        //获取插入返回的id
        $res = DB::table('user_logs')->insertGetid($data);

        //获取auth添加info表
        $info = $request->only('auth');
        $info['photo'] = $filename;
        $info['uid'] = $res;
        $infos = DB::table('user_infos')->insert($info);

        //判断
        if($res && $infos){
            echo '<script>alert("添加成功");location.href="/sys/user"</script>';
        }else{
            echo '<script>alert("添加失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
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

        $data = DB::table('user_logs')->where('id',$id)->first();

        $res = DB::table('user_infos')->where('id',$id)->first();
        //加载用户修改视图
        return view('system.user.edit',['data'=>$data,'res'=>$res]);
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

        $file = $request->file('photo');
        //获取文件路径
        $filepath = $file->getRealPath();

        //获取文件后缀名
        $hz = $file->getClientOriginalExtension();

        $filename = md5(time()+rand(0,99999)).'.'.$hz;

        $disk = \Storage::disk('qiniu');
        $res = $disk->put('/home/user/'.$filename,file_get_contents($filepath));

        //获取auth
        $info = $request->only('auth');

        $info['photo'] = $filename;

        $infos = DB::table('user_infos')->where('id',$id)->update($info);
  
        $data = $request->except(['_token','_method','photo','auth','repass']); 
        $data['passWord'] = Hash::make($data['passWord']);
        
        $res = DB::table('user_logs')->where('id',$id)->update($data);

        if($res && $infos){
            echo '<script>alert("修改成功");location.href="/sys/user"</script>';
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
        $res = DB::table('user_logs')->where('id',$id)->delete();
        if($res){
            echo '<script>alert("删除成功");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }else{
            echo '<script>alert("删除失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }
    }
}
