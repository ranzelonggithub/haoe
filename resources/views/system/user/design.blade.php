@extends('system.layout.sys')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">用户管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="{{'/sys/user/create'}}"><i class="icon-font"></i>新增用户</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>                        
                            <th>ID</th>
                            <th>用户名</th>
                            <th>手机号</th>
                            <th>邮箱</th>
                            <th>发布人</th>
                            <th>注册时间</th>
                            <th>权限</th>
                            <th>操作</th>
                        </tr>
                        @foreach($res as $k=>$v)
                        <tr>
                            <td class="tc"><input name="id[]" value="" type="checkbox"></td>
                            <td>{{$v['id']}}</td>
                            <td>{{$v['userName']}}</td>
                            <td>{{$v['phone']}}</td>
                            <td>{{$v['email']}}</td>
                            <td>admin</td>
                            <td>admin</td>
                            <td>2014-03-15 21:11:01</td>
                            <td>
                                <form action="/sys/user/{{$v['id']}}/edit" method="GET" style='display:inline;'>
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button>修改</button>
                                </form>
                                <form action="/sys/user/{{ $v['id'] }}" method='POST' style='display :inline;'>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button>删除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="list-page">{!! $res ->render() !!}</div>
                </div>
            </form>
        </div>
    </div>
@endsection