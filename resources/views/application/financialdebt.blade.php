@extends('layout.master')

@section('title')
    Daftar Hutang
@endsection

@section('menu')

@endsection

@section('header content')
    <section class="content-header">
        <h1>
            Daftar
            <small>Hutang</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="#">Daftar Hutang</a></li>
            <li class="active">Lihat</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Hutang</h3>
                </div>
                <div class="box-body">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tambah">
                        <i class="fa fa-user-plus"></i> &nbspTambah
                    </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal (Y-M-D)</th>
                            <th>Jumlah</th>
                            <th>Lunas</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($financialdebt as $tampil)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$tampil->nama_berhutang}}</td>
                            <td>{{$tampil->status_berhutang}}</td>
                            <td>{{$tampil->tanggal_berhutang}}</td>
                            <td>
                                {{$tampil->jumlah_berhutang}}
                            </td>
                            <td>
                                {{$tampil->sisa_berhutang}}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="./financial_debt_update.php?id={{$tampil->id_berhutang}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> &nbspUbah</a>
                                    <a href="./financial_debt_delete.php?id={{$tampil->id_berhutang}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus {{$tampil->nama_berhutang}}?')"><i class="fa fa-trash"></i> &nbspHapus</a>
                                    <a href="./financial_debt_pay.php?id={{$tampil->id_berhutang}}" class="btn btn-info btn-sm"><i class="fa fa-bookmark"></i> &nbspCicil</a>
                                    <a href="./financial_debt_move.php?id={{$tampil->id_berhutang}}" class="btn btn-success btn-sm" onclick="return confirm('Yakin {{$tampil->nama_berhutang}} Sudah Lunas?')"><i class="fa fa-share"></i> &nbspSudah Lunas</a>
                                </div>
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
                            <th>Jumlah</th>
                            <th>Aksi</th>
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
