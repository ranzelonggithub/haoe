<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="{{asset('shops/css/common.css')}}"/>
    <link rel="stylesheet" type="text/css" href="/systems/css/main.css"/>
    <script type="text/javascript" src="{{asset('shops/js/jquery-1.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="http://www.17sucai.com/" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员</a></li>
                <li><a href="#">修改密码</a></li>
                <li><a href="#">退出</a></li>
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
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/shop/index"><i class="icon-font">&#xe008;</i>店铺主页</a></li>
                        <li><a href="/shop/foods"><i class="icon-font">&#xe005;</i>食品管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe018;</i>回 收 站</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe006;</i>店铺管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe004;</i>订单管理</a></li>
                        <li><a href="design.html"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    
    <!--/sidebar-->

@section('content')

@show
    </div>
    <!--/main-->
</div>
</body>
</html>