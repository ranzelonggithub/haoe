<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>系统后台管理</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/systems/css/admin_login.css')}}"/>

    
</head>
<body>
<div class="admin_login_wrap">
     <div class="adming_login_border">
    <!-- <h1><b><font color="black">后台管理</font></b></h1> -->
        <div class="admin_input">
            <form action="{{'/sys/login'}}" method="post">
            {{ csrf_field() }}
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="userName" value="" id="user" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password" value="" id="pwd" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">验证码：</label>
                        <input type="text" name="code" value="" id="code" size="15" class="admin_input_style" />                        
                        <img src="/sys/code" class="admin_input_style" class="admin_input_style" onclick="this.src = this.src += '?!'">

                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>