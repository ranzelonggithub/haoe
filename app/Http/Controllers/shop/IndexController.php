<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\shop;
use App\model\order;
use App\Model\food;
use App\Model\seller_log;

class IndexController extends Controller
{
    public function index()
    {	
    	$shopid = session('shopid');
    	$sellerid = session('sellerid');
    	$shop =  shop::where('id',$shopid)->first();//???
    	$sellerName = seller_log::where('id',$sellerid)->first()->sellerName;//????
    	$fnum = food::where('uid',$shopid)->count();//?????
    	$onum = order::where('kid',$shopid)->count();
    	$date = floor((time() - strtotime($shop->created_at))/3600/24);
        return view('shop.index.index',['shop'=>$shop,'sellerName'=>$sellerName,'fnum'=>$fnum,'onum'=>$onum,'date'=>$date]);
    }
}
