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
                        <label class="res-lab">店铺名称</label><span class="res-info">###</span>
                    </li>
                    <li>
                        <label class="res-lab">店铺老板</label><span class="res-info">###</span>
                    </li>
                    <li>
                        <label class="res-lab">菜品总量</label><span class="res-info">###</span>
                    </li>
                    <li>
                        <label class="res-lab">总订单量</label><span class="res-info">###</span>
                    </li>
                    <li>
                        <label class="res-lab">开店天数</label><span class="res-info">###</span>
                    </li>
                    <li>
                        <label class="res-lab">店铺评分</label><span class="res-info">###</span>
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