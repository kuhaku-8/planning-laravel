@extends('layout.master')

@section('title')
    Barang Telah Dibeli
@endsection

@section('menu')

@endsection

@section('header content')
    <section class="content-header">
        <h1>
            Barang
            <small>yang sudah dibeli</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="./home.php"><i class="fa fa-home"></i>Home</a></li>
            <li class="active">Barang Sudah Dibeli</li>
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
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($itemhistory as $tampil)
    <tr>
      <td>{{$no++}}</td>
      <td>{{$tampil->nama}}</td>
      <td>{{$tampil->qty}}</td>
      <td>
        <table width="90">
          <tr>
            <td>Rp</td>
            <td align="right">{{$tampil->harga}}</td>
          </tr>
        </table>
      </td>
      <td>
        <table width="90">
          <tr>
            <td>Rp</td>
            <td align="right">{{$tampil->harga*$tampil->qty}}</td>
          </tr>
        </table>
      </td>
      <td><a href="./history_more.php?id={{$tampil->id}}" class="btn btn-info btn-sm"><i class="fa fa-search"></i> &nbspSelengkapnya</a></td>
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
      <th>Aksi</th>
    </tr>
  </tfoot>
</table>
</div>
</div>
</div>
</div>
@endsection
