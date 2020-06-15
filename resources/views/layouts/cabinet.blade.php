<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Админка каталога запчастей</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('/css/admin.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('admin.home')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">
                     <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->name}}
                                    <small><?php date('Y')  ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                          <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar users panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="{{route('admin.home')}}">
                        <i class="fa fa-dashboard"></i> <span>Главная</span>
                    </a>
                </li>
                <li><a href="{{route('admin.users.index')}}"><i class="fa fa-users" aria-hidden="true"></i> <span>Пользователи</span></a></li>
                <li><a href="{{route('admin.excel.index')}}"><i class="fa fa-upload" aria-hidden="true"></i> <span>Загрузчик</span></a></li>
                <li><a href="{{route('admin.uploader.index')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i><span>Прайс</span></a></li>
                <li><a href="{{route('admin.products.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Товары</span></a></li>
                <li><a href="{{route('admin.category.index')}}"><i class="fa fa-list-ul"></i> <span>Категории товаров</span></a></li>
                <li><a href="{{route('admin.seller.index')}}"><i class="fa fa-truck"></i> <span>Производители</span></a></li>
                <li><a href="{{route('admin.main.index')}}"><i class="fa fa-tags"></i> <span>Главные рубрики сайта</span></a></li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->


    <div class="content-wrapper">
        <section class="content">

        @section('breadcrumbs')
            {{Breadcrumbs::render()}}
        @show
    <!-- Content Wrapper. Contains page content -->
        @include('layouts.partials.flash')
            {{--@show--}}
        @yield('content')
        </section>
    </div>


    <!-- /.content-wrapper -->

    <footer class="main-footer">
        {{--@include('layouts.partials.flash')--}}

        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.7
        </div>
        <strong>Copyright &copy; 2019 - <?php if(date('Y') != 2019){echo date('Y');} ?> <a href="http://almsaeedstudio.com/">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
</div>

<script src="{{asset('/js/admin.js')}}"></script>
</body>


</html>
