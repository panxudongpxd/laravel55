<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>AdminX</title>
     <!-- 文件上传 -->
    <link rel="stylesheet" type="text/css" href="/bootstrapUpload/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="/bootstrapUpload/css/fileinput.css">
    <script type="text/javascript" src='/bootstrapUpload/js/jquery-1.8.3.min.js'></script>
    <script type="text/javascript" src='/bootstrapUpload/js/locales/zh.js'></script>
    <script type="text/javascript" src='/bootstrapUpload/js/fileinput.js'></script>
    <link rel="stylesheet" type="text/css" href="/bootstrapUpload/sass/fileinput.scss">
    <script type="text/javascript" src='/bootstrapUpload/js/bootstrap.min.js'></script>
    <!--icheck-->
    <link href="/static/admin/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="/static/admin/js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="/static/admin/js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="/static/admin/js/iCheck/skins/square/blue.css" rel="stylesheet">

    <!--dashboard calendar-->
    <link href="/static/admin/css/clndr.css" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="js/morris-chart/morris.css">

    <!--common-->
    <link href="/static/admin/css/style.css" rel="stylesheet">
    <link href="/static/admin/css/style-responsive.css" rel="stylesheet">
</head>

<body class="sticky-header">

<section>
    <!-- 左边栏目开始-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index.html"><img src="/static/admin/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="/static/admin/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="\static\admin\login\img" class="media-object">
                    <div class="media-body">
                        <h4><a href="#">John Doe</a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                </ul>
            </div>
    
            
                <!-- 标签管理 -->
                
            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active"><a href="/admin"><i class="fa fa-home"></i> <span>控制台</span></a></li>

                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>用户管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{url('/admin/user')}}">用户列表</a></li>
                        <li><a href="{{url('/admin/user/create')}}">添加用户</a></li>

                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-th-list"></i> <span>文章管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{url('/admin/articles')}}">文章列表</a></li>
                        <li><a href="{{url('/admin/articles/create')}}">文章添加</a></li>

                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-align-left"></i> <span>说说管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{url('/admin/stalk')}}">说说列表</a></li>
                        <li><a href="{{url('/admin/stalk/create')}}">添加说说</a></li>
                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-map-marker"></i> <span>栏目管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{url('/admin/blank')}}">导航栏列表</a></li>
                        <li><a href="{{url('/admin/blank/create')}}">添加导航栏</a></li>

                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-th-list"></i> <span>网站配置管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{url('/admin/config')}}">配置列表</a></li>

                    </ul>
                </li>
                
                <li class="menu-list"><a href=""><i class="fa fa-book"></i> <span>分类管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{url('/admin/cate')}}">分类列表</a></li>
                        <li><a href="{{url('/admin/cate/create')}}">添加顶级类</a></li>
                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-bookmark"></i> <span>标签管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="/admin/taginfo">标签列表</a></li>
                        <li><a href="/admin/taginfo/create">添加标签</a></li>
                    </ul>
                </li>
                
                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>轮播管理</span></a>
                    <ul class="sub-menu-list">
                        
                        <li><a href="{{url('/admin/lunbo')}}">轮播图列表</a></li>
                        <li><a href="{{url('/admin/lunbo/create')}}">轮播添加</a></li>
                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>友链管理</span></a>
                    <ul class="sub-menu-list">
                    <li><a href="{{'/admin/link'}}">友链列表</a></li>
                        <li><a href="{{url('/admin/link/create')}}">友链添加</a></li>
                        

                    </ul>
                </li>
				
				<li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>相册管理</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="{{ url('/admin/photo') }}">相册列表</a></li>
                        <li><a href="{{ url('/admin/photo/create') }}">添加相册</a></li>

                    </ul>
                </li>
				
            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- 左边栏目结束-->
    <!-- 主体内容开始-->
    <div class="main-content" >

        <!-- 标题头开始-->
        <div class="header-section">

            <!--页面样式切换按钮开始-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--页面样式切换按钮结束-->

           

            <!--标题右侧提示开始 -->
            <div class="menu-right">
                <ul class="notification-menu">
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="{{session('myfile')}}" onerror="javascript:this.src='/static/admin/login/img/20180529/15275700941505.jpg';" alt="" />

                            {{session('loginName')}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="{{url('/admin/preson',[session('id')])}}"><i class="fa fa-user"></i>个人中心</a></li>
                            <li><a href="{{url('/admin/preson',[session('id'),'edit'])}}"><i class="fa fa-user"></i>修改密码</a></li>
                            <li><a href="{{url('/admin/login/create')}}"><i class="fa fa-sign-out"></i> 退出</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--标题右侧提示结束 -->
        </div>
        <!-- 标题头结束-->
        <!--右侧继承布局开始-->
        <div class="wrapper">
            @if(session('error'))
                <div class="alert alert-danger" id="b">
                        {{session('error')}}
                </div> 
            @endif
            @if(session('success'))
                <div class="alert alert-success" id="a">
                        {{session('success')}}
                </div> 
            @endif
            @yield('content')
        </div>
        <script type="text/javascript">
            var a=document.getElementById('a');
            a.onclick=function(){
               this.style.display="none";
            }
            var b=document.getElementById('b');
            b.onclick=function(){
               this.style.display="none";
            }
        </script>
        <!--右侧继承布局结束-->

        <!--底部专利号开始-->
        <!-- <footer>
            2018 &copy; Admin by php202
        </footer> -->
        <!--底部专利号结束-->
    </div>
    <!-- 右侧主题结束-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/static/admin/js/jquery-1.10.2.min.js"></script>
<script src="/static/admin/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/static/admin/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
<script src="/static/admin/js/modernizr.min.js"></script>
<script src="/static/admin/js/jquery.nicescroll.js"></script>

<!--easy pie chart-->
<script src="/static/admin/js/easypiechart/jquery.easypiechart.js"></script>
<script src="/static/admin/js/easypiechart/easypiechart-init.js"></script>

<!--Sparkline Chart-->
<script src="/static/admin/js/sparkline/jquery.sparkline.js"></script>
<script src="/static/admin/js/sparkline/sparkline-init.js"></script>

<!--icheck -->
<script src="/static/admin/js/iCheck/jquery.icheck.js"></script>
<script src="/static/admin/js/icheck-init.js"></script>

<!-- jQuery Flot Chart-->
<script src="/static/admin/js/flot-chart/jquery.flot.js"></script>
<script src="/static/admin/js/flot-chart/jquery.flot.tooltip.js"></script>
<script src="/static/admin/js/flot-chart/jquery.flot.resize.js"></script>


<!--Morris Chart-->
<script src="/static/admin/js/morris-chart/morris.js"></script>
<script src="/static/admin/js/morris-chart/raphael-min.js"></script>

<!--Calendar-->
<script src="/static/admin/js/calendar/clndr.js"></script>
<script src="/static/admin/js/calendar/evnt.calendar.init.js"></script>
<script src="/static/admin/js/calendar/moment-2.2.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>

<!--common scripts for all pages-->
<script src="/static/admin/js/scripts.js"></script>

<!--Dashboard Charts-->
<script src="/static/admin/js/dashboard-chart-init.js"></script>


</body>
</html>