<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改性别</title>
	<link rel="stylesheet" href="{{ asset('Home/css/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
	<script src="{{ asset('Home/js/jquery-1.8.3.min.js') }}"></script>
	<style>
		*{
			margin:0;
			padding:0;
			text-align:center;
		}
	
		input[type='radio']{
			width:36px ;
			height:36px ;
			font:24px/1.5 '微软雅黑';
		}
	</style>
</head>
<body>
	<form class="layui-form" action="{{ url('/home/user/sex_change')}}" method="get">
	  	<div class="layui-form-item">
    	<label class="layui-form-label"></label>
	    	<div class="layui-input-block">
	      		<input type="radio" name="sex" value="男"  {{ $sex=='m' ? 'checked':''}}>男
	      		<input type="radio" name="sex" value="女"  {{ $sex=='w' ? 'checked':''}}>女
	      		<input type="hidden" name='id' value='{{ $id }}'>
	    	</div>
  		</div>
  		<button class="btn btn-primary">修改</button>
	</form>


</body>
</html>