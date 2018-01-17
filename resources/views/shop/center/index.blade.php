@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">个人中心</span></div>
        </div>
       <div class="result-wrap">
            <div class="result-title">
                <h1>个人中心</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                <form  method='post' id="myform" name="myform" enctype='multipart/form-data'>
                    {{csrf_field()}}
                    <input type="hidden" name='id' value="{{$seller['id']}}">
                    <li style='margin-left:120px;border:1px solid #fff'>
                        <input type="file" size="85" name="photo" id='photo' class="common-text" onchange="uploadImage({{$seller['id']}})" title='点击更换头像' style='position:absolute;height:100px;width:100px;opacity:0'>
                        <img src="http://p2dtot555.bkt.clouddn.com/shop/seller/{{$photo}}" height="100" width="100" id='picture' style='border:3px solid #aaa'>
                    </li>
                </form>           
                    <li>
                        <label class="res-lab">用户</label><span class="res-info">{{$seller['sellerName']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">电话</label><span class="res-info">{{$seller['phone']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">邮箱</label><span class="res-info">{{$seller['email']}}</span>
                    </li>
                    <li>
                        <label class="res-lab">性别</label>
                    @if($sex == 0)
                        <span class="res-info">男</span>
                    @else
                        <span class="res-info">女</span>
                    @endif
                    </li>
                    <li>
                        <a href="/shop/center/{{$seller['id']}}/edit"><button class="btn btn-primary btn6 mr10" style="margin-left:115px">修改</button></a>
                    </li>                    
                </ul>
            </div>
        </div>
       
    </div>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       //判断是否有文件上传
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
               url : "{{url('/shop/center')}}",
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
                   if(data != 0){
                    $('#picture').attr('src',"http://p2dtot555.bkt.clouddn.com/shop/seller/"+data);//????
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
    <!--/main-->
@endsection