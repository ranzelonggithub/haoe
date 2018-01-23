<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商家注册...</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{{asset('Home/images/yahoo_panda_72px_534234_easyicon.net.ico')}}">
    <script src="{{ asset('Home/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('layer/layer.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('Home/css/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
    
    <style>
		*{
			margin:0;
			padding:0;

		}
		#box{
			width:810px ;
			margin:auto;
		}
    </style>
</head>
<body>
	<h1>门店信息</h1>
	<hr />
	<div id="box">
		<form class="form-horizontal" id="myform"  action="/home/coop/index_form" method="post" enctype="multipart/form-data">

		  	<div class="form-group">
		    	<label for="shopN" class="col-sm-2 control-label">店铺名称:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="shopName" id="shopN" placeholder="输入店铺名称...">
			    </div>
		  	</div>
		 	<div class="form-group">
			    <label for="shopP" class="col-sm-2 control-label">店铺电话:</label>
			    <div class="col-sm-10">
			      <input type="tel" class="form-control" name="shopPhone" id="shopP" placeholder="输入店铺电话...">
			    </div>
		  	</div>

		  	<div class="form-group">
		    	<label for="sellerN" class="col-sm-2 control-label">联系人(卖家名):</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="sellerName" id="sellerN" placeholder="输入联系人名称...">
			    </div>
		  	</div>
		 	<div class="form-group">
			    <label for="phone" class="col-sm-2 control-label">联系人电话:</label>
			    <div class="col-sm-10">
			      <input type="tel" class="form-control" name="phone" id="phone" placeholder="输入联系人电话...">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label for="address" class="col-sm-2 control-label">店铺地址:</label>
			    <div class="col-sm-10">
			      <input type="address" class="form-control" name="address" id="address" placeholder="输入店铺地址...">
			    </div>
		  	</div>
		  	店铺分类:
		  	<select name="shopCate" multiple class="form-control">
			 @if(count($cateName) > 0)
			 	@foreach($cateName as $k=>$v)
			  <option value="{{ $k + 1 }}">{{ $v['cateName'] }}</option>
			  	@endforeach
			 @endif
			 
			</select>
			<br />
			<div class="form-group">
			    <label for="" class="col-sm-2 control-label">开-关店铺时间::</label>
			    <div class="col-sm-10">
			      <input type="time" class="form-control" name="openTime" id="" placeholder="输入开店时间...">
			      <input type="time" class="form-control" name="closeTime" id="" placeholder="输入关店时间...">
			    </div>
		  	</div>
		  	<div class="form-group">

			市：<select name='city' class="common-text">
				<option value="">---请选择---</option>
                @foreach($city as $k => $v)
                    <option value="{{$v['id']}}" >{{$v['area']}}</option>
                @endforeach
                </select>

                &nbsp;&nbsp;&nbsp;区：<select name='distract' class="common-text">
                @foreach($distract as $k => $v)
                    <option value="{{$v['id']}}" >{{$v['area']}}</option>
                @endforeach
                </select>

                &nbsp;&nbsp;&nbsp;商圈：<select name='trade' class="common-text">
                @foreach($trade as $k => $v)
                    <option value="{{$v['id']}}" >{{$v['area']}}</option>
                @endforeach
                </select>
                                    
		  	</div>
		  	<table class="table table-hover table-bordered">
		  		<tr>门店照片:
		  			<td>
		  				<img src="{{ asset('Home/images/0122_1.jpg') }}" alt="">
		  				
		  			</td>
		  			<td>
		  				<input type="file" size="85" name="photo" id='photo' class="common-text"  title='点击更换头像' style='position:absolute;height:100px;width:100px;opacity:0;'  >
                        
		  				<img src="http://p2dtot555.bkt.clouddn.com/shop/shop/front.jpg" id="picture" alt="">
		  			</td>
		  			<td>
		  				门脸照需拍出完整门匾，门框，需在餐厅开门营业状态下完成拍摄
		  				（建议正对门店2米处拍摄，支持JPG、JPEG、PNG格式，大小不超过5M)
		  			</td>
		  			<td>
		  				<img src="http://p2dtot555.bkt.clouddn.com/shop/shop/logo.jpg" alt="">
		  			</td>
		  		</tr>
		  		<tr>
		  			<td>
		  				<img src="{{ asset('Home/images/0122_3.jpg') }}" alt="">
		  				
		  			</td>
		  			<td>
                        <input type="file" size="85" name="photo1" id='photo1' class="common-text"  title='点击更换头像' style='position:absolute;height:100px;width:100px;opacity:0;'  >
		  				<img src="http://p2dtot555.bkt.clouddn.com/shop/shop/inside.jpg" id="picture1" alt="">
		  			</td>
		  			<td>
		  				店内照需真实反映用餐环境
		  				（收银台，用餐桌椅。支持JPG、JPEG、PNG格式，大小不超过5M)
		  			</td>
		  			<td>
		  				<img src="http://p2dtot555.bkt.clouddn.com/shop/shop/logo.jpg" alt="">
		  			</td>
		  		</tr>
		  		<tr>
		  			<td colspan=4></td>
		  		</tr>
		  		<tr>
		  			<td>
		  				<img src="{{ asset('Home/images/0122_4.jpg') }}" alt="">
		  				
		  			</td>
		  			<td>
                        <input type="file" size="85" name="photo2" id='photo2' class="common-text"  title='点击更换头像' style='position:absolute;height:100px;width:100px;opacity:0;'  >
		  				<img src="http://p2dtot555.bkt.clouddn.com/shop/shop/logo.jpg" id="picture2" alt="">
		  			</td>
		  			<td>
		  				店内照需真实反映用餐环境 
		  				（收银台，用餐桌椅。支持JPG、JPEG、PNG格式，大小不超过5M)
		  			</td>
		  			<td>
		  				<img src="http://p2dtot555.bkt.clouddn.com/shop/shop/logo.jpg" alt="">
		  			</td>
		  		</tr>
		  	</table>
			

			<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary">提交 继续下一步</button>
			    </div>
			</div>
		</form>
	</div>

	<script>
		//更改区下拉框
    $('[name=city]').change(function(){
        var city = $(this).val();
        $.post("{{url('/home/coop/index')}}",{'city':city,'_token':'{{ csrf_token() }}'},function(data){

            var str = '<option >--请选择--</option>';
            var str1 = '<option >--请选择--</option>';
            for(var k in data){
                str += '<option value="'+data[k]['id']+'" >'+data[k]['area']+'</option>';
            }
            $('[name=distract]').html(str);
            $('[name=trade]').html(str1);
        });
    });


    //更改商圈下拉框
    $('[name=distract]').change(function(){
        var distract = $(this).val();
        $.post("{{url('/home/coop/index')}}",{'distract':distract,'_token':'{{ csrf_token() }}'},function(data){
            var str = '<option >--请选择--</option>';
            for(var k in data){
                str += '<option value="'+data[k]['id']+'" >'+data[k]['area']+'</option>';
            }
            $('[name=trade]').html(str);
        });
    });
		
	</script>

	<!-- 图片上传 -->
	<script>
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });


	
		//文件改变,开始上传
	    $(function(){
	        $('#photo').change(function(){
	            uploadImage();
	        });

	        $('#photo1').change(function(){
	            uploadImage1();
	        });
	        $('#photo2').change(function(){
	            uploadImage2();
	        });

	    });


	    //判断是否有文件上传  门脸
	    function uploadImage(){

	        var oldpic = $("#picture").attr('src');
	        var imgPath = $('#photo').val();
	        if(imgPath == ""){
	            alert('请选择上传图片');
	            return;
	        }
	    


	        //判断上传文件为后缀名
	        var strExtension = imgPath.substr(imgPath.lastIndexOf('.')+1);
	        if(strExtension != 'jpg' && strExtension != 'gif'  && strExtension != 'png'  && strExtension != 'bmp'){
	            alert('文件格式有误 请选择图片文件');
	            return;
	        }


	        var formData = new FormData($('#myform')[0]);
	        console.log(formData);
	        $.ajax({
	            type : "post",
	            url : "/home/coop/index/up",
	            data : formData,
	            async : true,
	            cache : false,
	            contentType:false,
	            processData:false,
	            beforeSend:function(){
	                a = layer.load();
	            },
	            success:function(data){
	            	alert(data) ;
	                layer.close(a);
	                $('#picture').attr('src',"http://p2dtot555.bkt.clouddn.com/shop/shop/" + data);
	            },
	            error:function(XMLHttpRequest,textStatus,errorThrown){
	                layer.close(a);
	                alert("上传失败,请检测网络后重试");
	                $("#picture").attr('src',oldpic);
	            }
	        });
	    
	    }


	    //判断是否有文件上传  门脸
	    function uploadImage1(){

	        var oldpic = $("#picture1").attr('src');
	        var imgPath = $('#photo1').val();
	        if(imgPath == ""){
	            alert('请选择上传图片');
	            return;
	        }
	    


	        //判断上传文件为后缀名
	        var strExtension = imgPath.substr(imgPath.lastIndexOf('.')+1);
	        if(strExtension != 'jpg' && strExtension != 'gif'  && strExtension != 'png'  && strExtension != 'bmp'){
	            alert('文件格式有误 请选择图片文件');
	            return;
	        }


	        var formData = new FormData($('#myform')[0]);
	        console.log(formData);
	        $.ajax({
	            type : "post",
	            url : "/home/coop/index/up1",
	            data : formData,
	            async : true,
	            cache : false,
	            contentType:false,
	            processData:false,
	            beforeSend:function(){
	                a = layer.load();
	            },
	            success:function(data){
	            	alert(data) ;
	                layer.close(a);
	                $('#picture1').attr('src',"http://p2dtot555.bkt.clouddn.com/shop/shop/" + data);
	            },
	            error:function(XMLHttpRequest,textStatus,errorThrown){
	                layer.close(a);
	                alert("上传失败,请检测网络后重试");
	                $("#picture1").attr('src',oldpic);
	            }
	        });
	    
	    }

	    //判断是否有文件上传  logo
	    function uploadImage2(){

	        var oldpic = $("#picture2").attr('src');
	        var imgPath = $('#photo2').val();
	        if(imgPath == ""){
	            alert('请选择上传图片');
	            return;
	        }
	    


	        //判断上传文件为后缀名
	        var strExtension = imgPath.substr(imgPath.lastIndexOf('.')+1);
	        if(strExtension != 'jpg' && strExtension != 'gif'  && strExtension != 'png'  && strExtension != 'bmp'){
	            alert('文件格式有误 请选择图片文件');
	            return;
	        }


	        var formData = new FormData($('#myform')[0]);
	        console.log(formData);
	        $.ajax({
	            type : "post",
	            url : "/home/coop/index/up2",
	            data : formData,
	            async : true,
	            cache : false,
	            contentType:false,
	            processData:false,
	            beforeSend:function(){
	                a = layer.load();
	            },
	            success:function(data){
	            	alert(data) ;
	                layer.close(a);
	                $('#picture2').attr('src',"http://p2dtot555.bkt.clouddn.com/shop/shop/" + data);
	            },
	            error:function(XMLHttpRequest,textStatus,errorThrown){
	                layer.close(a);
	                alert("上传失败,请检测网络后重试");
	                $("#picture2").attr('src',oldpic);
	            }
	        });
	    
	    }


	    
	</script>>
</body>
</html>