@extends('system.layout.sys')
@section('content')
     <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">店家管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    @foreach($data as $k=>$v)
                                    <option value="{{$v['id']}}">{{$v['cateName']}}</option>
                                    @endforeach
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
                        <a href="{{'/sys/shop/create'}}"><i class="icon-font"></i>新增店家</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>      
                            <th>ID</th>
                            <th>卖家名</th>
                            <th>电话</th>
                            <th>邮箱</th>
                            <th>营业执照</th>
                            <th>餐饮许可证</th> 
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        @foreach($res as $k=>$v)
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>{{$v['id']}}</td>
                            <td>{{$v['sellerName']}}</td>
                            <td>{{$v['phone']}}</td>
                            <td>{{$v['email']}}</td>
                            <td><img src="/systems/sysimgs/xukezheng.jpg" style="width:80px"></td>
                            <td><img src="/systems/sysimgs/yingye.jpg" style="width:80px"></td>
                            <td><?= $v['auth'] == 1 ? '正在营业':'店铺已关'?></td>
                            <td>
                                <form action="/sys/shop/{{$v['id']}}" method='get' style='display :inline;'>                                 
                                    <button>详情</button>
                                </form>
                                <form action="/sys/shop/{{$v['id']}}" method='POST' style='display :inline;'>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button>删除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach     
                    </table>
                    <div class="list-page">{!! $res->render() !!}</div>
                </div>
        </div>
    </div>
@endsection