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
                                    <option value="19">卖家店铺</option>
                                    <option value="20">买家名</option>
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
                        <a href="insert.html"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <!-- <th class="tc" width="5%">选择</th> -->
                            <th>评论ID</th>
                            <th>订单ID</th>
                            <th>评论时间</th>
                            <th>买家评论内容</th>
                            <th>卖家回复内容</th>
                            <th>店铺评分</th>
                            <th>商品评分</th>
                            <th>外卖员评分</th>
                            <th>创建时间/已删除</th>
                            <th>操作</th>
                        </tr>
						@foreach($comment as $k=>$v)
                        <tr>
                            <!-- <td class="tc"><input name="id[]" value="58" type="checkbox"></td> -->
                            <td>{{$v['id']}}</td>
                            <td>{{$v['cateName']}}</td>
                            <td>{{$v['time']}}</td>
                            <td>{{$v['content']}}</td>
                            <td>{{$v['reply']}}</td>
                            <td>{{$v['shopGrade']}}</td>
                            <td>{{$v['goodsGrade']}}</td>
                            <td>{{$v['senderGrade']}}</td>
						@if (empty($v['deleted_at']))
							<td>{{$v['created_at']}}</td>
						@else 
							<td>已删除</td>
						@endif
                            <!--<td>{{$v['created_at']}}</td>
                            <td>{{$v['updated_at']}}</td>
                            <td>{{$v['deleted_at']}}</td> -->
                            <td>
                                <a class="link-update" href="/shop/com/{{$v['id']}}">查看</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr>
						@endforeach
					</table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
 @endsection