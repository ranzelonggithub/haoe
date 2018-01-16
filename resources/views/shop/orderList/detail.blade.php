@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
           <div class="crumb-list"><i class="icon-font"></i><a href="javascript:void(0)">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name"><a href="javascript:void(0)">订单管理</a></span><span class="crumb-step">&gt;</span><span class="crumb-name">订单详情</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <h1>订单详情</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">订&nbsp单&nbsp&nbsp号</label><span class="res-info">{{$data['orderNum']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">下单时间</label><span class="res-info">{{$data['time']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">订单状态</label>
                        @if($data['state']==4)
                            <span class="res-info">未接单</span>
                        @elseif($data['state']==1)
                            <span class="res-info">未发送</span>
                        @elseif($data['state']==2)
                            <span class="res-info">已发送</span>
                        @else
                            <span class="res-info">已接收</span>
                        @endif
                    </li>
                    <li>
                        <label class="res-lab">收货姓名</label><span class="res-info">{{$data['recName']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">收货性别</label>
                    @if($data['recSex']==0)
                        <span class="res-info">男</span>
                    @else
                        <span class="res-info">女</span>
                    @endif
                    </li>
                    <li>
                        <label class="res-lab">收货电话</label><span class="res-info">{{$data['recPhone']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">收货地址</label><span class="res-info">{{$data['autoAddr']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">详细地址</label><span class="res-info">{{$data['detailAddr']}}</span>
                    </li>
                    
                    <li>
                        <label class="res-lab">备&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp注</label><span class="res-info">{{$data['comment']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">配送方式</label><span class="res-info">{{$data['delivery']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">配送姓名</label><span class="res-info">{{$data['deliName']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">配送电话</label><span class="res-info">{{$data['deliPhone']}}</span>
                    </li>
                    <li>
                        <table width='700px' class="order-table" min-width='700px' cellpadding='4px'> 
                           <caption><font size='4'><b>订&nbsp单&nbsp详&nbsp情</b></font></caption>
                            <tr>
                                <td>食品名称</td>
                                <td>食品数量</td>
                                <td>食品单价</td>
                                <td>小计</td>
                            </tr>
                        @foreach($goodsName as $k => $v)
                            <tr>
                                <td>{{$goodsName[$k]}}</td>
                                <td>{{$goodsAmount[$k]}}</td>
                                <td>{{$price[$k]}}元</td>
                                <td>{{$subtotal[$k]}}元</td>
                            </tr>
                        @endforeach
                            <tr>
                                <td>总计</td>
                                <td></td>
                                <td></td>
                                <td>{{$payment}}元</td>
                            </tr>
                        </table>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <!--/main-->
@endsection