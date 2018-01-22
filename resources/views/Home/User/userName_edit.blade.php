<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{ asset('Home/css/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
	<script src="{{ asset('Home/js/jquery-1.8.3.min.js') }}"></script>

	<style>
		*{
			margin:0;
			padding:0;
			text-align:center;
		}
		.active1{
			font:9px/1.5 '微软雅黑';
			color:red;
		}
		.active2{
			font:9px/1.5 '微软雅黑';
			color:red;
		}
	</style>
</head>
<body>
	
	<form class="form-inline">
	  <div class="form-group">
	    <label class="sr-only" for="user">用户名</label>
	    <div class="input-group">
	      <div class="input-group-addon">用户名:</div>
	      <input type="text" class="form-control" id="user" name="userName" value="{{ $userName }}" placeholder="修改用户名...">
	    </div>
	    
	  </div>
	  <div id="username_innerHTML">
	    	
	  </div>
	  <button type="submit" class="btn btn-primary" onclick="userName_update({{ $id }})">修改</button>
	</form>
	<script>

		$('#user').blur(function() {
			var preg = /^[a-zA-Z]\w{5,17}$/;
			var text = $('#user').val() ;

			if(preg.test(text)) {
				$('#username_innerHTML').html('账号可用!') ;
				$('#username_innerHTML').addClass('active2');
			}else{
				$('#username_innerHTML').html('* 用户名 6~18个字符，可使用字母、数字、下划线，需以字母开头 ...!' ) ;
				$('#username_innerHTML').addClass('active1') ;
			}
		}) ;
		function userName_update(id) {
			var name = $('[id=user]').val() ;
			// alert(name) ;
			$.ajax({
				type:'get',
				url:"{{ url('/home/user/user_change') }}" ,
				data:{'id':id,'name':name} ,
				success:function(msg) {
					return name ;
				} 
			}) ;
		}
	</script>
</body>
</html>