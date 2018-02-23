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
        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Keuangan</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-cash"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Uang Cash</span>
                                    <span class="info-box-number">Rp {{number_format(Auth::user()->saldo_tunai,0,',','.')}}</span>
                                    {{--<span class="info-box-more">Tambah Kurangi</span>--}}
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- /.info-box -->
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-paypal"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Uang Paypal</span>
                                    <span class="info-box-number">USD {{Auth::user()->saldo_paypal}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-card"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Uang ATM</span>
                                    <span class="info-box-number">Rp {{number_format(Auth::user()->saldo_atm,0,',','.')}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-md-6">
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
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
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
                    value    : {{$totaldebt}},
                    color    : '#f56954',
                    highlight: '#f56954',
                    label    : 'Hutang '
                },
                {
                    value    : {{Auth::user()->saldo_tunai}},
                    color    : '#00a65a',
                    highlight: '#00a65a',
                    label    : 'Saldo Tunai '
                },
                {
                    value    : {{$totalowe}},
                    color    : '#00c0ef',
                    highlight: '#00c0ef',
                    label    : 'Yang Berhutang '
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