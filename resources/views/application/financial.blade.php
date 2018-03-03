@extends('layout.master')

@section('title')
    Keuangan
@endsection

@section('menu')

@endsection

@section('header content')
    <section class="content-header">
        <h1>
            Keuangan
            <small>dimiliki</small>
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-home"></i>Home</a></li>
            <li class="active">Dimiliki</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-cash"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Uang Cash</span>
                    <span class="info-box-number">Rp {{number_format(Auth::user()->cash,0,',','.')}}</span>
                    {{--<span class="info-box-more">Tambah Kurangi</span>--}}
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- /.info-box -->
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-paypal"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Uang Paypal</span>
                    <span class="info-box-number">USD {{Auth::user()->paypal}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-card"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Uang ATM</span>
                    <span class="info-box-number">Rp {{number_format(Auth::user()->atm,0,',','.')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <!-- /.info-box -->
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-android-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Habis</span>
                    <span class="info-box-number">Rp {{number_format($totalhave,0,',','.')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    <div class="row">
        <section class="col-lg-8 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#table-sell" data-toggle="tab">Area</a></li>
                    <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                    <li class="pull-left header"><i class="fa fa-inbox"></i> Penjualan</li>
                </ul>
                <div class="tab-content no-padding">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="#table-sell" style="position: relative; height: 300px;"></div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                </div>
            </div>
        </section>
        <section class="col-lg-4 connectedSortable">
            <!-- DONUT CHART -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Keuangan</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div>
                            <div class="chart-responsive">
                                <canvas id="pieChart" height="250"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">Saldo Dimiliki <span class="pull-right text-aqua"> Rp {{number_format(Auth::user()->cash+Auth::user()->atm+(floor(Auth::user()->paypal)*Auth::user()->conversion),0,',','.')}}</span></a></li>
                        <li><a href="#">Yang Hutang <span class="pull-right text-yellow"><i class="fa fa-angle-up"></i> Rp {{number_format($totalowe,0,',','.')}}</span></a></li>
                        <li><a href="#">Hutang <span class="pull-right text-red"><i class="fa fa-angle-down"></i> Rp {{number_format($totaldebt,0,',','.')}}</span></a></li>
                    </ul>
                </div>
                <!-- /.footer -->
            </div>
            <!-- /.box -->
        </section>
    </div>
@endsection

@section('footer')
    <!-- ChartJS -->
    <script src="/dashboard/chart.js/Chart.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieChart       = new Chart(pieChartCanvas)
            var PieData        = [
                {
                    value    : {{Auth::user()->cash+Auth::user()->atm+(floor(Auth::user()->paypal)*Auth::user()->conversion)}},
                    color    : '#00c0ef',
                    highlight: '#00c0ef',
                    label    : 'Saldo Dimiliki '
                },
                // {
                //     value    : ,
                //     color    : '#00a65a',
                //     highlight: '#00a65a',
                //     label    : 'Keuntungan '
                // },
                {
                    value    : {{$totalowe}},
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'Yang Berhutang '
                },
                {
                    value    : {{$totaldebt}},
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Hutang '
                }
            ]
            var pieOptions     = {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke    : true,
                //String - The colour of each segment stroke
                segmentStrokeColor   : '#fff',
                //Number - The width of each segment stroke
                segmentStrokeWidth   : 5,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps       : 100,
                //String - Animation easing effect
                animationEasing      : 'easeOutBounce',
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate        : true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale         : false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive           : true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio  : true
            }
            pieChart.Doughnut(PieData, pieOptions)
        })
    </script>
@endsection