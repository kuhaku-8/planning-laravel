@extends('layout.master')

@section('title')
    Daftar Hutang Yang Sudah Lunas
@endsection

@section('header')

@endsection

@section('menu')

@endsection

@section('header content')
    <section class="content-header">
        <h1>
            Daftar
            <small>Hutang Yang Sudah Lunas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="#">Daftar Hutang</a></li>
            <li class="active">Sudah Lunas</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Hutang Yang Sudah Lunas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="financialdebtpaid" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="25">No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal (Y-M-D)</th>
                            <th>Tanggal Lunas (Y-M-D)</th>
                            <th>Jumlah</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($financialdebtpaids as $financialdebtpaid)
                            <tr>
                                <td align="center">{{$no++}}</td>
                                <td>{{$financialdebtpaid->name}}</td>
                                <td>{{$financialdebtpaid->status}}</td>
                                <td>{{$financialdebtpaid->date}}</td>
                                <td>{{$financialdebtpaid->date_paid}}</td>
                                <td>
                                    <table width="90">
                                        <tr>
                                            <td>Rp</td>
                                            <td align="right">{{number_format($financialdebtpaid->total,0,',','.')}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal (Y-M-D)</th>
                            <th>Tanggal Lunas (Y-M-D)</th>
                            <th>Jumlah</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('footer')

@endsection