<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/dashboard/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dashboard/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/dashboard/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/other/css.css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('header')
    <link href='/pictures/ico.png' rel='icon' type='image/x-icon'/>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="/" class="logo">
            <span class="logo-mini"><b><i class="fa fa-home"></i></b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b><i class="fa fa-home"></i></b> <small>Home</small></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            {{--<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--</a>--}}

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    {{--<li class="dropdown notifications-menu">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-bell-o"></i>--}}
                            {{--<span class="label label-warning">10</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 10 notifications</li>--}}
                            {{--<li>--}}
                                {{--<!-- inner menu: contains the actual data -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="#">--}}
                                            {{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer"><a href="#">View all</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/pictures/profil/{{Auth::user()->id}}.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->nickname}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/pictures/profil/{{Auth::user()->id}}.jpg" class="img-circle" alt="User Image">
                                <p>
                                    {{Auth::user()->name}}
                                    <small>Admin</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                </div>
                            </li>
                        </ul>
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
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/pictures/profil/{{Auth::user()->id}}.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            @yield('menu')
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">KEUANGAN</li>
                <li><a href="/financial"><i class="fa fa-balance-scale"></i><span>Dimiliki</span></a></li>
                <li><a href="/profit"><i class="fa fa-line-chart"></i><span>Keuntungan Penjualan</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-users"></i><span>Daftar Yang Berhutang</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/financial-owe"><i class="fa fa-th-list"></i> Lihat</a></li>
                        <li><a href="/financial-owe-paid"><i class="fa fa-check"></i> Sudah Lunas</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-users"></i><span>Daftar Hutang</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/financial-debt"><i class="fa fa-th-list"></i> Lihat</a></li>
                        <li><a href="/financial-debt-paid"><i class="fa fa-check"></i> Sudah Lunas</a></li>
                    </ul>
                </li>
                <li class="header">BARANG</li>
                <li>
                    <a href="/item-buy">
                        <i class="fa fa-tasks"></i> <span>Barang Akan Dibeli</span>
                    </a>
                </li>
                <li>
                    <a href="/item-history">
                        <i class="fa fa-check-circle"></i> <span>Barang Sudah Dibeli</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @yield('header content')
    <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2018 <a href="http://kuhaku8.blogspot.com">KuhaKu 8 Studio</a>.</strong> All rights reserved.
    </footer>
    <!-- jQuery 3 -->
    <script src="/dashboard/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/dashboard/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/dashboard/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/dashboard/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    @yield('footer')
</body>
</html>
