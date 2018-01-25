<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('Home/css/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="content">
                <div class="title">
                <pre>
                    
                    进入审核状态...
                    3-5个工作日之后 会以短信或者邮件的方式通知审核结果...
                    准备好身份证 营业执照  餐饮许可证 等以备下一轮审核 谢谢!
                </pre>
                <button class="btn btn-info" onclick="location='/home/map'">跳转到首页</button>
                </div>
            </div>
        </div>
    </body>
</html>
