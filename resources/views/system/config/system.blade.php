@extends('system.layout.sys')
@section('content')
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">系统设置</span></div>
        </div>
        <div class="result-wrap">
<<<<<<< HEAD
            <form action="{{'/sys/doconfig'}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
=======
            <form action="#" method="post" id="myform" name="myform">
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>网站信息设置</h1>
                    </div>
                    <div class="result-content">
<<<<<<< HEAD
                        <table width="" class="insert-tab">
                            <tbody><tr>
                                <th width="20%"><i class="require-red">*</i>网站名称：</th>
                                <td><input type="text" name="webname" value=''></td>
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>网站关键字：</th>
                                    <td><input type="text" name='keywords' vlaue=''></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>网站loge：</th>
                                    <td><input type="file" name='loge' multiple="multiple">
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>网站版权：</th>
                                    <td><input type="text" name='copy' value=''></td>
                                </tr>
                                <tr>
                                   <th><i class="require-red">*</i>网站状态：</th>  
                                   <td>
                                        <select name="status" id="">
                                            <option value="1">开启</option>
                                            <option value="0">关闭</option>
                                        </select>
                                   </td>
=======
                        <table width="100%" class="insert-tab">
                            <tbody><tr>
                                <th width="15%"><i class="require-red">*</i>域名：</th>
                                <td><input type="text" id="" value="http://www.17sucai.com" size="85" name="keywords" class="common-text"></td>
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>站点标题：</th>
                                    <td><input type="text" id="" value="『前端迷』-专注于前端领域的探索与实践" size="85" name="title" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>关键字：</th>
                                    <td><input type="text" id="" value="前端, 前端设计, 前端开发, 设计, 开发, 前端资源, CSS, JavaScript, Ajax, Html5" size="85" name="keywords" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>描述：</th>
                                    <td><input type="text" id="" value="『前端迷』，分享前端设计资源和前端开发技术的专业博客！" size="85" name="description" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <input type="submit" value="提交" class="btn btn-primary btn6 mr10">
                                        <input type="button" value="返回" onClick="history.go(-1)" class="btn btn6">
                                    </td>
                                </tr>
                            </tbody></table>
                    </div>
                </div>
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe014;</i>站长信息设置</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tr>
                                <th width="15%"><i class="require-red">*</i>网站联系邮箱：</th>
                                <td><input type="text" id="" value="17sucai@qq.com" size="85" name="email" class="common-text"></td>
                            </tr>
                                <tr>
                                    <th><i class="require-red">*</i>联系人：</th>
                                    <td><input type="text" id="" value="豪情" size="85" name="contact" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>联系电话：</th>
                                    <td><input type="text" id="" value="123456" size="85" name="phone" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>备案ICP：</th>
                                    <td><input type="text" id="" value="哥在香港" size="85" name="icp" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th><i class="require-red">*</i>地址：</th>
                                    <td><input type="text" id="" value="中国 • 上海" size="85" name="address" class="common-text"></td>
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
<<<<<<< HEAD
=======
                                        <input type="hidden" value="siteConf.inc.php" name="file">
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
                                        <input type="submit" value="提交" class="btn btn-primary btn6 mr10">
                                        <input type="button" value="返回" onClick="history.go(-1)" class="btn btn6">
                                    </td>
                                </tr>
<<<<<<< HEAD
                            </tbody></table>
                    </div>
                </div>
                
=======
                        </table>
                    </div>
                </div>
>>>>>>> 4c9d7ac4502c3783d63a7e25c3269996e1b886bc
            </form>
        </div>
    </div>
@endsection