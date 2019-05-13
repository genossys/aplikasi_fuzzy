@extends('admin.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Siswa
        </h1>

    </section>

    <!-- Main content -->
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



@endsection

@section('script')
    <script src="{{ asset('js/handlebars.js') }}"></script>
    <script id="details-template" type="text/x-handlebars-templatel">
        @verbatim
            <div id="foto" class="col-lg-2">
                <img src="images/12.jpg" height="50" width="50">
            </div>
            <div id="detail" class="col-lg-10">
                <div class="col-lg-2">
                    NIS :
                </div>
                <div class="col-lg-10">
                    {{ 'nis' }}
                </div>
                <br>
                <div class="col-lg-2">
                    NAMA :
                </div>
                <div class="col-lg-10">
                    {{ 'namaSiswa' }}
                </div>
                <br>
                <div class="col-lg-2">
                    NAMA :
                </div>
                <div class="col-lg-10">
                    {{ 'namaSiswa' }}
                </div>
                <br>
                <div class="col-lg-2">
                    NAMA :
                </div>
                <div class="col-lg-10">
                    {{ 'namaSiswa' }}
                </div>
                <br>
                <div class="col-lg-2">
                    NAMA :
                </div>
                <div class="col-lg-10">
                    {{ 'namaSiswa' }}
                </div>
                <br>
                <div class="col-lg-2">
                    NAMA :
                </div>
                <div class="col-lg-10">
                    {{ 'namaSiswa' }}
                </div>
                <br>
            </div>
        @endverbatim
    </script>

    <script src="{{ asset('js/Master/siswa.js') }}"></script>


@endsection