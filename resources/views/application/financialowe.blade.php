@extends('layout.master')

@section('title')
    Daftar Yang Berhutang
@endsection

@section('menu')

@endsection

@section('header content')
    <section class="content-header">
        <h1>
            Daftar
            <small>yang berhutang</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="#">Daftar Yang Berhutang</a></li>
            <li class="active">Lihat</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Yang Berhutang</h3>
                </div>
                <div class="box-body">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">
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
                            <th>Belum Lunas</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($financialowe as $tampil)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$tampil->nama_yang_hutang}}</td>
                            <td>{{$tampil->status_yang_hutang}}</td>
                            <td>{{$tampil->tanggal_yang_hutang}}</td>
                            <td>{{$tampil->jumlah_yang_hutang}}</td>
                            <td>{{$tampil->sisa_yang_hutang}}<td>
                                <div class="btn-group">
                                    <a href="./financial_owe_update.php?id={{$tampil->id_yang_hutang}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> &nbspEdit</a>
                                    <a href="./financial_owe_delete.php?id={{$tampil->id_yang_hutang}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus {{$tampil->nama_yang_hutang}}?')"><i class="fa fa-trash"></i> &nbspDelete</a>
                                    <a href="./financial_owe_move.php?id={{$tampil->id_yang_hutang}}" class="btn btn-success btn-sm" onclick="return confirm('Yakin {{$tampil->nama_yang_hutang}} Sudah Lunas?')"><i class="fa fa-share"></i> &nbspMove</a>
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
                            <th>Belum Lunas</th>
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
