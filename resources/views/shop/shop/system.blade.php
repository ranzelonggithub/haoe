@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">店铺信息</span></div>
        </div>
        <div class="result-wrap">
            <form action="shop.shop"  id="myform" name="myform" enctype='multipart/form-data'>
                {{csrf_field()}}
                <div class="config-items">
                    <div class="config-title">
                        <h1><i class="icon-font">&#xe00a;</i>店铺信息</h1>
                    </div>
                    <div class="result-content">
                        <table width="100%" class="insert-tab">
                            <tbody>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>门户logo：</th>
                                    <td>
                                        <input type="file" size="85" name="logo" id='file_upload' class="common-text" style='position:absolute;height:170px;width:220px;opacity:0'>
                                        <img src="{{asset('upload/shop/shop/shopPic.jpg')}}" height="170" width="220" id='picture'>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>店内图片：</th>
                                    <td>
                                        <input type="file" size="85" name="insidePic" id='insidePic_upload' class="common-text" style='position:absolute;height:170px;width:220px;opacity:0'>
                                        <img src="{{asset('upload/shop/shop/shopPic.jpg')}}" height="170" width="220" id='insidePic'>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>门脸照片：</th>
                                    <td>
                                        <input type="file" size="85" name="frontPic" id='frontPic_upload' class="common-text" style='position:absolute;height:170px;width:220px;opacity:0'>
                                        <img src="{{asset('upload/shop/shop/shopPic.jpg')}}" height="170" width="220" id='frontPic'>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>食物图片：</th>
                                    <td>
                                        <input type="file" size="85" name="goodPic" id='goodPic_upload' class="common-text" style='position:absolute;height:170px;width:220px;opacity:0'>
                                        <img src="{{asset('upload/shop/shop/shopPic.jpg')}}" height="170" width="220" id='goodPic'>
                                    </td>
                                </tr>
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
                                    <th width="15%"><i class="require-red">*</i>食物总数：</th>
                                    <td><input type="number" id="" value="" size="85" name="amount" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>配送费：</th>
                                    <td><input type="number" id="" value="{{$data['deliPrice']}}" size="85" name="deliPrice" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>起步价：</th>
                                    <td><input type="number" id="" value="{{$data['initPrice']}}" size="85" name="initPrice" class="common-text"></td>
                                </tr>
                                <tr>
                                    <th width="15%"><i class="require-red">*</i>开店时间：</th>
                                    <td><input type="time" id="" value="{{$data['openTime']}}" size="85" name="openTIme" class="common-text"></td>
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
                                        <input type="submit" value="提交" class="btn btn-primary btn6 mr10">
                                        <input type="button" value="返回" onClick="history.go(-1)" class="btn btn6">
                                    </td>
                                </tr>
                            </tbody></table>
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
            url : "/shop/shop",
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
                $('#picture').attr('src',"{{asset('upload/shop/shop')}}/"+data);//????
            },
            error:function(XMLHttpRequest,textStatus,errorThrown){
                layer.close(a);
                alert("上传失败,请检测网络后重试");
                $("#picture").attr('src',oldpic);
            }
        });
    }
 </script>
    <!--/main-->
 @endsection


