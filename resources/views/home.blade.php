@extends('layout.master')

@section('title')
    Home
@endsection

@section('menu')

@endsection

@section('header content')
    <section class="content-header">
        <h1>
            Informasi
            <small>Terkini</small>
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-home"></i>Home</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Rp {{number_format(Auth::user()->cash+Auth::user()->atm+(floor(Auth::user()->paypal)*Auth::user()->conversion),0,',','.')}}</h3>
                    <p>Total Dimiliki</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="/financial" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Keuntungan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/profit" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$owe}}</h3>
                    <p>Orang Yang Berhutang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people"></i>
                </div>
                <a href="/financial-owe" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$debt}}</h3>
                    <p>Hutang Kepada Orang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="/financial-debt" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- Default box -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Barang <small>Akan Dibeli</small></h3>
                </div>
                <div class="box-body no-padding">
                    <!-- Main content -->
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="25">No</th>
                            <th>Nama</th>
                            <th width="25">Qty</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align="center">{{$nobuy++}}</td>
                                <td>{{$itembuy->name}}</td>
                                <td align="center">{{$itembuy->qty}}</td>
                                <td>
                                    <table width="90">
                                        <tr>
                                            <td>Rp</td>
                                            <td align="right">{{number_format($itembuy->price,0,',','.')}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table width="90">
                                        <tr>
                                            <td>Rp</td>
                                            <td align="right">{{number_format($itembuy->price*$itembuy->qty,0,',','.')}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer" align="center">
                    <a href="/item-buy" class="btn btn-info"><i class="fa fa-search"> Selengkapnya</i></a>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-lg-6">
            <!-- Default box -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Barang <small>Baru Dibeli</small></h3>
                </div>
                <div class="box-body no-padding">
                    <!-- Main content -->
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="25">No</th>
                            <th>Nama</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($nohistory<2)
                            <tr>
                                <td align="center">{{$nohistory++}}</td>
                                <td>{{$itemhistory->name}}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer" align="center">
                    <a href="/item-history" class="btn btn-success"><i class="fa fa-search"> Selengkapnya</i></a>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection