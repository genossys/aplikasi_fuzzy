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
                <a href="/datasiswa" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i></a>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>

                </div>
            </div>
            <div class="box-body">

                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>NIS</label>
                                <input type="text" name="nis" id="nis" class="form-control" placeholder="Masukan NIS">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" name="namaSiswa" id="namaSiswa" class="form-control"
                                       placeholder="Masukan Nama Siswa">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenisKelaminSiswa" id="jenisKelaminSiswa">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
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
                                <textarea class="form-control" rows="3" name="alamatSiswa" id="alamatSiswa"
                                          placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelasSiswa" id="kelasSiswa">
                                    <option>X</option>
                                    <option>Xi</option>
                                    <option>Xii</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Nama Ortu</label>
                                <input type="text" name="ortuSiswa" id="ortuSiswa" class="form-control"
                                       placeholder="Masukan Nama Ortu / Wali">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Nomor Hp</label>
                                    <input type="text" class="form-control" name="telpSiswa" id="telpSiswa"
                                           placeholder="Masukan no. hp">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Foto Siswa</label>
                                <div class="form-group">
                                    <div class="input-group input-file" name="fotosiswa">
			<span class="input-group-btn">
        		<button class="btn btn-default btn-choose" type="button">Pilih</button>
    		</span>
                                        <input type="text" class="form-control" name="fotoSiswa" id="fotoSiswa"
                                               placeholder='Pilih Foto Siswa'/>
                                        <span class="input-group-btn">
       			 <button class="btn btn-warning btn-reset" type="button">Reset</button>
    		</span>
                                    </div>
                                </div>
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