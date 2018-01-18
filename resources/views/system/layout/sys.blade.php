<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>系统后台管理</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/systems/css/common.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/systems/css/main.css')}}"/>
    <script type="text/javascript" src="{{ asset('/systems/js/jquery-1.8.3.js') }}"></script>
    <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">

            <h1 class="topbar-logo none"><a href="{{'/sys/user/index'}}" class="navbar-brand">后台管理</a></h1>

            <ul class="navbar-list clearfix">
                <li><a class="on" href="{{'/sys/index'}}">首页</a></li>
                <li><a href="http://www.17sucai.com/" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员</a></li>

                <li><a href="/sys/pass">修改密码</a></li>
                <li><a href="{{'/sys/del'}}">退出</a></li>

            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>

                    <a href="#"><i class="icon-font">&#xe003;</i>管理员操作</a>

                    <ul class="sub-menu">
                        <li><a href="{{'/sys/user'}}"><i class="icon-font">&#xe008;</i>用户管理</a></li>
                        <li><a href="{{'/sys/shop'}}"><i class="icon-font">&#xe005;</i>店家管理</a></li>
                        <li><a href="{{'/sys/order'}}"><i class="icon-font">&#xe006;</i>订单管理</a></li>
                        <li><a href="{{'/sys/shenqing'}}"><i class="icon-font">&#xe004;</i>申请管理</a></li>
                        <li><a href="{{'/sys/category'}}"><i class="icon-font">&#xe012;</i>分类管理</a></li>
                        <li><a href="{{'/sys/config'}}"><i class="icon-font">&#xe052;</i>配置管理</a></li>
                        <li><a href="{{'/sys/ad'}}"><i class="icon-font">&#xe033;</i>广告管理</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    @section('content')



    @show
</div>
</body>
</html>