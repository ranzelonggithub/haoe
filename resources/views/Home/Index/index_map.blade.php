<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" href="{{ asset('Home/css/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
	<script src="{{ asset('Home/js/jquery-1.8.3.min.js') }}"></script>
	<style>
		*{
			margin:0;
			padding:0;
			text-align:center;
		}
		#box{
			width:810px;
			margin:auto;
		}
		label{
			font:24px/1.5 '微软雅黑';
			font-weight:bolder;
		}
		select{
			width:160px;
			height:36px;
			font:18px/1.5 '微软雅黑';
		}
	</style>
</head>
<body>
	<h1>好饿呀</h1>	
	<button class="btn btn-warning" onclick="location='/home/coop/index'">申请成为卖家</button>	
	<hr />
	<div id="box">
		<form action="/home/list" method="get">
	
	        <label for="city">市:</label>
	    	<select name='city' id="city" class="common-text">
	        <option value="">---请选择---</option>
	        @foreach($city as $k => $v)
	            <option value="{{$v['id']}}" >{{$v['area']}}</option>
	        @endforeach
	        </select>

			&nbsp;&nbsp;&nbsp;
			<label for="dis">区:</label>
	        <select id="dis" name='distract' class="common-text">
	        @foreach($distract as $k => $v)
	            <option value="{{$v['id']}}" >{{$v['area']}}</option>
	        @endforeach
	        </select>
			
			&nbsp;&nbsp;&nbsp;
			<label for="tra">商圈:</label>
	        <select id="tra" name='trade' class="common-text">
	        @foreach($trade as $k => $v)
	            <option value="{{$v['id']}}" >{{$v['area']}}</option>
	        @endforeach
	        </select>
	                            
	  		<hr>
	        <button class="btn btn-info btn-block" type="submit" id="sub">开启美食之旅...</button>
	    <!-- </form> -->
	</div>
    <script>
      //更改区下拉框
	    $('[name=city]').change(function(){
	        var city = $(this).val();
	        $.post("{{url('/home/map/list')}}",{'city':city,'_token':'{{ csrf_token() }}'},function(data){
	            //alert(data) ;
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
	        $.post("{{url('/home/map/list')}}",{'distract':distract,'_token':'{{ csrf_token() }}'},function(data){
	            var str = '<option >--请选择--</option>';
	            for(var k in data){
	                str += '<option value="'+data[k]['id']+'" >'+data[k]['area']+'</option>';
	            }
	            $('[name=trade]').html(str);
	        });
	    });


	   /* $('#sub').click(function() {
	    	var city = $('[name=city]').val() ;
	        var distract = $('[name=distract]').val()  ;
	        var trade = $('[name=trade]').val() ;
	        var trade = 1 ;  
	        location.href="/home/list?trade_id=" + trade ;
	    })*/
	</script>
	
</body>
</html>