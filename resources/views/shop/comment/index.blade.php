@extends('shop.layout.layout')
@section('content')
 <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">评论管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/shop/order?page=1">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search" id="">
                                    <option value=''>全部</option>
                                    <option value="recName"  {{$search == 'recName' ? 'selected' : ''}}>接收人</option>
                                    <option value="shopGrade"  {{$search == 'recPhone'? 'selected' : ''}}>店铺评分</option>
                                </select>
                            </td>
                            <td>
                                <select name="comState" id="">
                                    <option value=''>全部</option>
                                    <option value="2"  {{$comState == 2 ? 'selected' : ''}}>已评价</option>
                                    <option value="1"  {{$comState == 1 ? 'selected' : ''}}>未评价</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <div class="result-title">
                <div class="result-list">
                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>好评</a>
                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>中评</a>
                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>差评</a>
                </div>
            
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>编号</th>
                            <th>订单号</th>
                            <th>消费</th>
                            <th>接收人</th>
                            <th>接收人电话</th>
                            <th>评价时间</th>
                            <th>店铺评分</th>
                            <th>评价详情</th>
                            <th>操作</th>
                        </tr>
                    @foreach($data as $k =>$v)
                        <tr>
                            <td>{{($page-1)*3+$k+1}}</td>
                            <td>{{$v['orderNum']}}</td>
                            <td>{{$v['payment']}}元</td>
                            <td>{{$v['recName']}}</td>
                            <td>{{$v['recPhone']}}</td>
                            <td>{{$v['time']}}</td>
                            <td>{{$v['shopGrade']}}</td>
                            <td><a href="/shop/comment/{{$v['id']}}?page={{$page}}}}">评价详情</a></td>
                            @if($v['reply'] == null)
                            <td><button r ="{{$v['id']}}" onclick="reply({{$v['id']}})" class='btn btn-primary btn6 mr10'>回复</button></td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                    @endforeach
                   </table>
                </div>
                <div class='pages'>
                    {!! $data->appends($req)->render() !!}
                </div>
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
                $('button[r='+id+']').remove() ;
            }else{
                layer.msg('回复失败',{icon:5});
            }
        });
      });
    
}

    
</script>
 @endsection