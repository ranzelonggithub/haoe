<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加密码</title>
	<link rel="stylesheet" href="{{ asset('Home/css/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
	<script src="{{ asset('Home/js/jquery-1.8.3.min.js') }}"></script>
	<style>
		*{
			margin:0;
			padding:0;
			text-align:center;
		}
		#box{
			width:240px;
			margin:auto;
		}
		.active1{
			font:24px/1.5 '微软雅黑';
			color:red;
		}
		.active2{
			font:24px/1.5 '微软雅黑';
			color:#f0c;
		}
		.active3{
			font:24px/1.5 '微软雅黑';
			color:green;
		}
		.active4{
			font:24px/1.5 '微软雅黑';
			color:blue;
		}
	</style>
</head>
<body>
	<form class="form-horizontal" action="{{ url('/home/user/pass_add_do') }}" method="get"> 
		<div id='box'>
		  	<div class="form-group">
		    	<label for="pass" class="col-sm-2 control-label">输入密码:</label>
		    	<div class="col-sm-10">
		      	<input type="password" class="form-control" id="pass" name="passWord" placeholder="输入密码...">
		    	</div>
		  	</div>
		  		<div id='pa'></div>

			<div class="form-group">
				<label for="rep_pass" class="col-sm-2 control-label">再次输入密码:</label>
				<div class="col-sm-10">
			  	<input type="password" class="form-control" id="rep_pass" name="rep_pass" placeholder="再次输入密码...">
				</div>
			</div>
	 			<div id='re_pa'></div>	
			<input type="hidden" name='id' value="{{ $id }}">
		 	<div class="form-group">
		    	<div class="col-sm-offset-2 col-sm-10">
		      	<button type="submit" class="btn btn-default">提交</button>
		    	</div>
		  	</div>
	  	</div>
	</form>

	<script>
		//输入unicode 判断输入的字符属于哪一类
		var type = null ;//接收类型参数
		var str = '' ;
		function check_unicode(c) {
			if(c >= 48 && c <= 57) {
				//c是数字
				return 1 ;
				// type = 1 ;

			}else if(c >= 65 && c <= 90) {
				//c 是大写字母
				// type = 2 ;
				return 2 ;
			}else if(c >= 97 && c <= 122) {
				//c 是小写字母
				// type = 4;
				return 4 ;
			}else {
				//c 是特殊字符
				// type = 8 ;
				return 8 ;
			}
		}
		$('#pass').blur(function() {
			//获取到输入的密码值
			var text = $('#pass').val() ;

			if(text.length > 4) {
				var mode = '' ;
				// console.log(text.length) ;
				for(var i = 0; i < text.length; i++) {
					// console.log(text.length) ;
					// alert('for循环.....') ;
					//charCodeAt() 方法可返回指定位置的字符的 Unicode 编码。这个返回值是 0 - 65535 之间的整数。
					// alert(text.charCodeAt(i) );
					mode = check_unicode(text.charCodeAt(i)) ;
					// console.log(mode) ;
					/*//将mod分割成字符串数组
					var arr = str.split("") ;*/
					//判断字符串中是否有1,2,4,8
					
					
					if(str.indexOf(mode) == -1 ) {
						str += mode ;
						console.log(mode) ;
						console.log(str) ;
					}
					

				}
				console.log(str) ;
				console.log(str.length) ;
				switch(str.length) {
					case 1 :
						$('#pa').html('密码等级 弱...')  ;
						$('#pa').addClass("active1") ;
						break;
					case 2:
						$('#pa').html(" 密码等级 中...")  ;
						$('#pa').addClass("active2") ;
						break;
					case 3:
					case 4:
						$('#pa').html('密码等级 高...')  ;
						$('#pa').addClass("active3") ;
						break;
					default :
						$('#pa').html(" 快跑吧 地震了 ...") ;
						$('#pa').addClass("active4") ;
						break;
				}
			}else {
				$('#pa').html(" 密码至少5位..." ) ;
				$('#pa').addClass("active1") ;
			}
		}) 
		$('#rep_pass').blur(function() {
			var text = $('#pass').val() ;
			var text1 = $('#rep_pass').val() ;
			if(text != text1) {
				$('#re_pa').html('两次输入密码不一致 请重新输入') ;
				$('#re_pa').addClass("active1") ;
			}else {
				$('#re_pa').html('please go on ') ;
			}
		}) 
	</script>
</body>
</html>