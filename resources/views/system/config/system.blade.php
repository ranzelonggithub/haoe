@extends('system.layout.sys')
@section('content')
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">系统设置</span></div>
        </div>
        <div class="result-wrap">

            <form action="/sys/doconfig/{{$res[0]['id']}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>网站信息设置</h1>
                    </div>
                    <div class="result-content">
                        <table width="" class="insert-tab">
                            <tbody>
                            @foreach($res as $k=>$v)
                            <tr>
                                <th width="20%"><i class="require-red">*</i>网站名称：</th>
                                <td><input type="text" name="webname" value="{{$v['webname']}}"></td>
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>网站关键字：</th>
                                    <td><input type="text" name='keywords' value='{{$v["keywords"]}}'></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>网站logo：</th>
                                    <td><input type="file" name='logo' multiple="multiple" id="logo">
                                    <p><img  id="imgs" src="http://p2dtot555.bkt.clouddn.com/systems/sysimgs/{{$v['logo']}}" style="height:90px"></p>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>网站版权：</th>
                                    <td><input type="text" name='copy' value='{{$v["copy"]}}'></td>
                                </tr>
                                <tr>
                                   <th><i class="require-red">*</i>网站状态：</th>  
                                   <td>
                                        <select name="status" id="">
                                            <option value="1" <?=$res[0]['status']==1?'selected':''?>>开启</option>
                                            <option value="0" <?=$res[0]['status']==0?'selected':''?>>关闭</option>
                                        </select>
                                   </td>

                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <input type="submit" value="修改" class="btn btn-primary btn6 mr10">
                                        <input type="button" value="返回" onClick="history.go(-1)" class="btn btn6">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody></table>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection