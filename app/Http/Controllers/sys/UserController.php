<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Model\user_log;
use App\Model\user_info;

=======
use DB;
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

<<<<<<< HEAD
        $res = user_log::get();
        //加载用户管理视图
        return view('system.user.design',['res'=>$res]);

=======

        $res = DB::table('user_logs')
        ->join('user_infos','user_logs.id','=','user_infos.uid')
        ->select('user_logs.*','user_infos.auth')
        ->get();
        //dump($res);
        //加载用户管理视图
        return view('system.user.design',['res'=>$res]);
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
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
    public function store(Request $request)
    {
<<<<<<< HEAD
        //执行添加
=======
        //
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
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
<<<<<<< HEAD

        // $res = User_log::where('id','=',$id)->first();
        // dump($res);
=======
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
        //加载用户修改视图
        return view('/system.user.edit');
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
        //
<<<<<<< HEAD
        echo 123;
=======
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
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
<<<<<<< HEAD
        dump($id);
=======
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
    }
}
