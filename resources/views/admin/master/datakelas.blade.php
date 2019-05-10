@extends('admin.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Data Kelas
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

                </div>
            </div>
            <div class="box-body">
                <table id="example2" class="table table-striped  table-bordered table-hover">
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
                    <form  action="{{route('insertDataKelas')}}" method="POST" id="formSimpanSiswa">
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
                        <button id="btnSimpan" class="btn btn-primary">Simpan</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
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
                    <form type="POST">
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
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        var urlkelas = '{{route('getDataKelas')}}';
    </script>
    <script src="{{ asset('js/Master/kelas.js') }}"></script>
    <script type="text/javascript">
        getDataKelas();
    </script>
@endsection