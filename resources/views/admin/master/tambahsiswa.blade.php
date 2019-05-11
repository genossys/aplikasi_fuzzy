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
                <a href="/siswa" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i></a>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>

                </div>
            </div>
            <div class="box-body">

                <form method="POST" action="{{ route('insertDataSiswa') }}" enctype="multipart/form-data" id="formtambahsiswa">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>NIS</label>
                                <input type="text" name="txtNis" id="txtNis" class="form-control" placeholder="Masukan NIS">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" name="txtNamaSiswa" id="txtNamaSiswa" class="form-control"
                                       placeholder="Masukan Nama Siswa">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="cmbjenisKelamin" id="cmbjenisKelamin">
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
                                    <input type="text" class="form-control pull-right" id="datepicker"
                                           name="lahirSiswa">
                                </div>
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" name="txtAlamatSiswa" id="txtAlamatSiswa"
                                          placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelasSiswa" id="cmbKelas">
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Nama Ortu</label>
                                <input type="text" name="txtOrtuSiswa" id="txtOrtuSiswa" class="form-control"
                                       placeholder="Masukan Nama Ortu / Wali">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Nomor Hp</label>
                                    <input type="text" class="form-control" name="txtNoHp" id="txtNoHp"
                                           placeholder="Masukan no. hp">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Foto Siswa</label>
                                <div class="form-group">
                                    {{--<div class="input-group input-file" name="fotosiswa">--}}
                                        {{--<span class="input-group-btn">--}}
                                            {{--<button class="btn btn-default btn-choose" type="button">Pilih</button>--}}
                                        {{--</span>--}}
                                        {{--<input type="file" class="form-control" name="txtFotoSiswa" id="txtFotoSiswa"--}}
                                               {{--placeholder='Pilih Foto Siswa'/>--}}
                                        {{--<span class="input-group-btn">--}}
                                             {{--<button class="btn btn-warning btn-reset" type="button">Reset</button>--}}
                                        {{--</span>--}}
                                    {{--</div>--}}

                                </div>
                                <input type="file" name="fileToUpload" id="txtFotoSiswa">
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                </form>
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
    <script src="{{ asset('js/Master/siswa.js') }}"></script>
@endsection