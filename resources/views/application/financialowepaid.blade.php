@extends('layout.master')

@section('title')
    Daftar Yang Sudah Lunas Berhutang
@endsection

@section('header')

@endsection

@section('menu')

@endsection

@section('header content')
    <section class="content-header">
        <h1>
            Daftar
            <small>Yang Sudah Lunas Berhutang</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="#">Daftar Yang Berhutang</a></li>
            <li class="active">Sudah Lunas</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Yang Sudah Lunas Berhutang</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="financialowepaid" class="table table-bordered table-striped">
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
                        @foreach ($financialowepaids as $financialowepaid)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$financialowepaid->name}}</td>
                                <td>{{$financialowepaid->status}}</td>
                                <td>{{$financialowepaid->date}}</td>
                                <td>{{$financialowepaid->date_paid}}</td>
                                <td>
                                    <table width="90">
                                        <tr>
                                            <td>Rp</td>
                                            <td align="right">{{number_format($financialowepaid->total,0,',','.')}}</td>
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