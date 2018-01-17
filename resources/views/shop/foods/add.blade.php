@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">食品</a><span class="crumb-step">&gt;</span><span>添加食品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form  method="post" id="myform" name="myform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="cate" id="catid" class="required common-text">
                                    @foreach($cateName as $k =>$v)
                                    <option value="{{$k}}">{{$v}}</option> 
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>名称：</th>
                                <td>
                                    <input class="common-text required goodsName"  name="goodsName" size="50" value="{{ old('goodsName') }}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>状态：</th>
                                <td>
                                    <input type="radio" value='下架' name='state' class='common-text required'>下架
                                    <input type="radio" value='上架' name='state' class='common-text required' checked>上架
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>排序：</th>
                                <td>
                                    <input class="number common-text"  name="sort" value="{{ old('sort') }}" type="number" max='1000'>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>价格：</th>
                                <td>
                                    <input class="number common-text"  name="price" value="{{ old('price') }}" type="number" max='1000000'>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>图片：</th>
                                <td><input name="picture" id="" type="file"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>描述：</th>
                                <td><textarea name="description" class="common-textarea"  cols="30" style="width: 98%;" rows="10" maxlength='70' placeholder="最多输入70个字">{{ old('description') }}</textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" onClick="up()" value="添加" >
                                    <input class="btn btn6" value="重置" type="reset">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
@endsection

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


   //添加食物
   function up(){
       var formData = new FormData($('#myform')[0]);
       $.ajax({
           type : "post",
           url : "{{url('/shop/foods')}}",
           data : formData,
           async : true,
           cache : false,
           contentType:false,
           processData:false,
           success:function(data){
               if(data == 1){
                   layer.msg('添加成功');
                   setTimeout(function(){
                       location.href="/shop/foods";
                   },1000);
                   
               }else{
                   layer.msg('添加失败');
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




    