@extends('system.layout.sys')

@section('content')
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="{{'/sys/user'}}">用户管理</a><span class="crumb-step">&gt;</span><span>修改用户</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
            
                <form action="/sys/user/{{ $data['id'] }}" method='POST' enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}}
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>头像：</th>
                                <td>
                                    <input type="file" name="photo" id="update" value="">
                                    <p><img  id="imgs" src="http://p2dtot555.bkt.clouddn.com/systems/sysimgs/{{$res['photo']}}" style="width:80px"></p>
                                </td>
                            <tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>用户名：</th>
                                <td>
                                    <input type="text" name='userName' value='{{$data["userName"]}}'>
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>密码：</th>
                                <td>
                                    <input type="password" name='passWord' value=''>
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>确认密码：</th>
                                <td>
                                    <input type="password" name='repass' value=''>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>手机号：</th>
                                <td>
                                    <input type="text" name='phone'>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>邮箱：</th>
                                <td>
                                    <input type="text" name='email' value=''>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>权限：</th>
                                <td>
                                        <select name="auth" id="">
                                            <option value="1" <?= $res['auth'] == 1?'selected':''?>>普通用户</option>
                                            <option value="2" <?= $res['auth'] == 2?'selected':''?>>管理员</option>
                                        </select>
                                </td>
                            </tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <a href='{{"/sys/user"}}'><input class="btn btn6" onClick="history.go(-1)" value="返回" type="button"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection