@extends('layout.master')

@section('title')
    Daftar Hutang
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
                    <button type="button" class="add-modal btn btn-danger" data-toggle="modal">
                        <i class="fa fa-user-plus"></i> &nbspTambah
                    </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="financialdebt" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="25">No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Tanggal (Y-M-D)</th>
                            <th>Jumlah</th>
                            <th>Lunas</th>
                            <th width="300">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($financialdebts as $financialdebt)
                        <tr>
                            <td align="center" class="no"></td>
                            <td>{{$financialdebt->name}}</td>
                            <td>{{$financialdebt->status}}</td>
                            <td>{{$financialdebt->date}}</td>
                            <td>
                                <table width="90">
                                    <tr>
                                        <td>Rp</td>
                                        <td align="right">{{number_format($financialdebt->total,0,',','.')}}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table width="90">
                                    <tr>
                                        <td>Rp</td>
                                        <td align="right">{{number_format($financialdebt->balance,0,',','.')}}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="edit-modal btn btn-warning btn-sm" data-id="{{$financialdebt->id}}" data-name="{{$financialdebt->name}}" data-status="{{$financialdebt->status}}"  data-date="{{$financialdebt->date}}" data-total="{{$financialdebt->total}}" data-balance="{{$financialdebt->balance}}">
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
    <div id="addModal" class="modal modal-info fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-cart-plus"></i> Tambahkan Barang</h4>
                </div>
                <form role="form" action="#" method="post" id="addform">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Barang</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-inbox"></i>
                                </div>
                                <input type="text" class="form-control" id="name_add" autocomplete="off" autofocus>
                            </div>
                            <p class="errorname text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga Barang</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <input type="number" class="form-control" id="price_add" autocomplete="off">
                            </div>
                            <p class="errorprice text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-group">
                            <label for="qty">Jumlah Barang</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </div>
                                <input type="number" class="form-control" id="qty_add" value="1" autocomplete="off">
                            </div>
                            <p class="errorqty text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline pull-left" value="Reset">
                        <input type="submit" class="btn btn-outline add" data-dismiss="modal" value="Tambah">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div id="editModal" class="modal modal-warning fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Ubah Hutang</h4>
                </div>
                <form role="form" action="#" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-inbox"></i>
                                </div>
                                <input type="hidden" id="id_edit" disabled>
                                <input type="text" class="form-control" id="name_edit" autocomplete="off" autofocus>
                            </div>
                            <p class="errorname text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-group">
                            <label for="price">Status</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <input type="text" class="form-control" id="status_edit" autocomplete="off">
                            </div>
                            <p class="errorstatus text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-group">
                            <label for="price">Tanggal (Y-M-D)</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <input type="date" class="form-control" id="date_edit" autocomplete="off">
                            </div>
                            <p class="errordate text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-group">
                            <label for="price">Total</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <input type="number" class="form-control" id="total_edit" autocomplete="off">
                            </div>
                            <p class="errortotal text-center alert alert-danger hidden"></p>
                        </div>
                        <div class="form-group">
                            <label for="qty">Lunas</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </div>
                                <input type="number" class="form-control" id="balance_edit" autocomplete="off">
                            </div>
                            <p class="errorbalance text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <input type="button" class="btn btn-outline pull-left" data-dismiss="modal" value="Batal">
                        <input type="submit" class="btn btn-outline edit" data-dismiss="modal" value="Ubah">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div id="deleteModal" class="modal modal-danger fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-trash"></i> Hapus Barang</h4>
                </div>
                <form role="form" action="#" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <h4 class="text-center">Apakah Anda Yakin Ingin Menghapus Barang Ini?</h4>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Barang</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-inbox"></i>
                                </div>
                                <input type="hidden" id="id_delete" disabled>
                                <input type="text" class="form-control" id="name_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Harga Barang</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <input type="number" class="form-control" id="price_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Jumlah Barang</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </div>
                                <input type="number" class="form-control" id="qty_delete" disabled>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <input type="button" class="btn btn-outline pull-left" data-dismiss="modal" value="Batal">
                        <input type="submit" class="btn btn-outline delete" data-dismiss="modal" value="Hapus">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div id="moveModal" class="modal modal-success fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-share"></i> Sudah Dibeli</h4>
                </div>
                <form role="form" action="#" method="post" id="moveform">
                    <div class="modal-body">
                        <div class="form-group">
                            <h4 class="text-center">Apakah Anda Yakin Sudah Membeli Barang Ini?</h4>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Barang</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-inbox"></i>
                                </div>
                                <input type="hidden" id="iduser"  disabled>
                                <input type="hidden" id="id-move" disabled>
                                <input type="text" class="form-control" id="name_move" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Harga Barang</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <input type="number" class="form-control" id="price_move" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Jumlah Barang</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </div>
                                <input type="number" class="form-control" id="qty_move" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Saldo</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <select class="form-control" id="via_move" required>
                                    <option value="tunai">Tunai</option>
                                    <option value="atm">ATM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <input type="button" class="btn btn-outline pull-left" data-dismiss="modal" value="Batal">
                        <input type="submit" class="btn btn-outline move" data-dismiss="modal" value="Sudah Dibeli">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        // Add
        $(document).on('click', '.add-modal', function() {
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'item-buy',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('#name_add').val(),
                    'price': $('#price_add').val(),
                    'qty': $('#qty_add').val()
                },
                success: function(data) {
                    $('.errorname').addClass('hidden');
                    $('.errorprice').addClass('hidden');
                    $('.errorqty').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Data Masukkan Salah!', 'Gagal Menambahkan Data!', {timeOut: 5000});
                        }, 500);

                        if (data.errors.name) {
                            $('.errorname').removeClass('hidden');
                            $('.errorname').text(data.errors.name);
                        }
                        if (data.errors.price) {
                            $('.errorprice').removeClass('hidden');
                            $('.errorprice').text(data.errors.price);
                        }
                        if (data.errors.qty) {
                            $('.errorqty').removeClass('hidden');
                            $('.errorqty').text(data.errors.qty);
                        }
                    } else {
                        toastr.success('Barang Ditambahkan!', 'Berhasil!', {timeOut: 5000});
                        $('#itembuy').append("<tr class='item-" + data.id + "'><td align='center' class='no'></td><td>" + data.name + "</td><td align='center'>" + data.qty + "</td><td><table width='90'><tr><td>Rp</td><td align='right'>" + data.price + "</td></tr></table></td><td><table width='90'><tr><td>Rp</td><td align='right'>" + data.price*data.qty + "</td></tr></table></td><td><script>document.getElementById('st-" + data.id + "').innerHTML = status(" + data.price*data.qty + ",{{Auth::user()->cash+Auth::user()->atm}});</\script><p id='st-" + data.id + "'></p></td><td><div class='btn-group'><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-price='" + data.price + "' data-qty='" + data.qty + "'><i class='fa fa-edit'></i> Ubah</button><button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-price='" + data.price + "' data-qty='" + data.qty + "'><i class='fa fa-trash'></i> Hapus</button><button class='move-modal btn btn-success btn-sm' disabled><i class='fa fa-share'></i> Sudah Dibeli</button></div></td></tr>");
                        $("#addform")[0].reset();
                    }
                },
            });
        });

        // Move
        $(document).on('click', '.move-modal', function() {
            $("#moveform")[0].reset();
            $('#iduser').val($(this).data('iduser'));
            $('#id-move').val($(this).data('id'));
            $('#name_move').val($(this).data('name'));
            $('#price_move').val($(this).data('price'));
            $('#qty_move').val($(this).data('qty'));
            id = $('#id-move').val();
            $('#moveModal').modal('show');
        });
        $('.modal-footer').on('click', '.move', function() {
            $.ajax({
                type: 'PUT',
                url: 'item-buy-move/'+ id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'iduser': $("#iduser").val(),
                    'id': $("#id-move").val(),
                    'name': $('#name_move').val(),
                    'price': $('#price_move').val(),
                    'qty': $('#qty_move').val(),
                    'via': $('#via_move').val(),
                    'vendor': "-",
                    'official_web': "-"
                },
                success: function(data) {
                    toastr.success('Barang Sudah Dibeli!', 'Berhasil!', {timeOut: 5000});
                    $('.item-' + data['id']).remove();
                }
            });
        });


        // Edit
        $(document).on('click', '.edit-modal', function() {
            $('#id_edit').val($(this).data('id'));
            $('#name_edit').val($(this).data('name'));
            $('#status_edit').val($(this).data('status'));
            $('#date_edit').val($(this).data('date'));
            $('#total_edit').val($(this).data('total'));
            $('#balance_edit').val($(this).data('balance'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'financial-debt/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'name': $('#name_edit').val(),
                    'status': $('#status_edit').val(),
                    'date': $('#date_edit').val(),
                    'total': $('#total_edit').val(),
                    'balance': $('#balance_edit').val()
                },
                success: function(data) {
                    $('.errorname').addClass('hidden');
                    $('.errorprice').addClass('hidden');
                    $('.errorqty').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Data Masukkan Salah!', 'Gagal Mengubah Data!', {timeOut: 5000});
                        }, 500);

                        if (data.errors.name) {
                            $('.errorname').removeClass('hidden');
                            $('.errorname').text(data.errors.name);
                        }
                        if (data.errors.price) {
                            $('.errorprice').removeClass('hidden');
                            $('.errorprice').text(data.errors.price);
                        }
                        if (data.errors.qty) {
                            $('.errorqty').removeClass('hidden');
                            $('.errorqty').text(data.errors.qty);
                        }
                    } else {
                        toastr.success('User Diubah!', 'Berhasil!', {timeOut: 5000});
                        $('.item-' + data.id).replaceWith("<tr class='item-" + data.id + "'><td align='center' class='no'></td><td>" + data.name + "</td><td align='center'>" + data.qty + "</td><td><table width='90'><tr><td>Rp</td><td align='right'>" + data.price + "</td></tr></table></td><td><table width='90'><tr><td>Rp</td><td align='right'>" + data.price*data.qty + "</td></tr></table><td><script>document.getElementById('st-" + data.id + "').innerHTML = status(" + data.price*data.qty + ",{{Auth::user()->cash+Auth::user()->atm}});</\script><p id='st-" + data.id + "'></p></td><td><div class='btn-group'><button class='edit-modal btn btn-warning btn-sm' data-num='" + data.no +"' data-id='" + data.id + "' data-name='" + data.name + "' data-price='" + data.price + "' data-qty='" + data.qty + "'><i class='fa fa-edit'></i> Ubah</button><button class='delete-modal btn btn-danger btn-sm' data-no='" + data.no +"' data-id='" + data.id + "' data-name='" + data.name + "' data-price='" + data.price + "' data-qty='" + data.qty + "'><i class='fa fa-trash'></i> Hapus</button><button class='move-modal btn btn-success btn-sm' disabled><i class='fa fa-share'></i> Sudah Dibeli</button></div></td></tr>");
                    }
                }
            });
        });

        // Delete
        $(document).on('click', '.delete-modal', function() {
            $('#id_delete').val($(this).data('id'));
            $('#name_delete').val($(this).data('name'));
            $('#price_delete').val($(this).data('price'));
            $('#qty_delete').val($(this).data('qty'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'item-buy/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Barang Dihapus!', 'Berhasil!', {timeOut: 5000});
                    $('.item-' + data['id']).remove();
                }
            });
        });
    </script>
@endsection