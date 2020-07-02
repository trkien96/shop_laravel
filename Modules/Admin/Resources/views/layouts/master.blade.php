<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('theme_admin/favicon.ico') }}">
    <link rel="canonical" href="/">
    <title>Admin Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('theme_admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('theme_admin/css/dashboard.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('theme_admin/css/all.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="../oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Laravel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="{{ \Request::route()->getName() == 'admin.home' ? 'active':'' }}">
                    <a href="{{ route('admin.home') }}">Trang Tổng Quan<span class="sr-only">(current)</span></a>
                </li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.category' ? 'active':'' }}"><a
                            href="{{  route('admin.get.list.category') }}">Danh mục</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.product' ? 'active':'' }}"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
                <li class="{{ \Request::route()->getName() == 'admin.get.list.article' ? 'active':'' }}"><a href="{{ route('admin.get.list.article') }}">Bài viết</a></li>
                <li><a href="#">Đơn hàng</a></li>
                <li><a href="#">Thành viên</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('theme_admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('theme_admin/js/bootstrap.min.js') }}"></script>
</body>
</html>