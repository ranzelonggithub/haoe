@extends('shop.layout.layout')
@section('content')
 <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">食品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/shop/foods">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search" id="">
                                    <option value="">全部</option>
                                    <option value="goodsName">名称</option>
                                    <option value="state">状态</option>
                                    <option value="sort">排序</option>
                                    <option value="cate">类别</option>
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
                        <a href="/shop/foods/create"><i class="icon-font"></i>新增菜品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>名称</th>
                            <th>类别</th>
                            <th>单价</th>
                            <th>状态</th>
                            <th>评分</th>
                            <th>销售量</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $k => $v)
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>{{$v['sort']}}</td>
                            <td>{{$v['goodsName']}}</td>
                            <td>{{$cate[$v['cate']]}}</td>
                            <td>{{$v['price']}}</td>
                            <td>{{$v['state']}}</td>
                            <td>{{$v['grade']}}</td>
                            <td>{{$v['amount']}}</td>
                            <td>
                                <button><a class="link-update" href="/shop/foods/{{$v['id']}}/edit">修改</a></button>
                                <button class="link-del" a="{{$v['id']}}"onclick="del({{$v['id']}})">删除</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class='pages'>
                        {!! $data->appends($request)->render() !!}
                    </div>
                </div>
                </div>

        </div>
    </div>
 @endsection

 <script type='text/javascript'>
 function del(id){
    // console.log($('button[a='+id+']').parent().parent());
    layer.confirm('确定要删除吗？', {
      btn: ['是','否'] //按钮
    }, function(){
      $.post("{{url('/shop/foods/')}}/"+id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
        if(data){
            layer.alert('删除成功');

            $('button[a='+id+']').parent().parent().remove();
        }else{
            layer.alert('删除失败');
        }
      });
    });
 }
    
</script>