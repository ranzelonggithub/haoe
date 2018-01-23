<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\shop ;
use App\Model\system ;
use DB ;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function map()
    {
        //加载首页 地图

        return view('Home/Index/index_map') ;
    }
    public function index()
    {
        //加载首页 网站首页
       //取菜品分类
        //system::get() ;
       /* $tmp = [] ;
        $shopName = ['碗里优','峥峥','青禾一品','思源斋','兰桂坊酒家','赛百味','客来香','纳家楼','伊斯坦饱','江都小镇','沪江香','东来顺','喜尚','慕味康','金鼎轩','尚座','粥饼坊','隆兴','全嘉福','古井食楼','食悦阁','味谷登','日昌','丽华苑','畅然居'] ;
        $addr = ['福州晋安区宦溪镇和尚背尼姑','杭州市西湖区立马回头公交站','辽源市友谊六组兴国村大猪圈','杭州市萧山区义蓬镇火星村','四川省广安市岳池恐龙乡','云南过桥米线三元二村公共厕所金门路','福州晋安区宦溪镇和尚背尼姑','杭州市西湖区立马回头公交站','辽源市友谊六组兴国村大猪圈','杭州市萧山区义蓬镇火星村','四川省广安市岳池恐龙乡','云南过桥米线三元二村公共厕所金门路'] ;
        $shopCate = [1,2,3,4,5,6,7,8] ;
        $cate = ['冷面系列','一品料理','寿喜锅套餐系列 套餐','特色煎饺','蔬菜色拉系列','炒面系列','盖饭','小炒','米饭','酒水|饮料','炒菜','特价菜','招牌菜','特色菜'] ;
        $delivery = ['专送','众包','快送'] ;
        $arr = [] ;
        for($i = 0; $i <= 100; $i++) {
            //卖家id
            $tmp['uid'] = mt_rand(1,10) ;
            //店铺名称
            $tmp['shopName'] = $shopName[mt_rand(0,count($shopName) - 1)] ;
            //dd($tmp['shopName']) ;
            //店铺地址
            $tmp['address'] = $addr[mt_rand(0,count($addr) - 1)] ;
            //门户logo
            $tmp['logo'] = 'logo.jpg' ;
            //店铺类别
            $tmp['shopCate'] = $shopCate[mt_rand(0,count($shopCate) - 1)] ;
            //店内照片
            $tmp['insidePic'] = 'logo.jpg' ;
            //门脸照片
            $tmp['frontPic'] = 'logo.jpg' ;
            //食物照片
            $tmp['goodPic'] = 'logo.jpg' ;
            //实物类别
            shuffle($cate) ;
            $tmp['cate'] = $cate[0].'&'.$cate[1].'&'.$cate[2].'&'.$cate[3].'&'.$cate[4] ;
            //配送费
            $tmp['deliPrice'] =  mt_rand(0,100) ;
            //起步价
            $tmp['initPrice'] = mt_rand(0,100) ;
            //店铺公告
            $tmp['notice'] = '不是三四千 不是一两千 只要九九八
        只要九九八，下单带回家，既能么么哒，又能啪啪啪 不要再犹豫了 马上发私信订购吧' ;  
           //早上开店时间
            $tmp['openTime'] = '08:30' ;
            //晚上关门时间
            $tmp['closeTime'] = '24:30' ;
            //店铺电话
            $tmp['shopPhone'] = '1' . mt_rand(3000,9999). mt_rand(0,999999) ;
            //配送方式
            $tmp['delivery'] = $delivery[mt_rand(0,2)] ;
            //评分
            $tmp['grade'] = mt_rand(0,5) .'.'. mt_rand(0,9) ;
            //店铺月销售量
            $tmp['amount'] = mt_rand(0,10000) ;
            //店铺权限 0 封店 1 正常开店(后台给的)
            $tmp['auth'] = mt_rand(0,1) ;
            //店铺开关状态 0 出租/转让 1 正常开店
            $tmp['state'] = mt_rand(0,1) ;
            shop::insert($tmp) ;
        }*/
       //取菜品分类

        //$data_sys = system::get() ;
        $data_sys = system::lists('cateName') ;
        //dd($data_sys) ;
        //取店铺信息
        $data_shop = shop::get() ;
        
        $res = DB::table('configs')->get();
        //dd($data_shop) ;
        return view('Home.Index.index',['data_sys'=>$data_sys,'data_shop'=>$data_shop,'res'=>$res]) ;
    }


    public function update(Request $req,$id) 
    {
        
        /*$shopCate_id = $req->input('shopCate_id') ;
        $status = $req->input('status') ;
        dump($shopCate_id) ;
        dump($status) ;*/

        $shops = DB::table('shops') ;
        /*if(isset($shopCate_id)) {
            $shops->where('shopCate',$shopCate_id) ;
        }*/
        if(isset($id)) {
            $shops->where('shopCate',$id) ;
        }
        
        $data_shop = $shops->get();
        // dd($data_shop) ;
        // $msg = json_encode($data_shop) ;

        return  $data_shop ;
    }
    /*
     销量 提交查询
    */
    public function store(Request $req)
    {
        //销量降序 配送费升序 取36条
        $shops = shop::orderby('amount','desc')->orderby('initPrice','asc')->take(36)->get() ;
        return $shops ;
    }
    /*
        起步价提交查询
    */
    public function create()
    {
        //起步价升序 配送费降序 取36条initPrice
        $shops = shop::orderby('initPrice','asc')->orderby('deliPrice','asc')->take(36)->get() ;
        return $shops ;
    }
    public function edit($id)
    {
        //配送费 deliPrice = 0
        $shops = shop::where('deliPrice',0)->take(36)->get() ;
        return $shops ;
    }

    public function coop() {
        //加载网站首页 链接到的商家合作页面
        return view('Home/Index/cooperation') ;
    }


}
