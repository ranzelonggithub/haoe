@extends('system.layout.sys')
@section('content')
     <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="{{'/sys/shop'}}">店家管理</a><span class="crumb-step">&gt;</span><span>用户详情</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/sys/shop/{{$res['id']}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}}
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th width="120"><i class="require-red">*</i>店铺名称：</th>
                                <td>
                                    <input type="text" name='shopName' value='{{$res["shopName"]}}'>
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>店铺地址</th>
                                <td>
                                    <input type="text" name='address' value='{{$res["address"]}}'>
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>店铺电话</th>
                                <td>
                                    <input type="text" name='shopPhone' value='{{$res["shopPhone"]}}'>
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>门户loge:</th>
                                <td>
                                    <input type="file" name='logo' value='{{$res["logo"]}}'>
                                    <p><img src="/systems/sysimgs/loge.jpg" style="width:120px;height:120px;"></p>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>店内图片</th>
                                <td>
                                    <input type="file" name='insidePic' value='{{$res["insidePic"]}}'>
                                    <p><img src="/systems/sysimgs/neibu.jpg" style="width:120px;height:120px;"></p>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>门脸图片</th>
                                <td>
                                    <input type="file" name='insidePic' value='{{$res["insidePic"]}}'>
                                    <p><img src="/systems/sysimgs/menlian.jpg" style="width:120px;height:120px;"></p>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>开店时间</th>
                                <td>
                                    <input type="text" name='openTime' multiple="multiple" value='{{$res["openTime"]}}'>
                                </td>

                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>关店时间</th>
                                <td>
                                    <input type="text" name='closeTime' multiple="multiple" value='{{$res["closeTime"]}}'>
                                </td>

                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>店铺评分</th>
                                <td>
                                    <input type="text" name='grade' multiple="multiple" value='{{$res["grade"]}}'>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>销售量</th>
                                <td>
                                    <input type="text" name='amount' multiple="multiple" value='{{$res["amount"]}}'>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>状态</th>
                                <div>
                                    <td><?= $res['state']==1?'正常营业':'店铺已封'?></td>
                                </div>
                           </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="修改" type="submit">
                                    <a href="/sys/shop"><input class="btn btn6" onClick="history.go(-1)" value="返回" type="button"></a>
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
@endsection