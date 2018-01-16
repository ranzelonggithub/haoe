@extends('shop.layout.layout')
@section('content')
 <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">订单管理</span></div>
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
                                    <option value="recPhone"  {{$search == 'recPhone'? 'selected' : ''}}>接收人电话</option>
                                </select>
                            </td>
                            <th width="120">性别:</th>
                            <td>
                                <select name="recSex" id="">
                                    <option value=''>全部</option>
                                    <option value="0" {{$recSex == '0' ? 'selected' : ''}}>男</option>
                                    <option value="1" {{$recSex == '0' ? 'selected' : ''}}>女</option>
                                </select>
                            </td>
                            <th width="120">发送状态:</th>
                            <td>
                                <select name="state" id="">
                                    <option value=''>全部</option>
                                    <option value="1" {{$state == '1' ? 'selected' : ''}}>未发送</option>
                                    <option value="2" {{$state == '2' ? 'selected' : ''}}>已发送</option>
                                    <option value="3" {{$state == '3' ? 'selected' : ''}}>已接收</option>
                                    <option value="4" {{$state == '4' ? 'selected' : ''}}>未接单</option>
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
                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>未发送</a>
                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>已发送</a>
                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>已接收</a>
                </div>
            
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>编号</th>
                            <th>点单号</th>
                            <th>接收人</th>
                            <th>性别</th>
                            <th>接收人电话</th>
                            <th>订单时间</th>
                            <th>发送状态</th>
                            <th>订单详情</th>
                            <th>操作</th>
                        </tr>
                    @foreach($data as $k =>$v)
                        <tr>
                            <td>{{($page-1)*3+$k+1}}</td>
                            <td>{{$v['orderNum']}}</td>
                            <td>{{$v['recName']}}</td>
                            <td>{{$v['recSex'] == 0 ? '男' : '女'}}</td>
                            <td>{{$v['recPhone']}}</td>
                            <td>{{$v['created_at']}}</td>
                        @if($v['state'] == 1)
                            <td style='color:red'>待发送</td>
                        @elseif($v['state'] == 2)
                            <td style='color:blue'>已发送</td>
                        @elseif($v['state'] == 3)
                            <td style='color:green'>已接收</td>
                        @else
                            <td style='color:purple'>未接单</td>
                        @endif
                            <td><a href="/shop/order/{{$v['id']}}">订单性情</a></td>
                        @if($v['state'] == 1)
                            <td><button a ="{{$v['id']}}" onclick="send({{$v['id']}})" class='btn btn-primary btn6 mr10'>发送</button></td>
                        @elseif($v['state'] == 4)
                            <td><button a ="{{$v['id']}}" onclick="rec({{$v['id']}})" class='btn btn-primary btn6 mr10'>接收</button></td>
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
    <a href="/shop/order/1/edit"><button>点一下</button></a>
 <script type='text/javascript'>

//执行发送
function send(id){
    
    $.post("{{url('/shop/order/')}}/"+id,{'_method':'put','_token':'{{csrf_token()}}','send':1},function(data){
        if(data){
            layer.alert('发送成功');
            $('button[a='+id+']').parent().prev().prev().text('已发送');
            $('button[a='+id+']').parent().prev().prev().attr('style',"color:blue");
            $('button[a='+id+']').remove() ;
        }else{
            layer.alert('发送失败');
        }
    });
}

//执行接单
function rec(id){
    $.post("{{url('/shop/order/')}}/"+id,{'_method':'put','_token':'{{csrf_token()}}','rec':1},function(data){
        if(data){
            layer.alert('接单成功');
            $('button[a='+id+']').html('发送');
            $('button[a='+id+']').attr('onclick',"send("+id+")");
            $('button[a='+id+']').parent().prev().prev().text('待发送');
            $('button[a='+id+']').parent().prev().prev().attr('style',"color:red");
        }else{
            layer.alert('接单失败');
        }
    });
}
    
</script>
 @endsection