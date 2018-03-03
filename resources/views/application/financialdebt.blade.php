@extends('layout.master')

@section('title')
    Daftar Hutang
@endsection

@section('header')
    <!-- DataTables -->
    <link rel="stylesheet" href="/dashboard/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/dashboard/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
                        @foreach ($financialdebts as $financialdebt)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$financialdebt->name}}</td>
                            <td>{{$financialdebt->status}}</td>
                            <td>{{$financialdebt->date}}</td>
                            <td>
                                {{$financialdebt->total}}
                            </td>
                            <td>
                                {{$financialdebt->balance}}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="./financial_debt_update.php?id={{$financialdebt->id}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> &nbspUbah</a>
                                    <a href="./financial_debt_delete.php?id={{$financialdebt->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus {{$financialdebt->name}}?')"><i class="fa fa-trash"></i> &nbspHapus</a>
                                    <a href="./financial_debt_pay.php?id={{$financialdebt->id}}" class="btn btn-info btn-sm"><i class="fa fa-bookmark"></i> &nbspCicil</a>
                                    <a href="./financial_debt_move.php?id={{$financialdebt->id}}" class="btn btn-success btn-sm" onclick="return confirm('Yakin {{$financialdebt->name}} Sudah Lunas?')"><i class="fa fa-share"></i> &nbspSudah Lunas</a>
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

@section('footer')
    <!-- bootstrap datepicker -->
    <script src="/dashboard/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- DataTables -->
    <script src="/dashboard/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/dashboard/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- InputMask -->
    <script src="/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
    <!-- Page script -->
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