@extends('system.layout.sys')

@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="{{'/sys/user'}}">用户管理</a><span class="crumb-step">&gt;</span><span>新增用户</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="/sys/user" method="POST" enctype="multipart/form-data">                 
                    {{csrf_field()}}
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th width="120"><i class="require-red">*</i>用户名：</th>
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
                                            <option value="1">普通用户</option>
                                            <option value="2">管理员</option>
                                        </select>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>头像：</th>
                               <td>
                                    <input type="file" name="photo" id="file_upload" value="">
                                    <p><img  id="imgs" src="/systems/images/logo.png" style="width:80px"></p>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <a href="{{'/sys/user'}}"><input class="btn btn6" onClick="history.go(-1)" value="返回" type="button"></a>
                                </td>
                            </tr>
                    </tbody></table>
                </form>
                <script type='text/javascript'>
                    $.ajaxSetup({
                         headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                    });
                    //文件改变,开始上传
                    $(function(){
                        $('#file_upload').change(function(){
                            uploadImage();
                        });
                    });

                    //判断是否有文件上传
                    function uploadImage(){
                        var oldpic = $("#picture").attr('src');
                        var imgPath = $('#file_upload').val();
                        if(imgPath == ""){
                            alert('请选择上传图片');
                            return;
                        }
                    
                    }
                    //判断上传文件为后缀名
                    var strExtension = imgPath.substr(imgPath.lastIndexOf('.')+1);
                    if(strExtension != 'jpg' && strExtension != 'gif'  && strExtension != 'png'  && strExtension != 'bmp'){
                        alert('请选择图片文件');
                        return;
                    }

                    var formData = new FormData($('#myform')[0]);
                    console.log(formData);
                    $.ajax({
                        type : "post",
                        url : "/systems/imgs",
                        data : formData,
                        async : true,
                        cache : false,
                        contentType:false,
                        processData:false,
                        beforeSend:function(){
                            a = layer.load();
                        },
                        success:function(data){
                            layer.close(a);
                            $('#picture').attr('src',"/"+data);
                        },
                        error:function(XMLHttpRequest,textStatus,errorThrown){
                            layer.close(a);
                            alert("上传失败,请检测网络后重试");
                            $("#picture").attr('src',oldpic);
                        }
                    });
                
                </script>
            </div>
        </div>
    </div>
@endsection