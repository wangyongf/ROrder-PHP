<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/png" href="{{ asset('/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>美味宝-- 在这里,遇见美味</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/home/landing-page.css') }}" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href="//cdn.bootcss.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/home/pe-icon-7-stroke.css') }}" rel="stylesheet"/>
</head>
<body class="landing-page landing-page1">
<nav class="navbar navbar-transparent navbar-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a href="#">
                <div class="logo-container">
                    <div class="logo">
                        <img src="{{ asset('/img/new_logo.png') }}" alt="Scott Wang">
                    </div>
                    <div class="brand">
                        王用
                    </div>
                </div>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="example">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <i class="fa fa-facebook-square"></i>
                        Android
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                        iOS
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-pinterest"></i>
                        UWP
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>
<div class="wrapper">
    <div class="parallax filter-gradient orange" data-color="orange">
        <div class="parallax-background">
            <img class="parallax-background-image" src="{{ asset('/img/showcases/showcase-1/bg.jpg') }}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="description">
                        <h2>美味宝 -- 在这里,遇见美味</h2>
                        <br>
                        <h4>
                            　　美味宝,因为3年深入行业需求,并专注移动互联领域的软件系统研发,为店务管理+平台
                            运营提供全套方案,更在餐饮上下游产业链思考更远.助力餐饮从业者,创业者们决胜市场竞争!
                        </h4>
                    </div>
                    <div class="buttons">
                        <button class="btn btn-fill btn-neutral">
                            <i class="fa fa-apple"></i> Appstore
                        </button>
                        <button class="btn btn-simple btn-neutral">
                            <i class="fa fa-android"></i>
                        </button>
                        <button class="btn btn-simple btn-neutral">
                            <i class="fa fa-windows"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-5  hidden-xs">
                    <div class="parallax-image">
                        <img class="phone" src="{{ asset('/img/showcases/showcase-1/iphone.png') }}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-gray section-clients">
        <div class="container text-center">
            <h4 class="header-text">他们都在用 -- 排名高,口碑好的餐饮管理软件</h4>
            <p>
                升级无需更换硬件,安装即用!零成本使用微信支付,支付宝,会员支付等收款方式.
                <br>
                全面支持手机点餐,
                点餐宝点餐,pad点餐,微信扫码点餐,预约排队,触屏收银等多种点单方式.
                <br>
                会员营销新奇特,客户反馈更高效.关怀激发老用户,分享带来新客源.
                <br>
                线上线下数据全打通,订单及客户数据自主掌握,随身监控,高效决策
                精控成本.
                <br>
            </p>
            <div class="logos">
                <ul class="list-unstyled">
                    <li><img src="{{ asset('/img/logos/adobe.png') }}"/></li>
                    <li><img src="{{ asset('/img/logos/zendesk.png') }}"/></li>
                    <li><img src="{{ asset('/img/logos/ebay.png') }}"/></li>
                    <li><img src="{{ asset('/img/logos/evernote.png') }}"/></li>
                    <li><img src="{{ asset('/img/logos/airbnb.png') }}"/></li>
                    <li><img src="{{ asset('/img/logos/zappos.png') }}"/></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="section section-presentation">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="description">
                        <h4 class="header-text">互联网+餐饮,划时代升级</h4>
                        <p>
                            算盘账目/单机收银时代:
                            <br>
                            劳动力高依赖,系统结构复杂,数据信息孤岛,营销无法开展."粗放式"的经营模式,呆萌的餐饮管理,
                            笨拙的运作效率,高昂的时间成本.
                        </p>
                        <p>
                            消费升级!互联网+餐饮,划时代升级:
                            <br>
                            "精细化"运营模式,智能化餐饮管理,提高运作效率,降低成本.在注重消费体验,门店推广和客流转化的
                            今天,实体门店与线上在线餐厅的结合已经成为餐饮业的主流,线上的额先期展示与引导成为决定线下
                            客流的重要因素.
                        </p>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1 hidden-xs">
                    <img src="{{ asset('/img/showcases/showcase-1/iphones.png') }}" style="top:-50px">
                </div>
            </div>
        </div>
    </div>
    <div class="section section-demo">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="description-carousel" class="carousel fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item">
                                <img src="{{ asset('/img/showcases/showcase-1/examples/home_3.jpg') }}" alt="">
                            </div>
                            <div class="item active">
                                <img src="{{ asset('/img/showcases/showcase-1/examples/home_2.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('/img/showcases/showcase-1/examples/home_1.jpg') }}" alt="">
                            </div>
                        </div>
                        <ol class="carousel-indicators carousel-indicators-orange">
                            <li data-target="#description-carousel" data-slide-to="0" class=""></li>
                            <li data-target="#description-carousel" data-slide-to="1" class="active"></li>
                            <li data-target="#description-carousel" data-slide-to="2" class=""></li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <h4 class="header-text">单店点单营销,多店平台运营</h4>
                    <p>
                        单店点单营销:
                        <br>
                        独立的堂吃收银,触屏点餐.可视化后台管理,快捷的点单界面.完整主系统终生免费,注册即用!
                        <br>
                        <br>
                        多店平台运营:
                        <br>
                        平台创业者专属,不限店铺数,可视化后台管理.餐厅联盟,佣金设定,添加供应商,做餐厅才配联盟.
                        本地化生活服务餐厅O2O平台系统.
                    </p>
                    <a href="" id="Demo1" class="btn btn-warning btn-fill"
                       data-button="warning">免费体验,注册即用!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-features">
        <div class="container">
            <h4 class="header-text text-center">多种业务类型使用</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-orange">
                        <div class="icon">
                            <i class="pe-7s-musiclist"></i>
                        </div>
                        <div class="text">
                            <h4>中小餐饮商家</h4>
                            <p>
                                简单易用的点单收银软件,菜品管理客户营销,财务管理统计分析,系统使用及升级终身免费.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-orange">
                        <div class="icon">
                            <i class="pe-7s-bell"></i>
                        </div>
                        <h4>外卖餐饮商家</h4>
                        <p>
                            方便快捷的下单流程,精美的网页菜品展示,外卖送餐或到店消费可提前预定,餐厅经营更高效.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-orange">
                        <div class="icon">
                            <i class="pe-7s-play"></i>
                        </div>
                        <h4>外卖平台创业</h4>
                        <p>
                            简易搭建本地生活服务O2O平台,创业者专属品牌!多种盈利方式,食材供应,外卖配送,全部打通!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-testimonial">
        <div class="container">
            <h4 class="header-text text-center">成功案例</h4>
            <div id="carousel-example-generic" class="carousel fade" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item">
                        <div class="mask">
                            <img src="{{ asset('/img/faces/小董快跑.png') }}">
                        </div>
                        <div class="carousel-testimonial-caption">
                            <p>小董快跑</p>
                            <h3>寿阳县滨阳北路新阳上城二期东侧商业15号，欢迎您的光临。做本地最好的服务平台</h3>
                        </div>
                    </div>
                    <div class="item active">
                        <div class="mask">
                            <img src="{{ asset('/img/faces/小董快跑.png') }}">
                        </div>
                        <div class="carousel-testimonial-caption">
                            <p>桐梓县Smar神马跑腿</p>
                            <h3>桐梓县本地生活服务平台，这里有鲜花、蛋糕、餐饮小吃；只要您动动手指，美味立即送到。</h3>
                        </div>
                    </div>
                    <div class="item">
                        <div class="mask">
                            <img src="{{ asset('/img/faces/每时每刻.png') }}">
                        </div>
                        <div class="carousel-testimonial-caption">
                            <p>每时每刻外卖配送中心</p>
                            <h3>三亚首家同城配送微订单平台，提供三亚同城代配送服务，代驾服务。
                                每时每刻让您的生活更简单！</h3>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators carousel-indicators-orange">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="section section-no-padding">
        <div class="parallax filter-gradient orange" data-color="orange">
            <div class="parallax-background">
                <img class="parallax-background-image flipped" src="{{ asset('/img/showcases/showcase-1/bg2.jpg') }}">
            </div>
            <div class="info">
                <h1>美味宝 -- 值得创业者信赖的合作伙伴</h1>
                <p>美味宝已服务25687家餐厅，并高速增长中......</p>
                <a href="" class="btn btn-neutral btn-lg btn-fill">立即开通</a>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            首页
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            产品中心
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            经典案例
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            帮助中心
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="social-area pull-right">
                <a class="btn btn-social btn-facebook btn-simple">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a class="btn btn-social btn-twitter btn-simple">
                    <i class="fa fa-twitter"></i>
                </a>
                <a class="btn btn-social btn-pinterest btn-simple">
                    <i class="fa fa-pinterest"></i>
                </a>
            </div>
            <div class="copyright">
                &copy; 2016 <a href="#">Scott Wang</a>, made with love.
            </div>
        </div>
    </footer>
</div>

</body>
<script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('/js/home/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>
<script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/home/awesome-landing-page.js') }}" type="text/javascript"></script>
</html>
