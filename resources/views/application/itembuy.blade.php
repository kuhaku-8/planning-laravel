@extends('layout.master')

@section('title')
    Barang Akan Dibeli
@endsection

@section('menu')

@endsection

@section('header content')
<section class="content-header">
        <h1>
            Barang
            <small>yang akan dibeli</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
            <li class="active">Barang Akan Dibeli</li>
        </ol>
</section>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Barang</h3>
                </div>
                <div class="box-body">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah">
                        <i class="fa fa-cart-plus"></i> &nbspTambah
                    </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        {{ csrf_field() }}
                        </thead>
                        <tbody>
                        @foreach ($itembuy as $tampil)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$tampil->nama}}</td>
                                <td>{{$tampil->qty}}</td>
                                <td>
                                    <table width="90">
                                        <tr>
                                            <td>Rp</td>
                                            <td align="right">{{number_format($tampil->harga,0,',','.')}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table width="90">
                                        <tr>
                                            <td>Rp</td>
                                            <td align="right">{{number_format($tampil->harga*$tampil->qty,0,',','.')}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    @if(($tampil->harga*$tampil->qty)<Auth::user()->saldo_tunai)
                                        <b>Dapat Dibeli!</b>
                                    @else
                                        Saldo Kurang Rp {{number_format(($tampil->harga*$tampil->qty)-Auth::user()->saldo_tunai,0,',','.')}}
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="./buy_update.php?id={{$tampil->id}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> &nbspUbah</a>
                                        <a href="./buy_delete.php?id={{$tampil->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus No. <?php echo "$no" ?>?')"><i class="fa fa-trash"></i> &nbspHapus</a>
                                        <a href="./buy_move.php?id={{$tampil->id}}" class="btn btn-success btn-sm" onclick="return confirm('Yakin No. <?php echo "$no" ?> Sudah Dibeli?')"><i class="fa fa-share"></i> &nbspSudah Dibeli</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection