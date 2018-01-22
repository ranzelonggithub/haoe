@extends('system.layout.sys')
@section('content')
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">用户管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/sys/user" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="userName" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">        
                <div class="result-title">
                    <div class="result-list">
                        <a href="{{'/sys/user/create'}}"><i class="icon-font"></i>新增用户</a>
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
                            <th>权限</th>
                            <th>注册时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($res as $k=>$v)
                        <tr>
                            <td class="tc"><input name="id[]" value="" type="checkbox"></td>
                            <td>{{$v['id']}}</td>
                            <td>{{$v['userName']}}</td>
                            <td>{{$v['phone']}}</td>
                            <td>{{$v['email']}}</td>
                            <td><?=$v['auth']==1?'普通用户':'管理员'?></td>
                            <td>2014-03-15 21:11:01</td>
                            <td>
                                <button><a href="/sys/user/{{$v['id']}}/edit">修改</a></button>
                                <form action="/sys/user/{{ $v['id'] }}" method='post' style='display :inline;'>
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