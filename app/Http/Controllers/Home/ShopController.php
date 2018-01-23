<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\food ;
use App\Model\shop ;
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
        $shop_info = DB::table('shops')->where('id',$id)->get() ;
        //dd($shop_info) ;
        $cates = DB::table('shops')->where('id',$id)->value('cate') ;

        //shops表的食品分类
        $cates = explode( "&",$cates );
        //当前店铺食物信息
        $data = food::where('uid',$id)->get() ;
        
        //dump($data) ;

       //加载店铺详情页
        return view('Home.Shop.shop_detail',['cates'=>$cates,'data'=>$data,'shop_info'=>$shop_info,'id'=>$id]) ;
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
}
