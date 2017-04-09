<!doctype html>
<html lang="en">
<head>
    <title>找回密码</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//cdn.bootcss.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="{{ asset('/css/auth/login.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="templatemo-bg-gray">
<div class="container">
    <div class="col-md-12">
        <h1 class="margin-bottom-15">重置密码</h1>
        <form class="form-horizontal templatemo-forgot-password-form templatemo-container" role="form" action="#" method="post">
            <div class="form-group">
                <div class="col-md-12">
                    请输入你的注册邮箱
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="email" placeholder="注册邮箱">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="submit" value="找回密码" class="btn btn-danger">
                    <br><br>
                    <a href="{{ url('login') }}">返回登录</a> |
                    <a href="{{ url('/') }}">进入首页</a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>