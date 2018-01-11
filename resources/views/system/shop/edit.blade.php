@extends('system.layout.sys')
@section('content')
     <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="{{'/sys/shop'}}">店家管理</a><span class="crumb-step">&gt;</span><span>用户修改</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
<<<<<<< HEAD
                <form action="{{'/sys/'}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}}
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <!-- <!-显示验证错误信息 -->
                            <!-- @if (count($errors) > 0)
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --> 
                            <tr>
                                <th width="120"><i class="require-red">*</i>店家名称：</th>
                                <td>
                                    <input type="text" name='userName' value=''>
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>密码：</th>
                                <td>
                                    <input type="password" name='password' value=''>
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>确认密码：</th>
                                <td>
                                    <input type="passWord" name='repass' value=''>
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>手机号:</th>
                                <td>
                                    <input type="text" name='sex' value=''>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>邮箱：</th>
                                <td>
                                    <input type="text" name='phone'>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>营业执照：</th>
                                <td>
                                    <input type="file" name='photo' multiple="multiple">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>餐饮许可证：</th>
                                <td>
                                    <input type="file" name='photo' multiple="multiple">
                                </td>
=======
                <form action="/jscss/admin/design/add" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="colId" id="catid" class="required">
                                    <option value="">请选择</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>作者：</th>
                                <td><input class="common-text" name="author" size="50" value="admin" type="text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="smallimg" id="" type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>--></td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea></td>
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
<<<<<<< HEAD
                                    <a href='{{'/sys/user'}}'><input class="btn btn6" onClick="history.go(-1)" value="返回" type="button"></a>
=======
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
@endsection