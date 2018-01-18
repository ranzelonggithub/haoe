@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>店铺主页</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>快捷操作</h1>
            </div>
            <div class="result-content">
                <div class="short-wrap">
                    <a href="#"><i class="icon-font">&#xe001;</i>###</a>
                    <a href="#"><i class="icon-font">&#xe005;</i>###</a>
                    <a href="#"><i class="icon-font">&#xe048;</i>###</a>
                    <a href="#"><i class="icon-font">&#xe041;</i>###</a>
                    <a href="#"><i class="icon-font">&#xe01e;</i>###</a>
                </div>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>店铺基本信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">店铺名称</label><span class="res-info">{{$data['shopName']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">店铺类别</label><span class="res-info">{{$shopCate}}</span>
                    </li>
                    <li>
                        <label class="res-lab">店铺地址</label><span class="res-info">{{$data['address']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">店铺电话</label><span class="res-info">{{$data['shopPhone']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">食物总数</label><span class="res-info">{{$count}}</span>
                    </li>
                    <li>
                        <label class="res-lab">配&nbsp&nbsp送&nbsp费</label><span class="res-info">{{$data['deliPrice']}}元</span>
                    </li>
                    <li>
                        <label class="res-lab">起&nbsp&nbsp步&nbsp价</label><span class="res-info">{{$data['initPrice']}}元</span>
                    </li>
                    <li>
                        <label class="res-lab">开店时间</label><span class="res-info">{{$data['openTime']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">关店时间</label><span class="res-info">{{$data['closeTime']}}</span>
                    </li> 
                    <li>
                    @if($data['state'] == 0)
                        <label class="res-lab">店铺状态</label><span class="res-info">关店</span>
                    @else
                        <label class="res-lab">店铺状态</label><span class="res-info">开店</span>
                    @endif
                    </li> 
                    <li>
                        <label class="res-lab">配送方式</label><span class="res-info">{{$data['delivery']}}元</span>
                    </li>                   
                    <li>
                        <label class="res-lab">店铺公告</label><span class="res-info">{{$data['notice']}}</span>
                    </li>
                    <li>
                        <a href="/shop/shop/{{$data['id']}}/edit"><button class="btn btn-primary btn6 mr10" style="margin-left:90px">修改</button></a>
                    </li>                    
                </ul>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>其他信息</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">注册地址：</label><span class="res-info"><a href="###">好饿呀</a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/main-->
@endsection