@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">食品</a><span class="crumb-step">&gt;</span><span>食品编辑</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form  method="post" id="myform" name="myform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th><i class="require-red">*</i>图片：</th>
                            <td>
                                <input type="hidden" name='id' value="{{$data['id']}}">
                                <input type="file" size="85" name="photo" id='photo' class="common-text" onchange="uploadImage({{$data['id']}})" title='点击更换头像' style='position:absolute;height:100px;width:100px;opacity:0'>
                                <img src="http://p2dtot555.bkt.clouddn.com/shop/foods/{{$data['picture']}}" height="100" width="100" id='picture' >
                            </td>
                        </tr>
                </form>
                <form  method="post" id="yourform" name="yourform" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="cate" id="catid" class="required common-text">
                                    @foreach($cate as $k =>$v)
                                    <option value="{{$k}}" {{$data['cate'] == $k ? 'selected' : ''}}>{{$v}}</option> 
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>名称：</th>
                                <td>
                                    <input type="hidden" value="{{$data['uid']}}">
                                    <input class="common-text required goodsName"  name="goodsName" size="50" value="{{$data['goodsName']}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>状态：</th>
                                <td>
                                    @if($data['state'] == 0)
                                        <input type="radio" vlaue='0' name='state' class='common-text required' checked>下架
                                        <input type="radio" vlaue='1' name='state' class='common-text required'>上架
                                    @else
                                        <input type="radio" vlaue='0' name='state' class='common-text required'>下架
                                        <input type="radio" vlaue='1' name='state' class='common-text required' checked>上架
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>排序：</th>
                                <td>
                                    <input class="number common-text"  name="sort" value="{{$data['sort']}}" type="number" max='1000'>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>价格：</th>
                                <td>
                                    <input class="number common-text"  name="price" value="{{$data['price']}}" type="number" max='100000'>
                                </td>
                            </tr>
              
                            <tr>
                                <th><i class="require-red">*</i>描述：</th>
                                <td><textarea name="description" class="common-textarea"  cols="30" style="width: 98%;" rows="10" maxlength='70' placeholder="最多输入70个字">{{$data['description']}}</textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" onClick="up({{$data['id']}})" value="修改" >
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   //更改食物信息
   function up(id){
       var formData = new FormData($('#yourform')[0]);
       $.ajax({
           type : "post",
           url : "{{url('/shop/foods')}}/"+id,
           data : formData,
           async : true,
           cache : false,
           contentType:false,
           processData:false,
           success:function(data){
               if(data == 1){
                   layer.msg('更新成功');
                   setTimeout(function(){
                       location.href="/shop/foods";
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

   //更改图片信息
   function uploadImage(id){
           var oldpic = $("#picture").attr('src');
           var imgPath = $('#photo').val();
           if(imgPath == ""){
              layer.msg('请选择上传图片');
              return;
           }
       

           //判断上传文件为后缀名
           var strExtension = imgPath.substr(imgPath.lastIndexOf('.')+1);
           if(strExtension != 'jpg' && strExtension != 'gif'  && strExtension != 'png'  && strExtension != 'bmp'){
               layer.msg('请选择图片文件');
               return;
           }

           var formData = new FormData($('#myform')[0]);
           console.log(formData);
           $.ajax({
               type : "post",
               url : "{{url('/shop/foods/picture')}}",
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
                   // alert(data);
                   if(data != 0){
                    $('#picture').attr('src',"http://p2dtot555.bkt.clouddn.com/shop/foods/"+data);//????
                   }else{
                      layer.msg('上传失败');
                   }
               },
               error:function(XMLHttpRequest,textStatus,errorThrown){
                   layer.close(a);
                   layer.msg('上传失败,请检测网络后重试');
                   $("#picture").attr('src',oldpic);
               }
           });
       }
</script>
@endsection
    