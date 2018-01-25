@extends('system.layout.sys')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">订单管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            
                <div class="result-title">
                    <div class="result-list">
                        <a href="insert.html"><i class="icon-font"></i>新增订单</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>id</th>
                            <th>订单号</th>
                            <th>店铺名称</th>
                            <th>店铺电话</th>
                            <th>食品名称</th>
                            <th>配送费</th>
                            <th>收货人名称</th>
                            <th>收货人电话</th>
                            <th>订单状态</th>
                            <th>操作</th>
                        </tr>
                        @foreach($res as $k=>$v)
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>{{$v['id']}}</td>
                            <td>{{$v['orderNum']}}</td>
                            <td>{{$v['shopName']}}</td>
                            <td>{{$v['shopPhone']}}</td>
                            <td>{{$v['goodsName']}}</td>
                            <td>{{$v['deliPrice']}}</td>
                            <td>{{$v['recName']}}</td>
                            <td>{{$v['recPhone']}}</td>
                            <td><?=$v['comState']==1?'已接收':'正在配送'?></td>
                            <td>
                                <form action="/sys/order/{{$v['id']}}" method='post' style='display :inline;'>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button>删除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div>{!! $res->render() !!}</div>
                </div>
        </div>
    </div>
@endsection