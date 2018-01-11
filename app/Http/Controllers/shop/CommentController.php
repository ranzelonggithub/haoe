<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$username = $request->input('cateName');
        //$age = $request->input('content');
        //$sex = $request->input('reply');
        //$requestall = $request->all();
        //查询数据并且分页
        $comment = DB::table('comments')->get();
        //if(isset($username)){
        //    $users -> where('username','like','%'.$username.'%');
        //}
        //if(isset($age)){
        //    $users -> where('age','like','%'.$age.'%');
        //}  
        //
        //if(isset($sex)){
        //    $users -> where('sex','like','%'.$sex.'%');
        //}  
        //
        //$data = $users ->paginate(10);
        //return view('index',['data'=>$data,'request'=>$requestall]);

		//var_dump($users);die;
		return view('shop.comment.design',['data'=>$comment]);
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
       $users = DB::table('comments')->get();
	   return view('shop.comment.insert');
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
