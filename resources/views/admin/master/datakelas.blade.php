@extends('admin.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Kelas
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambahkelas">
                    Kelas Baru
                </button>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

    {{--modal tambah--}}
    <div class="modal fade" id="modaltambahkelas">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Tambah Data Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="alert alert-success" style="display:none"></div>
                        <div class="form-group">
                            <label>ID Kelas</label>
                            <input type="text" class="form-control" placeholder="ID Kelas" id="txtIdKelas" name="txtIdKelas">
                        </div>
                        <div class="form-group">
                            <label>Nama Kelas</label>
                            <input type="text" class="form-control" placeholder="Nama Kelas" id="txtNamaKelas" name="txtNamaKelas">
                        </div>
                        <button id="btnSimpan" class="btn btn-primary" onclick="insertDataSiswa()">Simpan</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modaleditkelas">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Edit Data Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="alert alert-success" style="display:none"></div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" placeholder="ID Kelas" id="txtOldIdKelas" name="txtOldIdKelas">
                        </div>
                        <div class="form-group">
                            <label>ID Kelas</label>
                            <input type="text" class="form-control" placeholder="ID Kelas" id="txtIdKelasEdit" name="txtIdKelasEdit">
                        </div>
                        <div class="form-group">
                            <label>Nama Kelas</label>
                            <input type="text" class="form-control" placeholder="Nama Kelas" id="txtNamaKelasEdit" name="txtNamaKelasEdit">
                        </div>
                        <button id="btnUpdate" class="btn btn-primary" onclick="updateDataKelas()">Update</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">

    getDataKelas();

    function showDetail(id, nama) {
        $('#txtOldIdKelas').val(id);
        $('#txtIdKelasEdit').val(id);
        $('#txtNamaKelasEdit').val(nama);
        $('#modaleditkelas').modal('show');
    }


    function clearSave() {
        $('#txtIdKelas').val('');
            $('#txtNamaKelas').val('');

    }

    function clearEdit() {
        $('#txtIdKelasEdit').val('');
            $('#txtNamaKelasEdit').val('');

    }

    function updateDataKelas() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{{ route('updateDataKelas') }}',
            dataType: 'JSON',
            data: {
                _token 		    : $('input[name=_token]').val(),
                idKelas 		: $('#txtIdKelasEdit').val(),
                namaKelas   	: $('#txtNamaKelasEdit').val(),
                oldId           : $('#txtOldIdKelas').val()
            },
            success: function(response){
                console.log(response);
                if (response.valid){
                    $('.alert-danger').hide();
                    $('.alert-success').hide();
                    $('.alert-success').show().html('<p> Berhasil merubah Data </p>');
                    clearEdit();
                    getDataKelas();
                }else{
                    $.each(response.errors, function(key, value){
                        $('.alert-danger').show().append('<p>'+value+'</p>');
                    });
                }
            },
            error: function(xhr, textStatus, errorThrown){
                alert(errorThrown, xhr, textStatus);

            }
        });
    }
    
    function insertDataSiswa() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{{ route('insertDataKelas') }}',
            dataType: 'JSON',
            data: {
                _token 		    : $('input[name=_token]').val(),
                idKelas 		: $('#txtIdKelas').val(),
                namaKelas   	: $('#txtNamaKelas').val()
            },
            success: function(response){
                console.log(response);
                if (response.valid){

                    $('.alert-danger').hide();
                    $('.alert-success').hide();
                        $('.alert-success').show().html('<p> Berhasil Menambahkan Data '+response.sukses['idKelas']+'</p>');
                    clearSave();
                        getDataKelas();
                }else{
                    $('.alert-danger').hide();
                    $('.alert-success').hide();
                    $.each(response.errors, function(key, value){
                        $('.alert-danger').show().append('<p>'+value+'</p>');
                    });
                }
            },
            error: function(xhr, textStatus, errorThrown){
                alert(errorThrown);

            }

        });
    }

    function deleteDataKelas(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('deleteDataKelas') }}',
            data: {
                _method: 'DELETE',
                _token: $('input[name=_token]').val(),
                idKelas:id
            },
            success: function (response){
                    console.log(response);
                    getDataKelas();
            },error: function (error) {
                console.log(error);
            }

        });
    }

    function getDataKelas() {
        $('#example2').DataTable({
            destroy     : true,
            lengthMenu: [ [5, 10, 15, -1], [5, 10, 15, "All"] ],
            autowidth   : true,
            serverSide  : true,
            processing  : false,
            ajax        : '{{route('getDataKelas')}}',
            columns     : [
                {data : 'DT_RowIndex', name : 'DT_RowIndex', searchable : false, sortable : false},
                {data :'idKelas', name   : 'idKelas'},
                {data :'namaKelas', name : 'namaKelas'},
                {
                    render: function (data, type, row) {
                        return '<a class="btn-sm btn-warning" href="#" onclick="showDetail(\''+row.idKelas+'\', \''+row.namaKelas+'\');"> Edit <a/> &nbsp' +
                            ' <a class="btn-sm btn-danger" href="#" onclick="javascript:if (confirm(\'Yakin Menghapus Data?\')) deleteDataKelas(\''+row.idKelas+'\')">Delete</a> ';
                    }
                }
            ]

        });
    }
    


</script>
@endsection