@extends('admin.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Siswa
        </h1>

    </section>

    <section class="content">


    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
           <a href="{{route('siswaBaru')}}" class="btn btn-primary">Siswa Baru</a>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    
                </div>
            </div>
            <div></div>
            <div class="box-body">
                <div class="table-responsive-lg">
                    <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>

                    </table>
                </div>
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

    <div></div>

@endsection

@section('script')
    <script src="{{ asset('js/handlebars.js') }}"></script>
    <script id="details-template" type="text/x-handlebars-templatel">
        @verbatim
            <div id="foto" class="col-lg-2 text-center">
                <img src="images/fotosiswa/{{ 'foto' }}" height="70" width="70">
            </div>
            <div id="detail" class="col-lg-10">
                <div class="table-responsive-lg">
                <table class="table table-responsive">
                    <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td>{{ 'nis' }}</td>
                    </tr>
                    <tr>
                        <td>NAMA</td>
                        <td>:</td>
                        <td>{{ 'namaSiswa' }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ 'jenisKelamin' }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ 'jenisKelamin' }}</td>
                    </tr><tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ 'alamat' }}</td>
                    </tr><tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td>{{ 'idKelas' }}</td>
                    </tr>
                    <tr>
                        <td>Nama Orang Tua</td>
                        <td>:</td>
                        <td>{{ 'namaOrtu' }}</td>
                    </tr>
                    <tr>
                        <td>No. Hp</td>
                        <td>:</td>
                        <td>{{ 'noHp' }}</td>
                    </tr>
                </table>
                </div>
            </div>
        @endverbatim
    </script>

    <script src="{{ asset('js/Master/siswa.js') }}"></script>


@endsection