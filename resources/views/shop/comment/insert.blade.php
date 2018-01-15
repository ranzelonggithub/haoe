@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/jscss/admin/design/add" method="post" id="myform" name="myform" enctype="multipart/form-data">
						<table class="insert-tab" width="100%">
                        <tbody>
							<tr>
								<th width="120">店铺</th>
								<td>{{$shop[0]['shopName']}}</td>
							</tr>
                            <tr>
                                <th>订单内容</th>
                                <td>{{$shop[0]['goodsName']}}</td>
                            </tr>
                            <tr>
                                <th>下单时间</th>
                                <td>{{$shop[0]['created_at']}}</td>
                            </tr>
						@if (isset($comment))
							<tr>
                                <th>评论时间</th>
                                <td>{{$comment[0]['time']}}</td>
                            </tr>
                            <tr>
                                <th>回复时间</th>
                                <td>{{$comment[0]['created_at']}}</td>
                            </tr>
                        <!--<tr>
                                <th>删除时间</th>
                                <td>{{$comment[0]['deleted_at']}}</td>
                            </tr>-->
                            <tr>
                                <th>评论内容：</th>
                                <td>{{$comment[0]['content']}}</td>
                            </tr>
                            <tr>
                                <th>回复内容：</th>
                                <td>{{$comment[0]['reply']}}</td>
                            </tr>
                            <!-- <tr>
                                <th>回复内容：</th>
                                <td><textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea></td>
                            </tr> -->
                            <tr>
                                <th></th>
                                <td>
								@if (empty($comment[0]['deleted_at']))
                                    <input class="btn btn-primary btn6 mr10" value="删除" type="submit">
								@else
                                    <input class="btn btn-primary btn6 mr10" value="恢复" type="submit">
								@endif
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
						@else
							<tr>
								<th>买家未评论</th>
							</tr>
                            
						@endif
                        </tbody>
						</table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
@endsection