@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">个人中心</span></div>
        </div>
       <div class="result-wrap">
            <div class="result-title">
                <h1>个人中心</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                <form action="shop.shop"  id="myform" name="myform" enctype='multipart/form-data'>
                    {{csrf_field()}}
                    <li style='margin-left:120px;border:1px solid #fff'>
                        <input type="file" size="85" name="photo" id='picture' class="common-text" title='点击更换头像' style='position:absolute;height:100px;width:1000px;opacity:0'>
                        <img src="http://p2dtot555.bkt.clouddn.com/shop/seller/{{$photo}}" height="100" width="100" id='photo' style='border:3px solid #aaa'>
                    </li>
                </form>           
                    <li>
                        <label class="res-lab">用户</label><span class="res-info">{{$seller['sellerName']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">电话</label><span class="res-info">{{$seller['phone']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">邮箱</label><span class="res-info">{{$seller['email']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">性别</label>
                    @if($sex == 0)
                        <span class="res-info">男</span>
                    @else
                        <span class="res-info">女</span>
                    @endif
                    </li>
                    <li>
                        <a href="/shop/center/{{$seller['id']}}"><button class="btn btn-primary btn6 mr10" style="margin-left:115px">修改</button></a>
                    </li>                    
                </ul>
            </div>
        </div>
       
    </div>
    <!--/main-->
@endsection