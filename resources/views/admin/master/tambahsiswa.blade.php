@extends('admin.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tambah Siswa
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">


        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <a href="{{route('dataSiswa')}}" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i></a>

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
                <div class="alert alert-danger" style="display:none"></div>
                <div class="alert alert-success" style="display:none"></div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>NIS</label>
                                <input type="text" class="form-control" placeholder="Masukan NIS" id="txtNis" name="txtNis">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Siswa" id="txtNamaSiswa" name="txtNamaSiswa">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" id="cmbJenis" name="cmbJenis">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tanggal Lahir:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" name="datepicker">
                                </div>
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." id="txtAlamat" name="txtAlamat"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" id="cmbKelas">
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Nama Ortu</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Ortu / Wali" id="txtWali" name="txtWali">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-lg" onclick="insertSiswa()">Simpan</button>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection

@section('script')

    <script>

        getListkelas();
        function getListkelas() {
            $.get('{{route('getListKelas')}}', function (data) {
                    console.log(data);
                $('#cmbKelas').empty();
                $.each(data, function (index, element) {
                    $('#cmbKelas').append('<option>'+element.idKelas+'</option>')
                });
            });
        }

        function clear() {
                $('#txtNis').val(''),
                $('#txtNamaSiswa').val(''),
                $('#datepicker').val(''),
                $('#txtAlamat').val(''),
                $('#txtWali').val('')
        }
        function insertSiswa() {
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('insertDataSiswa') }}',
                dataType: 'JSON',
                data: {
                    _token 		    : $('input[name=_token]').val(),
                    nis 		    : $('#txtNis').val(),
                    namaSiswa   	: $('#txtNamaSiswa').val(),
                    jenisKelamin   	: $('#cmbJenis').val(),
                    tanggalLahir   	: $('#datepicker').val(),
                    alamat         	: $('#txtAlamat').val(),
                    idKelas         	: $('#cmbKelas').val(),
                    namaOrtu         	: $('#txtWali').val()

                },
                success: function(response){
                    console.log(response);
                    if (response.valid){
                        $('.alert-danger').hide();
                        $('.alert-success').hide();
                        $('.alert-success').show().html('<p> Berhasil Menambahkan NIS '+response.sukses['nis']+'</p>');
                        clear()
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
                    console.log(errorThrown);

                }

            });
        }
    </script>
@endsection