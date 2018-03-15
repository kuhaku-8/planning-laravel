@extends('layout.master')

@section('title')
    Daftar Yang Berhutang
@endsection

@section('header')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/dashboard/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/other/toastr.min.css">
    <link rel="stylesheet" href="/other/numbering.css">
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
                    <button type="button" class="add-modal btn btn-info" data-toggle="modal">
                        <i class="fa fa-user-plus"></i> &nbspTambah
                    </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="financialowe" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="25">No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal (Y-M-D)</th>
                            <th>Jumlah</th>
                            <th>Belum Lunas</th>
                            <th width="300">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($financialowes as $financialowe)
                        <tr>
                            <td align="center" class="no"></td>
                            <td>{{$financialowe->name}}</td>
                            <td>{{$financialowe->status}}</td>
                            <td>{{$financialowe->date}}</td>
                            <td>
                                <table width="90">
                                    <tr>
                                        <td>Rp</td>
                                        <td align="right">{{number_format($financialowe->total,0,',','.')}}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table width="90">
                                    <tr>
                                        <td>Rp</td>
                                        <td align="right">{{number_format($financialowe->balance,0,',','.')}}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="edit-modal btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Ubah
                                    </button>
                                    <button class="delete-modal btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                    <button class="paid-modal btn btn-info btn-sm">
                                        <i class="fa fa-bookmark"></i> Cicil
                                    </button>
                                    <button class="move-modal btn btn-success btn-sm">
                                        <i class="fa fa-share"></i> Sudah Lunas
                                    </button>
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

@section('footer')
    <!-- bootstrap datepicker -->
    <script src="/dashboard/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/other/toastr.min.js"></script>
    <script>
        $(function () {
            //Date picker
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
            })
        })
    </script>
@endsection