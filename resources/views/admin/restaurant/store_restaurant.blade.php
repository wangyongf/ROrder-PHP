<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('/favicon.ico') }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <title>编辑餐厅信息</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    {{--Fonts and icons--}}
    <link href="//cdn.bootcss.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    {{--bootstrap validator--}}
    <link rel="stylesheet" href="{{ asset('/css/admin/bootstrapValidator.min.css') }}">

    <style type="text/css">
        .with-margin {
            margin-left: 100px;
            margin-right: 100px;
        }
    </style>
</head>
<body>

{{--导航栏--}}
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">美味宝</a>
        </div>

        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">iOS</a></li>
                <li><a href="#">SVN</a></li>
                <li><a href="#">Android</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Java <b class="caret"></b> </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">JMeter</a></li>
                        <li><a href="#">EJB</a></li>
                        <li><a href="#">Jasper Report</a></li>
                        <li class="divider"></li>
                        <li><a href="#">另一个分离的链接</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
        </ul>
    </div> {{--end container-fluid--}}
</nav>

{{--表单部分--}}
<div class="panel panel-primary with-margin">
    <div class="panel-heading">
        <h3 class="panel-title">录入餐厅信息</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="post" action="{{ action('Api\Restaurant\RestaurantController@store') }}">
            {{--餐厅编号--}}
            <div class="form-group">
                <label for="restaurant-id" class="col-sm-2 control-label">餐厅编号(必填):</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="restaurant-id" name="restaurant-id"
                           placeholder="请输入餐厅编号, 例如: ABCDEFG123" required>
                </div>
            </div>
            {{--餐厅名字--}}
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">餐厅名字(必填):</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name"
                           placeholder="请输入餐厅名字" required>
                </div>
            </div>
            {{--餐厅描述--}}
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">餐厅描述(选填):</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="3" id="description" name="description"
                              placeholder="请输入餐厅描述"></textarea>
                </div>
            </div>
            {{--餐厅地址--}}
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label">餐厅地址(选填):</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="address" name="address"
                           placeholder="请输入餐厅地址">
                </div>
            </div>
            {{--请记住我--}}
            <div class="form-group" hidden="hidden">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="">
                            <input type="checkbox">请记住我
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info">提交</button>
                    <button type="reset" class="btn btn-danger">重置</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
<script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/admin/bootstrapValidator.min.js') }}"></script>
</html>