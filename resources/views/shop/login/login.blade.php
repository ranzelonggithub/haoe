<!DOCTYPE html>
<html>
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>好饿呀店铺后台</title>
	<script type="text/javascript" src="{{asset('shops/login/js/jquery-1.12.3.min.js')}}"></script>
	<link type="text/css" href="{{asset('shops/login/css/main.min814b.css')}}" rel="stylesheet" />
	<link href="{{asset('shops/login/css/acount6aa4.css')}}" rel="stylesheet" />
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
</head>

<body style="background: url('../shops/login/images/bg.jpg') no-repeat;">
		<div class="login_border" style="padding:10px;">
			<div class="login" style="display: block;">
				<ul class="login-tab">
					<li class="login-on">普通登录</li>
					<li>手机登录</li>
				</ul>
				<div class="login-body">
					<div class="login-style" style="display: block;">
						<dl><dd><input name="txtUser" type="text" id="txtUser" placeholder="用户名/邮箱/手机号" /></dd></dl>
						<dl>
							<dd><input type="password" id="Userpwd" onkeydown="enterHandler(event)" placeholder="请输入您的密码" /></dd>
						</dl>
						<div class="tishi"></div>
						<button onclick="cliLogin()" id="logbtn" style="outline:none">登 录</button>
					</div>
					<div class="login-style">
						<dl><dd><input name="phone" type="text" id="phone" placeholder="您的手机号码" /></dd></dl>
						<dl>
                            <dd><input type="text" id="dynamicPWD"  style="width: 133px;" placeholder="短信验证码" /><input type="button" id="btn" class="btn_mfyzm" value="获取动态密码" onclick="Sendpwd(this)"  disabled="disabled" /></dd>
						</dl>
						<div class="tishi"></div>
						<button type="button" id="dynamicLogon" style="outline:none">登 录</button>
					</div>
				</div>
			</div>
		</div>


<script type="text/javascript" src="{{asset('shops/login/js/style.js')}}"></script>

</body>

</html>

<script type="text/javascript">

    //检查电话号码
    $('input[name=phone]').blur(function(){
        var phone = $(this).val();
        $.post('/shop/phone',{'phone':phone,'_token':'{{csrf_token()}}'},function(data){
              switch(data){
                case 'no':
                    layer.tips('电话号码格式不正确', '#phone');
                    $('#btn').attr('disabled','disabled');
                    break;
                case 'not':
                    layer.tips('电话号码输入错误', '#phone');
                    $('#btn').attr('disabled','disabled');
                    break;
                case 'ok':
                    $('#btn').removeAttr('disabled');
                    break;
            }
        });
    });


    //发送验证码
    var time = 0;
    $('#btn').click(function(){
        if(time == 0){
            var phone = $('input[name=phone]').val();
            $.post('/shop/code',{'phone':phone,'_token':'{{csrf_token()}}'},function(data){
                alert(data);
            });
            $('#btn').attr('disabled','disabled');
        }
        if (time == 0) {
                time = 10; 
                var index = setInterval(function(){
                    time--;
                    if (time == 0) {
                        clearInterval(index);
                        time = 0;
                        $('#btn').removeAttr('disabled');
                    }
                }, 1000);
            }
    });

    //执行登录
    $('#dynamicLogon').click(function(){
        var code = $('#dynamicPWD').val();
        var phone = $('input[name=phone]').val();
        $.post('/shop/dologin',{'code':code,'phone':phone,'_token':'{{csrf_token()}}'},function(data){
            if(data == 0){
                layer.tips('验证码不正确', '#dynamicPWD');
            }else{
                // {{return view('shop.index.index')}}
            }
        });
    });
</script>
