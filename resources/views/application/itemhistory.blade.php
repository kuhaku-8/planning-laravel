@extends('layout.master')

@section('title')
    Barang Telah Dibeli
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
                        @foreach ($itemhistorys as $itemhistory)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$itemhistory->name}}</td>
                                <td>{{$itemhistory->qty}}</td>
                                <td>
                                    <table width="90">
                                        <tr>
                                            <td>Rp</td>
                                            <td align="right">{{$itemhistory->price}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table width="90">
                                        <tr>
                                            <td>Rp</td>
                                            <td align="right">{{$itemhistory->price*$itemhistory->qty}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td><a href="./history_more.php?id={{$itemhistory->id}}" class="btn btn-info btn-sm"><i class="fa fa-search"></i> &nbspSelengkapnya</a></td>
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
