@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">个人中心</span><span class="crumb-step">&gt;</span><span class="crumb-name">修改个人信息</span></div>
        </div>
        <div class="result-wrap">
            <form  method='post' id="myform" name="myform" enctype='multipart/form-data'>
                {{csrf_field()}}
                {{method_field('put')}}
                <input type="hidden" name='info' value='1'>
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>修改个人信息</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>用户：</th>
                                    <td><input type="text" id="" value="{{$seller['sellerName']}}" size="28" name="sellerName" class="common-text" ></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>电话：</th>
                                    <td><input type="text" id="" value="{{$seller['phone']}}" size="28" name="phone" class="common-text" >&nbsp&nbsp&nbsp<a href='#'>解除绑定</a></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>邮箱：</th>
                                    <td><input type="email" id="" value="{{$seller['email']}}" size="28" name="email" class="common-text" ></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>性别：</th>
                                    <td>
                                        <input type="radio" id="" value="0"  name="sex" class="common-text" {{$sex == 0 ? 'checked' : ''}}>男
                                        <input type="radio" id="" value="1"  name="sex" class="common-text" {{$sex == 1 ? 'checked' : ''}}>女
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <button type="button"class="btn btn-primary btn6 mr10" onclick="up({{$seller['id']}})">提交</button>
                                        <!-- <button type="submit"class="btn btn-primary btn6 mr10" >提交</button> -->
                                        <input type="button" value="返回" onClick="history.go(-1)" class="btn btn6">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </form>
        </div>
    </div>
 <script type="text/javascript">
     $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });


    //更改个人信息
    function up(id){

        var formData = new FormData($('#myform')[0]);
        $.ajax({
            type : "post",
            url : "{{url('/shop/center')}}/"+id,
            data : formData,
            async : true,
            cache : false,
            contentType:false,
            processData:false,
            success:function(data){
                if(data == 1){
                    layer.msg('更新成功');
                    setTimeout(function(){
                        location.href="/shop/center";
                    },1000);
                    
                }else if(data == 0){
                    layer.msg('更新失败');
                }else{
                    ayer.msg('性别更新失败');
                }
                
            },

            error: function(msg) {
                var json = JSON.parse(msg.responseText);
                var a = ''
                var num = 0;
                for(i in json){
                    num++;
                    a += '<li>'+num+'.&nbsp&nbsp'+json[i][0]+'</li>';
                }

                layer.open({
                  skin: 'layui-layer-lan',
                  type: 1 ,//Page层类型
                  title: '错误!',
                  shade: 0.6 ,//遮罩透明度
                  maxmin: false,//允许全屏最小化
                  anim: 0 ,//0-6的动画形式，-1不开启
                  content: '<div style="padding:30px;"><ol>'+a+'</ol></div>'
                }); 
            },
        });
    }
 </script>
    <!--/main-->
 @endsection


