<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\user_log;
use App\Model\user_info;
use App\Http\Requests\UserInfoRequest;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   


        $res = user_log::paginate(2);

        // $date = DB::table('user_logs')->paginate(2);
        // dump($date);
        // $res = $date ->paginate(2);
        
        // dump($res);
        //dump($date);
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
        //执行用户添加
        $date = $request->except(['_token','auth','photo']);
        dump($date);
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

        dump($data);
        //加载用户修改视图
        return view('system.user.edit',['data'=>$data]);
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
        
        dump($request->$id);
        $data = $request->except(['_token','_method','photo','auth']); 

        dump($data);
        // $res = DB::table('user_logs')->where('id',$id)->update($data);
        // if($res){
        //     echo '<script>alert("修改成功");location.href="/sys/user"</script>';
        // }else{
        //     echo '<script>alert("修改失败");location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
        // }

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
