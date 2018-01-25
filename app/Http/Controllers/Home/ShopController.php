<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\food ;
use App\Model\shop ;
use App\Model\cart ;
use DB ;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop_detail(Request $req)
    {
        //foods表批量插入数据
        /*$tmp = [] ;
        //食物类别
        $cate = [0,1,2,3,4,5] ;
        //食物名称
        $goodsName = ['北京鸭梨','京白梨','白鸡','烧鸭','油鸡','果脯','北京蜂王精','北京秋梨膏','茯苓夹饼','北京酥糖','六必居酱菜','北京织毯','北京雕漆','景泰蓝','北京玉器','内画壶','北京葡萄酒','北京白凤龙','安宫牛黄丸','虎骨酒','京绣','桃补花','涮羊肉','北京酸菜','大磨盘柿','密云金丝小枣','少峰山玫瑰花','门头沟大核桃','凉皮','岐山哨子面','牛羊肉泡馍','荞面饸饹','陕西蒜沾面','BIANG BIANG面','杨凌蘸水面','贾三灌汤包','槐花麦饭','洋芋擦擦','八宝甑糕','油馍','肉夹馍','黄桂柿子饼','搅团','浆水面','玫瑰镜糕','面鱼子','葫芦头','南汇水蜜桃','三林糖酱瓜','佘山兰笋','松江回鳃鲈','枫泾西蹄','城隍庙五香豆','崇明金瓜','南桥乳腐','高桥松饼','嘉定大白蒜','嘉定竹刻','崇明水仙花','硕绣','兰印花布','张江腰菱','南翔小笼馒头','鼎日有福建肉松','新长发糖炒栗子','稻香村鸭肫肝','浦东三黄鸡'] ;
        for($i = 0; $i <= 66; $i++) {
            //店铺ID
            $tmp['uid'] = mt_rand(1,5) ;
            //食物类别
            $tmp['cate'] = $cate[mt_rand(0,5)] ;
            //食物名称
            $tmp['goodsName'] = $goodsName[$i] ;
            //食物图片
            $tmp['picture'] = 'logo.jpg' ;
            //食物描述
            $tmp['description'] = '这是剧变的中国，人和食物比任何时候走得更快。无论他们的脚步怎样匆忙， 不管聚散和悲欢，来得有多么不由自主，总有一种味道，以其独有的方式，每天三次，在舌尖上提醒着我们：认清明天的去向，不忘，昨天的来处。' ;
            //食物单价
            $tmp['price'] = mt_rand(0,100).'.'.mt_rand(0.01,0.99) ;
            //食物状态 0下架 1上架
            $tmp['state'] = mt_rand(0,1) ;
            //食物总评分 默认0
            $tmp['grade'] = mt_rand(0,100) ;
            //排序 默认1
            $tmp['sort'] = mt_rand(0,1) ;
            //食物月销售
            $tmp['amount'] = mt_rand(0,9999) ;
            food::insert($tmp) ;
        } */  
        $id = $req->input('id') ;
        //dd($id) ;
        //$data = DB::table('foods')->join('shops','foods.uid','=','shops.id')->where('shops.id',$id)->get() ;
        //当前店铺信息
        // $shop_info = DB::table('shops')->where('id',$id)->get() ;
        $shop_info = DB::table('shops')->where('id',$id)->first() ;
        //dd($shop_info) ;
        $cates = DB::table('shops')->where('id',$id)->value('cate') ;

        //shops表的食品分类
        $cates = explode( "&",$cates );
        //当前店铺食物信息
        $data = food::where('uid',$id)->get() ;
        // dump(session('userid'));
        //当前登录用户id
        if(null != session('userid')){
            $userid = session('userid');
            $state = 1;
            //购物车食物件数
            $cart = cart::where('uid',$userid)->where('sid',$id)->first();
            if($cart){
                $payment = $cart->payment;
                $good = json_decode($cart->goods,true);
                $num = 0;
                // dump($good);
                foreach($good as $k => $v){
                    $num += $v['goodsAmount'];
                    
                    $good[$k]['price'] = food::where('uid',$id)->where('goodsName',$v['goodsName'])->first()->price;
                }
            }else{
                $payment = 0;
                $num = 0;
                $good = array(); 
            }

        }else{
            $payment = 0;
            $num = 0;
            $good = array();
            $userid = '';
            $state = 0;
        }


       //加载店铺详情页
        return view('Home.Shop.shop_detail',['cates'=>$cates,'data'=>$data,'shop_info'=>$shop_info,'id'=>$id,'userid'=>$userid,'num'=>$num,'good'=>$good,'payment'=>$payment,'state'=>$state]) ;
    }

    public function shop_comment(Request $req) 
    {
        $id = $req->input('id') ;
        //加载店铺评论页
        return view('Home/Shop/shop_comment',['id'=>$id]) ;
    }
    public function shop_brand(Request $req) 
    {
        $id = $req->input('id') ;
        //加载店铺大家都在点 页面
        return view('Home/Shop/shop_brand',['id'=>$id]) ;
    }
     public function shop_intro(Request $req) 
    {
        $id = $req->input('id') ;
        //根据id查询店铺详情
        $info = shop::where('id',$id)->get() ;
        //dump($info) ;
        //加载店铺简介 页面
        return view('Home.Shop.shop_intro',['info'=>$info,'id'=>$id]) ;
    }

    //增加购物车内的食物-------店铺ID用户ID为定值,需修改
    public function carts(Request $request)
    {
        $uid = session('userid');
        $fid = $request->input('fid');
        $food = food::where('id',$fid)->first();
        $cart = cart::where('uid',$uid)->where('sid',$food->uid)->first(); //判断是否存在用户在此店铺的购物车;

        if($cart){
            $good = json_decode($cart->goods,true);
            $res1 = array_key_exists($fid, $good); //判断购物车中是否存在此食品
            $num = 1;
            foreach($good as $k => $v){
                $num += $v['goodsAmount']; //购物车中食物的总数量
            }
            if($res1){
                $good[$fid]['goodsName'] = $food->goodsName;
                $good[$fid]['price'] = $food->price;
                $good[$fid]['goodsAmount'] += 1; //存储形式 食物id['goodsName'=>食物名称,'goodsAmount'=>食物数量,'subtotal'=>小计]
                $good[$fid]['subtotal'] = $good[$fid]['goodsAmount']*$food->price;
                $json_good = json_encode($good); //将食物以json的形式存储
                $payment = $cart->payment + $food->price;
                $res2 = cart::where('uid',$uid)->where('sid',$food->uid)->update(['goods'=>$json_good,'payment'=>$payment]);
                $data = ['goodsName'=>$food->goodsName,'price'=>$good[$fid]['price'],'goodsAmount'=>$good[$fid]['goodsAmount'],'subtotal'=>$good[$fid]['subtotal'],'payment'=>$payment,'num'=>$num];
                if($res2){
                    $data['state'] = 1;
                    return $data; //在已存在购物车并且所选食物已存在
                }else{
                    $data['state'] = 'fail';
                    return $data; //更新失败
                }

            }else{
                $good[$fid]['goodsName'] = $food->goodsName;
                $good[$fid]['price'] = $food->price;
                $good[$fid]['goodsAmount'] = 1;
                $good[$fid]['subtotal'] = $food->price;
                $json_good = json_encode($good);
                $payment = $cart->payment + $food->price;
                $res3 = cart::where('uid',$uid)->where('sid',$food->uid)->update(['goods'=>$json_good,'payment'=>$payment]);
                $data = ['goodsName'=>$food->goodsName,'price'=>$good[$fid]['price'],'goodsAmount'=>$good[$fid]['goodsAmount'],'subtotal'=>$good[$fid]['subtotal'],'payment'=>$payment,'num'=>$num];
                if($res3){
                    $data['state'] = 2;
                    return $data; //在已存在购物车并且所选食物不存在
                }else{
                    $data['state'] = 'fail';
                    return $data; //更新失败
                }
            }
        }else{
            $good[$fid]['goodsName'] = $food->goodsName;
            $good[$fid]['price'] = $food->price;
            $good[$fid]['goodsAmount'] = 1;
            $good[$fid]['subtotal'] = $food->price;
            $json_good = json_encode($good);
            $payment = $food->price;
            $cart1 = ['uid'=>$uid,'sid'=>$food->uid,'goods'=>$json_good,'payment'=>$payment]; //?????????
            $res4 = cart::insert($cart1);
            $data = ['goodsName'=>$food->goodsName,'price'=>$good[$fid]['price'],'goodsAmount'=>$good[$fid]['goodsAmount'],'subtotal'=>$good[$fid]['subtotal'],'payment'=>$payment,'num'=>1];
            if($res4){
                $data['state'] = 3;
                return $data; //购物车不存在,加入一件食物
            }else{
                $data['state'] = 'fail';
                return $data; //更新失败
            }
        }
    }

    //减少购物车内的食物-------店铺ID用户ID为定值,需修改
    public function min(Request $request)
    {
        $uid = session('userid');
        $fid = $request->input('fid');
        $food = food::where('id',$fid)->first();
        $cart = cart::where('uid',$uid )->where('sid',$food->uid)->first(); //查找此用户在本店的购物车;
        
        $good = json_decode($cart->goods,true); //将json格式转换为数组
        $num = -1;
        foreach($good as $k => $v){
            $num += $v['goodsAmount']; //购物车中食物的总数量
        }
        if($num != 0){
            $good[$fid]['goodsName'] = $food->goodsName;
            $good[$fid]['price'] = $food->price;
            $good[$fid]['goodsAmount'] -= 1; //存储形式 食物id['goodsName'=>食物名称,'goodsAmount'=>食物数量,'subtotal'=>小计]

            if($good[$fid]['goodsAmount'] == 0){
                unset($good[$fid]);
                $json_good = json_encode($good);
                $payment = $cart->payment - $food->price;
                $res2 = cart::where('uid',$uid )->where('sid',$food->uid)->update(['goods'=>$json_good,'payment'=>$payment]);
                $data['state'] = 4;
                $data['fid'] = $fid;
                $data['num'] = $num;
                return $data;//该食物的个数为零,在购物车中将其删除
            }else{
               $good[$fid]['subtotal'] = $good[$fid]['goodsAmount']*$food->price;
               $json_good = json_encode($good); //将食物以json的形式存储
               $payment = $cart->payment - $food->price;
               $res2 = cart::where('uid',$uid )->where('sid',$food->uid)->update(['goods'=>$json_good,'payment'=>$payment]);
               $data = ['goodsName'=>$food->goodsName,'price'=>$good[$fid]['price'],'goodsAmount'=>$good[$fid]['goodsAmount'],'subtotal'=>$good[$fid]['subtotal'],'payment'=>$payment,'num'=>$num]; 
               $data['state'] = 5;
               return $data;//若食物仍存在,则将其数量减1,并减少其小计;
            }
        }else{
            
            
            $res = cart::where('uid',$uid)->where('sid',$food->uid)->delete();
            if($res){
                $data['state'] = 6; //将购物车删除 
                return $data; 
            }else{
                $data['state'] = 7; //删除失败,数据未更改,不变
                return $data;
            }
            
            
        }
    }

    //将购物车内的数据全部删除
    public function clear(Request $request)
    {
       $sid =  $request->input('sid');
       $uid = 1;//???????
       $res = cart::where('uid',$uid)->where('sid',$sid)->delete();
       if($res){
            echo 1; //全部删除成功
       }else{
            echo 2; //全部删除失败
       }
    }
        
}
