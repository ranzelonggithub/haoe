
@extends('system.layout.sys')

@section('content')
     <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="{{'/sys/shop'}}">店家管理</a><span class="crumb-step">&gt;</span><span>新增店家</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/sys/shop" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="colId" id="catid" class="required">
                                    <option value="">请选择</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <tr>
                                <th width="120"><i class="require-red">*</i>店家名称：</th>
                                <td>
                                    <input type="text" name='userName' value=''>
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
                                    <input type="passWord" name='repass' value=''>
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>手机号:</th>
                                <td>
                                    <input type="text" name='phone' value=''>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>邮箱：</th>
                                <td>
                                    <input type="text" name='email'>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>营业执照：</th>
                                <td>
                                    <input type="file" name='busi_license' multiple="multiple">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>餐饮许可证：</th>
                                <td>
                                    <input type="file" name='cate_licence' multiple="multiple">
                                </td>

                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
@endsection