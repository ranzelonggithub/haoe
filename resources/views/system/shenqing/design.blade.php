@extends('system.layout.sys')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">申请管理</span></div>
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
                        <a href="{{'/sys/shenqing/create'}}"><i class="icon-font"></i>新增申请</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                          <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>      
                            <th>ID</th>
                            <th>店家名称</th>
                            <th>电话</th>
                            <th>邮箱</th>
                            <th>身份证</th>
                            <th>营业执照</th>
                            <th>餐饮许可证</th>
                            <th>操作</th>
                        </tr>
                        @foreach($res as $k=>$v)
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>{{$v['id']}}</td>
                            <td>{{$v['sellerName']}}</td>
                            <td>{{$v['phone']}}</td>
                            <td>{{$v['email']}}</td>
                            <td>{{$v['identify']}}</td>
                            <td><img src="/systems/sysimgs/xukezheng.jpg" style="width:80px"></td>
                            <td><img src="/systems/sysimgs/yingye.jpg" style="width:80px"></td>
                            <td>
                                <form action="/sys/shenqing/{{$v['id']}}" method='get' style='display :inline;'>                                          
                                    <button>详情</button>
                                </form>
                                </form>
                                <button><a class="link-del" href="">删除</a></button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="list-page">{!! $res->render() !!}</div>
                </div>
        </div>
    </div>
@endsection