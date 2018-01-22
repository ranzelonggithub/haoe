<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\seller_log;
use App\Model\seller_info;
use App\Http\Requests\SellerRequest;

class centerController extends Controller
{
    //个人中心首页
    public function index()
    {   
        $sellerid = session('sellerid');
        $seller = seller_log::where('id',$sellerid)->first();
        $sex = $seller->seller_info->sex;
        $photo =  $seller->seller_info->photo;
        return view('/shop/center/index',['seller'=>$seller,'sex'=>$sex,'photo'=>$photo]);
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

    //跟新个人头像
    public function store(Request $request)
    {
        // 更新个人头像 1.获取文件
        $pic = $request -> file('photo');
        $id = $request->input('id');
        if(!empty($pic)){
            //2.获取文件后缀名
            $hz = $pic->getClientOriginalExtension();
            //3.随机文件名字
            $temp_name = md5(time()+rand(10000,99999));
            //4.拼接
            $filename = $temp_name.'.'.$hz;
            $path = $pic->getRealPath();

            //文件上传
            $disk = \Storage::disk('qiniu');
            $res = $disk->put('/shop/seller/'.$filename,file_get_contents($path));
            if($res){
                $photo = seller_info::where('uid',$id)->value('photo');
                if($photo != 'seller.jpg'){
                    $disk->delete("/shop/seller/".$photo);
                }
                $res = seller_info::where('uid',$id)->update(['photo'=>$filename]);
                if($res){
                    echo $filename;
                }else{
                    echo 'seller.jpg';
                }
            }
            
        }else{
          echo 0;  
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

    }

    //进入个人信息修改界面
    public function edit($id)
    {   
        $sellerid = session('sellerid');
        $seller = seller_log::where('id',$sellerid)->first();//??????????
        $sex = $seller->seller_info->sex;
        return view('/shop/center/edit',['seller'=>$seller,'sex'=>$sex]);
    }

    //更新个人信息
    public function update(SellerRequest $request, $id)
    {   
        
        //更新个人信息
        $info = $request->input('info');
        if(!empty($info)){
            $data1 = $request->only(['sellerName','phone','email']);
            $data2 = $request->only(['sex']);
            $res1 = seller_log::where('id',$id)->update($data1);
            if($res1){
                $res2 = seller_info::where('uid',$id)->update($data2);
                if($res2){
                    echo 1;
                }else{
                    echo 3;
                }
            }else{
                echo 0;//
            }

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
