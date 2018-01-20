@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
           <div class="crumb-list"><i class="icon-font"></i><a href="javascript:void(0)">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name"><a href="javascript:void(0)">评价管理</a></span><span class="crumb-step">&gt;</span><span class="crumb-name">评价详情</span></div>
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
                        <label class="res-lab">评价时间</label><span class="res-info">{{$data['time']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">收货姓名</label><span class="res-info">{{$data['recName']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">收货电话</label><span class="res-info">{{$data['recPhone']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">配送姓名</label><span class="res-info">{{$data['deliName']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">配送电话</label><span class="res-info">{{$data['deliPhone']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">具体评分</label>
                    </li>
                    <li>
                        <table  width='700px' class="order-table" min-width='700px' cellpadding='4px'> 
                           <caption><font size='4'><b>评&nbsp价&nbsp详&nbsp情</b></font></caption>
                            <tr style='border:1px solid #aaa'>
                                <th colspan="3" align='center'>食品</th>
                            </tr>
                        @foreach($food as $k => $v)
                            <tr>
                                <td>{{$food[$k]}}</td>
                                <td>×{{$goodsAmount[$k]}}</td>
                                <td><img src="../../shops/images/evl/{{$goodsGrade[$k]}}xing.png"  width="80" alt=""></td>
                            </tr>
                        @endforeach
                            <tr style='border:1px solid #aaa'>
                                <th colspan="3" align='center'>快递员</th>
                            </tr>
                            
                            <tr>
                                <td>快递评价</td>
                                <td></td>
                                <td><img src="../../shops/images/evl/{{$data['senderGrade']}}xing.png"  width="80" alt=""></td>
                            </tr>
                            
                            <tr style='border:1px solid #aaa'>
                                <th colspan="3" align='center'>店铺</th>
                            </tr>
                            
                            <tr>
                                <td>店铺评价</td>
                                <td></td>
                                <td><img src="../../shops/images/evl/{{$data['shopGrade']}}xing.png"  width="80" alt=""></td>
                            </tr>
                            <tr style='border:1px solid #aaa'>
                                <th colspan="3" align='center'>评价留言</th>
                            </tr>
                            
                            <tr>
                                <td colspan="3">{{$data['content']}}</td>
                            </tr>
                            <tr style='border:1px solid #aaa'>
                                <th colspan="3" align='center'>卖家回复</th>
                            </tr>
                            
                            <tr>
                                <td colspan="3">{{$data['reply'] or '未进行回复'}}</td>
                            </tr>
                        </table>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <!--/main-->
@endsection