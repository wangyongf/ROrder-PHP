<!doctype html>
<html lang="en">
<head>
    <title>注册</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="{{ asset('/css/auth/login.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="templatemo-bg-gray">
<h1 class="margin-bottom-15">注册帐号</h1>
<div class="container">
    <div class="col-md-12">
        <form class="form-horizontal templatemo-create-account templatemo-container" role="form"
              action="" method="post">
            <div class="form-inner">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="email" class="control-label">邮箱</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="username" class="control-label">用户名</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="">
                    </div>
                    <div class="col-md-6 templatemo-radio-group" hidden>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="0"> 男性
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="1"> 女性
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="2" checked> 不告诉你
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="password" class="control-label">密码</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="control-label">确认密码</label>
                        <input type="password" class="form-control" id="password_confirm" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label><input type="checkbox">我同意 <a href="javascript:;" data-toggle="modal"
                                                             data-target="#modal1">服务条款</a> 以及 <a href="javascript:"
                                                                                                  data-toggle="modal"
                                                                                                  data-target="#modal2">隐私协议</a></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="submit" value="完成注册" class="btn btn-info">
                        <a href="{{ url('login') }}" class="pull-right">返回登录</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- 服务条款Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal_label1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title" id="modal_label1">服务条款</h4>
            </div>
            <div class="modal-body">
                <p>这里是服务条款，你必须同意哦 o_0</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div><!-- ./Modal -->

<!-- 隐私协议Modal -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal_label2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title" id="modal_label2">隐私协议</h4>
            </div>
            <div class="modal-body">
                <p>这里是隐私协议，你必须同意哦 o_0</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div><!-- ./Modal -->

<script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>