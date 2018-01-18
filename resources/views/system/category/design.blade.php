@extends('system.layout.sys')
@section('content')
       
        <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
        <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">分类管理</span></div>
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
                        <a href="{{'/sys/category/create'}}"><i class="icon-font"></i>新增分类</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>分类名</th>
                            <th>操作</th>
                        </tr>
                        @foreach($res as $k=>$v)
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td id='delid'>{{$v['id']}}</td>
                            <td>{{$v['cateName']}}</td>
                            <td>
                                <button><a href="/sys/category/{{$v['id']}}/edit">修改</a></button>
                                <button class="del" d="{{$v['id']}}" onclick="del({{$v['id']}})">删除</button>
                            </td>
                        </tr> 
                        @endforeach
                    </table>
                    <div class="list-page">{!! $res->render() !!}</div>
                </div>
        </div>
       <script type="text/javascript">    
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function del(id){
                layer.confirm('确认删除？？', {
                    btn: ['是','否'] //按钮
                }, function(){
                    $.ajax({
                        type:"post",
                        url:"{{url('/sys/category')}}/"+id,
                        data:{'_method':'delete'},
                        async:true,
                        success:function(data){
                            if(data){
                                layer.msg('删除成功');
                                $("[d="+id+"]").parent().parent().remove();
                            }else{
                                layer.msg('删除失败');
                            }
                        },   
                    });
                });
            }      
       </script>
    </div>
@endsection