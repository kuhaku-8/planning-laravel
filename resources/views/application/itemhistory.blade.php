@extends('layout.master')

@section('title')
    Barang Telah Dibeli
@endsection

@section('header')
    <!-- DataTables -->
    <link rel="stylesheet" href="/dashboard/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
                    <table id="itemhistory" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="20">No</th>
                            <th>Nama</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th width="100">Aksi</th>
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
                                            <td align="right">{{number_format($itemhistory->price,0,',','.')}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table width="90">
                                        <tr>
                                            <td>Rp</td>
                                            <td align="right">{{number_format($itemhistory->price*$itemhistory->qty,0,',','.')}}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <button class="show-modal btn btn-info btn-sm" data-id="{{$itemhistory->id}}" data-name="{{$itemhistory->name}}" data-price="Rp {{number_format($itemhistory->price,0,',','.')}}" data-qty="{{$itemhistory->qty}} Buah" data-vendor="@if($itemhistory->vendor=="") Tidak Ada! @else <a href='{{$itemhistory->official_web}}' target='_blank'>{{$itemhistory->vendor}}</a> @endif" data-picture='@if(file_exists("pictures/barang_punya/$itemhistory->id/1.jpg"))<div id="carousel-example-generic-{{$itemhistory->id}}" class="carousel slide" style="margin: 0 auto" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#carousel-example-generic-{{$itemhistory->id}}" data-slide-to="0" class="active"></li><?php $back1=2; $code=1; ?>@while(file_exists("pictures/barang_punya/$itemhistory->id/$back1.jpg"))<li data-target="#carousel-example-generic-{{$itemhistory->id}}" data-slide-to="{{$code++}}" class=""></li><?php $back1++ ?>@endwhile</ol><div class="carousel-inner"><div class="item active"><img src="pictures/barang_punya/{{$itemhistory->id}}/1.jpg"></div><?php $back2=2; ?>@while(file_exists("pictures/barang_punya/$itemhistory->id/$back2.jpg"))<div class="item"><img src="pictures/barang_punya/{{$itemhistory->id}}/{{$back2}}.jpg"></div><?php $back2++ ?>@endwhile</div><a class="left carousel-control" href="#carousel-example-generic-{{$itemhistory->id}}" data-slide="prev"><span class="fa fa-angle-left"></span></a><a class="right carousel-control" href="#carousel-example-generic-{{$itemhistory->id}}" data-slide="next"><span class="fa fa-angle-right"></span></a></div>@else Maaf! Gambar Tidak Tersedia! @endif'>
                                        <i class="fa fa-search"></i> &nbspSelengkapnya
                                    </button>
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
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content no-padding">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-search"></i> &nbspSelengkapnya</h4>
                </div>
                <form role="form" action="#" method="post" id="showform">
                    <div class="modal-body no-padding">
                            <!-- Custom Tabs (Pulled to the right) -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#info" data-toggle="tab">Informasi</a></li>
                                    <li><a href="#picture" data-toggle="tab">Gambar</a></li>
                                </ul>
                                <div class="tab-content no-padding">
                                    <div class="tab-pane active" id="info">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>
                                                    Nama
                                                </th>
                                                <th width="150">
                                                    Harga
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td id="name_show"></td>
                                                <td id="price_show"></td>
                                            </tr>
                                            </tbody>
                                            <thead>
                                            <tr>
                                                <th>
                                                    Web Resmi
                                                </th>
                                                <th>
                                                    Qty
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><p id="vendor_show"></p></td>
                                                <td id="qty_show"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="picture">
                                        <p id="picture_show"></p>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <input type="button" class="btn btn-info" data-dismiss="modal" value="Tutup">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- DataTables -->
    <script src="/dashboard/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/dashboard/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#itemhistory').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : false,
                'info'        : true,
                'autoWidth'   : true
            })
        })
    </script>
    <script type="text/javascript">
        $(document).on('click', '.show-modal', function() {
            $('#id-show').html($(this).data('id'));
            $('#name_show').html($(this).data('name'));
            $('#price_show').html($(this).data('price'));
            $('#qty_show').html($(this).data('qty'));
            $('#vendor_show').html($(this).data('vendor'));
            $('#picture_show').html($(this).data('picture'));
            $('#showModal').modal('show');
            $id = $('#id-show').val();
        });
    </script>
@endsection