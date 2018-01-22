<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增地址</title>
	
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
			width:400px;
			border:3px dotted #EEE;
			margin:auto;
		}
    </style>
</head>
<body>
	<div id='box'>
		<form class="form-horizontal" action="/home/order/order_insert">
		  <div class="form-group">
		    <label for="user" class="col-sm-2 control-label">收货人姓名:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="user" name='recName'  placeholder="请输入收货人姓名...">
		    </div>
		  </div>
		  <input type="hidden" name='id' value='{{ $id }}'>
		  <div class="form-group">
		    <label for="tel" class="col-sm-2 control-label">收货人电话:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="tel" name='recPhone'  placeholder="请输入收货人联系电话...">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="addr" class="col-sm-2 control-label">收货人地址:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="addr" name='detailAddr' placeholder="请输入收货人地址...">
		    </div>
		  </div>
		  

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-info">添加</button>
		    </div>
		  </div>
		</form>
	</div>
</body>
</html>