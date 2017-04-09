<!doctype html>
<html lang="en">
<head>
    <title>登录</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
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
        <h1 class="margin-bottom-15">用户登录 </h1>
        <form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form"
              action="" method="post">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="control-wrapper">
                        <label for="username" class="control-label fa-label"><i
                                    class="fa fa-user fa-medium"></i></label>
                        <input type="text" class="form-control" id="username" name="email" placeholder="注册邮箱">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="control-wrapper">
                        <label for="password" class="control-label fa-label"><i
                                    class="fa fa-lock fa-medium"></i></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="密码">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox control-wrapper">
                        <label>
                            <input type="checkbox" name="remember"> 记住帐号
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="control-wrapper">
                        <input type="submit" value="登录" class="btn btn-info" style="width: 100px">
                        <a href="{{ url('forgotPassword') }}" class="text-right pull-right">忘记密码？</a>
                    </div>
                </div>
            </div>
            {{--<hr>--}}
            {{--<div class="form-group" hidden="hidden">
                <div class="col-md-12">
                    <label>使用合作帐号登录: </label>
                    <div class="inline-block">
                        <a href="#"><i class="fa fa-github login-with"></i></a>
                        <a href="#"><i class="fa fa-weixin login-with"></i></a>
                        <a href="#"><i class="fa fa-weibo login-with"></i></a>
                        <a href="#"><i class="fa fa-qq login-with"></i></a>
                    </div>
                </div>
            </div>--}}
        </form>
        <div class="text-center">
            <a href="{{ url('register') }}" class="templatemo-create-new">没有帐号？马上注册！ <i class="fa fa-arrow-circle-o-right"></i></a>
        </div>
    </div>
</div>
</body>
</html>