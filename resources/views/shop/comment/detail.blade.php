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
                                <td colspan="3" b='reply' >{{$data['reply'] or '未进行回复'}}</td>
                            </tr>
                        </table>
                    </li>
                    <li style='text-align:center'>
                        <span class="res-info" >
                            <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                        @if($data['reply'] == '')
                            <input class="btn btn-primary btn6 mr10" onClick="reply({{$data['id']}})" a= "{{$data['id']}}" value="回复" >
                        @else
                            <input class="btn btn-primary btn6 mr10" style='opacity:0;cursor:default' >
                        @endif
                        </span>
                    </li>
                </ul>

            </div>
        </div>
    </div>
     <script type='text/javascript'>
        layer.use("{{asset('layer/extend/layer.ext.js')}}", function(){  
             layer.ext = function(){  
                 layer.prompt({})  
             };  
         });
    //执行发送
    function reply(id){

        layer.prompt({title: '请回复', formType: 2}, function(text, index){
            layer.close(index);
            $.post("{{url('/shop/comment/')}}/"+id,{'_method':'put','_token':'{{csrf_token()}}','reply':text},function(data){
                if(data){
                    layer.msg('回复成功',{icon:6});
                    $('[a='+id+']').attr({'style':'opacity:0;cursor:default', 'onClick':''});
                    $('[b=reply]').html(text);
                    setTimeout(function(){
                        location.href="/shop/comment?page={{$page}}";
                    },600);
                }else{
                    layer.msg('回复失败',{icon:5});
                }
            });
          });
        
    }

        
    </script>
    <!--/main-->
@endsection