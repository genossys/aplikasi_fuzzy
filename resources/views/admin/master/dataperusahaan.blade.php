@extends('admin.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Tempat Magang
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambahkelas">
                    Tempat Magang Baru
                </button>

                <!-- The Modal -->
                <div class="modal fade" id="modaltambahkelas">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Tempat Magang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label>ID Perusahaan</label>
                                            <input type="text" name="idPerusahaan" id="idPerusahaan" class="form-control" placeholder="ID Perusahaan">
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Perusahaan</label>
                                            <input type="text" name="namaPerusahaan" id="namaPerusahaan" class="form-control" placeholder="Nama Perusahaan">
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea type="text" name="alamatPerusahaan" id="alamatPerusahaan" class="form-control" placeholder="Alamat"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>No. Telp</label>
                                            <input type="text" name="telpPerusahaan" id="telpPerusahaan" class="form-control" placeholder="No. Telp">
                                        </div>
                                        <button class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>

                </div>
            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID Perusahaan</th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>A1</td>
                        <td>Perusahaan A</td>
                        <td>Jl. blah blah blah no 8 Solo</td>
                        <td>0271 730172</td>
                        <td>
                            <button class="btn btn-success btn-sm">EDIT</button>
                            <button style="margin-left: 5px" class="btn btn-danger btn-sm">DELETE</button>
                        </td>
                    </tr>

                    <tr>
                        <td>B1</td>
                        <td>Perusahaan B</td>
                        <td>Jl. blah blah blah no 90 Solo</td>
                        <td>0271 730172</td>
                        <td>
                            <button class="btn btn-success btn-sm">EDIT</button>
                            <button style="margin-left: 5px" class="btn btn-danger btn-sm">DELETE</button>
                        </td>
                    </tr>
                    </tbody>

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

@endsection