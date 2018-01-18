<?php

namespace App\Http\Controllers\sys;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $res = DB::table('systems')->paginate(2);
        //加载分类管理的视图
        return view('system.category.design',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $res = DB::table('user_logs')->where('id',session('id'))->first();
        //加载增加分类视图
        return view('system.category.insert',['res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
        $cate = $request->only('cateName');
        $res = DB::table('systems')->insert($cate);

        if($res){
            echo '<script>alert("添加成功");location.href="/sys/category"</script>';
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
        $res = DB::table('user_logs')->where('id',session('id'))->first();
        dump($res);
        $data = DB::table('systems')->where('id',$id)->first();
        dump($data);
        //加载分类管理的视图
        return view('system.category.edit',['res'=>$res,'data'=>$data]);    
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
        
        $cate = $request->only('cateName');
        
        $res = DB::table('systems')->where('id',$id)->update($cate);
        
        if($res){
            echo '<script>alert("修改成功");location.href="/sys/category"</script>';
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
        
        $res = DB::table('systems')->where('id',$id)->delete();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
       

    }
}
