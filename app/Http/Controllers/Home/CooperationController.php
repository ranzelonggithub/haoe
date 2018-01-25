<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\system ;
use App\Model\business ;
use App\Model\shop ;
use Qiniu\Storage\UploadManager;
use Qiniu\Auth;
use App\Model\seller_log ;

class CooperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //店铺分类
        $cateName = system::select('cateName')->get() ;
        //dump($cateName) ;
        //市 
        $city = business::where('pid',0)->get() ;
        //dump($cities) ;
        //区
        $distract = [] ;
        $trade = [] ;


        //加载商家注册页面
        return view('Home.Coop.index',['cateName'=>$cateName,'city'=>$city,'distract'=>$distract,'trade'=>$trade]) ;
    }
    //form表单提交
    public function index_form(Request $req) 
    {
        //dd('123213123') ;
        //店铺名 shop
        $shopName = $req->input('shopName') ;
        //店铺电话 shop
        $shopPhone = $req->input('shopPhone') ;
        //联系人 seller_log
        $sellerName = $req->input('sellerName') ;
        //联系人电话seller_log
        $phone = $req->input('phone') ;
        //店铺地址 shop
        $address = $req->input('address') ;
        //店铺分类 shop
        $shopCate = $req->input('shopCate') ;
        //开店时间 shop
        $openTime = $req->input('openTime') ;
        //关店时间 shop
        $closeTime = $req->input('closeTime') ;
        //市id  shop
        $city_id = $req->input('city') ;
        //区 id shop
        $distract_id = $req->input('distract') ;
        //商圈 shop
        $trade_id = $req->input('trade') ;
        if(empty($shopName) || empty($shopPhone) || empty($sellerName) || empty($phone) || empty($address) || empty($shopCate) || empty($openTime) || empty($closeTime) || empty($city_id) || empty($distract) || empty($trade)) {
            echo '字段不能为空 ' ;
        }
        //shop  表插入数据
        $res = shop::insert(['shopName'=>$shopName,'shopPhone'=>$shopPhone,'address'=>$address,'shopCate'=>$shopCate,'openTime'=>$openTime,'closeTime'=>$closeTime,'city'=>$city_id,'distract'=>$distract_id,'trade'=>$trade_id]) ;
        if($res) {
            $res2 = seller_log::insert(['sellerName'=>$sellerName,'phone'=>$phone]) ;
            if($res2) {
                echo '插入成功' ;
            }
        }
        return view('Home.Coop.two') ;
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
        $cid = $request->input('city');
        $did =  $request->input('distract');
        
        if(!empty($cid)){
            $data = business::where('pid',$cid)->get();
        }


        if(!empty($did)){
            $data = business::where('pid',$did)->get();
        }
        return $data;
    }

    //表单提交 门脸图片上传
    public function upload(Request $request) 
    {
        //shop表 店铺id=1
        $id = 1 ;
        $pic = $request -> file('photo');

        //门脸照片
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
            $res = $disk->put('/shop/shop/'.$filename,file_get_contents($path));


            if($res){
                $picture = shop::where('id',$id)->value('frontPic');
                if($picture != 'logo.jpg'){
                      $disk->delete("/shop/shop/".$picture);
                }
                $res = shop::where('id',$id)->update(['frontPic'=>$filename]);
                if($res){
                      echo $filename;
                }else{
                      echo 'logo.jpg';
                }
            }else {
                echo '没有文件上传' ;
            }
        }  
        
    }
    //表单提交 店内图片上传
    public function upload1(Request $request) 
    {
        //shop表 店铺id=1
        $id = 1 ;
       
        $pic1 = $request -> file('photo1');

        //店内图片
        if(!empty($pic1)){
            //2.获取文件后缀名
            $hz = $pic1->getClientOriginalExtension();
            //3.随机文件名字
            $temp_name = md5(time()+rand(10000,99999));
            //4.拼接
            $filename = $temp_name.'.'.$hz;
            $path = $pic1->getRealPath();
              
            //文件上传
            $disk = \Storage::disk('qiniu');
            $res = $disk->put('/shop/shop/'.$filename,file_get_contents($path));


            if($res){
                $picture = shop::where('id',$id)->value('insidePic');
                if($picture != 'logo.jpg'){
                      $disk->delete("/shop/shop/".$picture);
                }
                $res = shop::where('id',$id)->update(['insidePic'=>$filename]);
                if($res){
                      echo $filename;
                }else{
                      echo 'logo.jpg';
                }
            }else {
                echo '没有文件上传' ;
            }
        }  
    }
         //表单提交 logo上传
    public function upload2(Request $request) 
    {
        //shop表 店铺id=1
        $id = 1 ;
       
        $pic2 = $request -> file('photo2');

        //logo照片
        if(!empty($pic2)){
            //2.获取文件后缀名
            $hz = $pic2->getClientOriginalExtension();
            //3.随机文件名字
            $temp_name = md5(time()+rand(10000,99999));
            //4.拼接
            $filename = $temp_name.'.'.$hz;
            $path = $pic2->getRealPath();
              
            //文件上传
            $disk = \Storage::disk('qiniu');
            $res = $disk->put('/shop/shop/'.$filename,file_get_contents($path));


            if($res){
                $picture = shop::where('id',$id)->value('logo');
                if($picture != 'logo.jpg'){
                      $disk->delete("/shop/shop/".$picture);
                }
                $res = shop::where('id',$id)->update(['logo'=>$filename]);
                if($res){
                      echo $filename;
                }else{
                      echo 'logo.jpg';
                }
            }else {
                echo '没有文件上传' ;
            }
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
        echo $id ;
        //根据传过来的$id 查询当前父级下面的子类
        $distract = business::where('id',$id)->get() ;
        return $distract ;
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
