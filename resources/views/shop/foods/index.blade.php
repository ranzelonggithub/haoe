@extends('shop.layout.layout')
@section('content')
 <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">title</span></div>
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
                                    <option value="19">精品界面</option>
                                    <option value="20">推荐界面</option>
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
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="insert.html"><i class="icon-font"></i>新增菜品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <!-- <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a> -->
                    </div>
                
            
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>排序</th>
                            <th>名称</th>
                            <th>单价</th>
                            <th>状态</th>
                            <th>评分</th>
                            <th>销售量</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $k => $v)
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>{{$v['id']}}</td>
                            <td>{{$v['sort']}}</td>
                            <td>{{$v['goodsName']}}</td>
                            <td>{{$v['price']}}</td>
                            <td>{{$v['state']}}</td>
                            <td>{{$v['grade']}}</td>
                            <td>{{$v['amount']}}</td>
                            <td>
                                <a class="link-update" href="/shop/foods/{{$v['id']}}/edit">修改</a>
                                <a class="link-del" href="/shop">删除</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class='pages'>
                        {!! $data->render() !!}
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
 @endsection

 <script type='text/javascript'>
    
</script>