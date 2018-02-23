<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/dashboard/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/dashboard/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/dashboard/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/dashboard/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/dashboard/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    {{--<!-- iCheck for checkboxes and radio inputs -->--}}
    {{--<link rel="stylesheet" href="/plugins/iCheck/all.css">--}}
    {{--<!-- Bootstrap Color Picker -->--}}
    {{--<link rel="stylesheet" href="/dashboard/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">--}}
    {{--<!-- Bootstrap time Picker -->--}}
    {{--<link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">--}}
    {{--<!-- Select2 -->--}}
    {{--<link rel="stylesheet" href="/dashboard/select2/dist/css/select2.min.css">--}}
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link href='/pictures/ico.png' rel='icon' type='image/x-icon'/>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
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
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
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
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
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
                <li class="treeview">
                    <a href="#"><i class="fa fa-users"></i><span>Daftar Yang Berhutang</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/financial-owe"><i class="fa fa-th-list"></i> Lihat</a></li>
                        <li><a href="#"><i class="fa fa-check"></i> Sudah Lunas</a></li>
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
                        <li><a href="#"><i class="fa fa-check"></i> Sudah Lunas</a></li>
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
    {{--<!-- Select2 -->--}}
    {{--<script src="/dashboard/select2/dist/js/select2.full.min.js"></script>--}}
    <!-- InputMask -->
    <script src="/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    {{--<!-- date-range-picker -->--}}
    {{--<script src="/dashboard/moment/min/moment.min.js"></script>--}}
    {{--<script src="/dashboard/bootstrap-daterangepicker/daterangepicker.js"></script>--}}
    <!-- bootstrap datepicker -->
    <script src="/dashboard/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    {{--<!-- bootstrap color picker -->--}}
    {{--<script src="/dashboard/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>--}}
    {{--<!-- bootstrap time picker -->--}}
    {{--<script src="/plugins/timepicker/bootstrap-timepicker.min.js"></script>--}}
    {{--<!-- iCheck 1.0.1 -->--}}
    {{--<script src="/plugins/iCheck/icheck.min.js"></script>--}}
    <!-- DataTables -->
    <script src="/dashboard/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/dashboard/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/dashboard/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/dashboard/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
    <!-- Page script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            // $('.select2').select2()
            //
            // //Datemask dd/mm/yyyy
            // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            // //Datemask2 mm/dd/yyyy
            // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            // //Money Euro
            // $('[data-mask]').inputmask()
            //
            // //Date range picker
            // $('#reservation').daterangepicker()
            // //Date range picker with time picker
            // $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
            // //Date range as a button
            // $('#daterange-btn').daterangepicker(
            //     {
            //         ranges   : {
            //             'Today'       : [moment(), moment()],
            //             'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            //             'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            //             'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            //             'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            //             'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            //         },
            //         startDate: moment().subtract(29, 'days'),
            //         endDate  : moment()
            //     },
            //     function (start, end) {
            //         $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            //     }
            // )

            //Date picker
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
            })

            // //iCheck for checkbox and radio inputs
            // $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            //     checkboxClass: 'icheckbox_minimal-blue',
            //     radioClass   : 'iradio_minimal-blue'
            // })
            // //Red color scheme for iCheck
            // $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            //     checkboxClass: 'icheckbox_minimal-red',
            //     radioClass   : 'iradio_minimal-red'
            // })
            // //Flat red color scheme for iCheck
            // $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            //     checkboxClass: 'icheckbox_flat-green',
            //     radioClass   : 'iradio_flat-green'
            // })
            //
            // //Colorpicker
            // $('.my-colorpicker1').colorpicker()
            // //color picker with addon
            // $('.my-colorpicker2').colorpicker()
            //
            // //Timepicker
            // $('.timepicker').timepicker({
            //     showInputs: false

        })
    </script>
    @yield('footer')
</body>
</html>
