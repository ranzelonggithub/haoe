@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="#">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">个人中心</span><span class="crumb-step">&gt;</span><span class="crumb-name">修改密码</span></div>
        </div>
        <div class="result-wrap">
            <form  method='post' id="myform" name="myform" enctype='multipart/form-data'>
                {{csrf_field()}}
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>修改密码</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>密&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp码：</th>
                                    <td><input type="password"  value="" size="28" name="pass" class="common-text" ><span style='font-size:10px;color:#ccc'>&nbsp&nbsp&nbsp由8~16位字母数字下划线组成</span></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>确认密码：</th>
                                    <td><input type="password"  value="" size="28" name="repass" class="common-text" ></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <button type="button"class="btn btn-primary btn6 mr10" onclick="modify()">创建</button>
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

    
    //创建密码
    //利用ajax传输数据
    function modify(){

        var formData = new FormData($('#myform')[0]);
        $.ajax({
            type : "post",
            url : "{{url('/shop/pass')}}",
            data : formData,
            async : true,
            cache : false,
            contentType:false,
            processData:false,
            success:function(data){
                if(data == 1){
                    layer.msg('密码创建成功',{icon:6});
                    setTimeout(function(){
                        location.href="/shop/center";
                    },1000);
                    
                }else{
                    layer.msg('密码更创建失败',{icon:5=/});
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


