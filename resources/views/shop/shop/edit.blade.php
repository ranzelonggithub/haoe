@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">店铺信息</span></div>
        </div>
        <div class="result-wrap">
            <form  method='post' id="myform" name="myform" enctype='multipart/form-data'>
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>店铺信息</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>店铺名称：</th>
                                    <td><input type="text" id="" value="{{$data['shopName']}}" size="85" name="shopName" class="common-text" disabled></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>店铺地址：</th>
                                    <td><input type="text" id="" value="{{$data['address']}}" size="85" name="address" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>店铺电话：</th>
                                    <td><input type="text" id="" value="{{$data['shopPhone']}}" size="85" name="shopPhone" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>配&nbsp&nbsp送&nbsp费：</th>
                                    <td><input type="number" id="" value="{{$data['deliPrice']}}" size="85" name="deliPrice" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>起&nbsp&nbsp步&nbsp价：</th>
                                    <td><input type="number" id="" value="{{$data['initPrice']}}" size="85" name="initPrice" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>开店时间：</th>
                                    <td><input type="time" id="" value="{{$data['openTime']}}" size="85" name="openTime" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>关店时间：</th>
                                    <td><input type="time" id="" value="{{$data['closeTime']}}" size="85" name="closeTime" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>配送方式：</th>
                                    <td><input type="text" id="" value="{{$data['delivery']}}" size="85" name="delivery" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>店铺公告：</th>
                                    <td><textarea name="notice" class="common-textarea"  cols="30" style="width: 98%;" rows="10" maxlength='50' placeholder="最多输入50个字">{{$data['notice']}}</textarea></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <button type="button"class="btn btn-primary btn6 mr10" onclick="up({{$data['id']}})">提交</button>
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


    //判断是否有文件上传
    function up(id){

        var formData = new FormData($('#myform')[0]);
        console.log(formData);
        $.ajax({
            type : "post",
            url : "{{url('/shop/shop')}}/"+id,
            data : formData,
            async : true,
            cache : false,
            contentType:false,
            processData:false,
            success:function(data){
                if(data == 1){
                    layer.msg('更新成功');
                    setTimeout(function(){
                        location.href="/shop/shop";
                    },1000);
                    
                }else{
                    layer.msg('更新失败');
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


