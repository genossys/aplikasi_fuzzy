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
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th>Nama Ortu</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <td class="non_searchable"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="non_searchable"></td>
                </tr>

                </tfoot>
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

@section('script')

    <script id="details-template" type="text/x-handlebars-templatel">
        @verbatim
        <div id="foto" class="col-lg-2">
            Foto Siswa
        </div>
        <div id="detail" class="col-lg-10">
            <div class="col-lg-2">
                NIS :
            </div>
            <div class="col-lg-10">
                {{ 'nis' }}
            </div><br>
            <div class="col-lg-2">
                NAMA :
            </div>
            <div class="col-lg-10">
                {{ 'namaSiswa' }}
            </div><br>
        </div>
        @endverbatim
    </script>

    <script>


        getDataSiswa();

    function getDataSiswa() {


        var template = Handlebars.compile($("#details-template").html());

        var table = $('#example2').DataTable({
            destroy     : true,
            lengthMenu: [ [5, 10, 15, -1], [5, 10, 15, "All"] ],
            autowidth   : true,
            serverSide  : true,
            processing  : false,
            ajax        : '{{route('getDataSiswa')}}',
            columns     : [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "searchable":     false,
                    "data":           null,
                    "defaultContent": '<button>detail</button>'
                },
                {data : 'DT_RowIndex', name : 'DT_RowIndex', searchable : false, orderable : false},
                {data :'nis', name   : 'nis'},
                {data :'namaSiswa', name : 'namaSiswa'},
                {data :'jenisKelamin', name : 'jenisKelamin'},
                {data :'tanggalLahir', name : 'tanggalLahir'},
                {data :'alamat', name : 'alamat'},
                {data :'idKelas', name : 'idKelas'},
                {data :'namaOrtu', name : 'namaOrtu'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],order: [[1, 'asc']]
//            ,initComplete: function () {
//                    this.api().columns([1,2,3,4,5,6]).every(function () {
//                        var column = this;
//                        var input = document.createElement("input");
//                        $(input).appendTo($(column.footer()).empty())
//                            .on('change', function () {
//                                column.search($(this).val(), false, false, true).draw();
//                            });
//                    });
//            }

        });

        $('#example2 tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );

            if ( row.child.isShown() ) {
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                row.child(
                    template(row.data())
                ).show();
                tr.addClass('shown');
            }
        });
    }

//    function test() {
//        alert('oke');
//    }
        
        {{--function toogleImg() {--}}
            {{--var img1 = "{{asset('images/details_open.png')}}",--}}
                {{--img2 = "{{asset('images/details_close.png')}}";--}}
            {{--var imgElement = document.getElementById('test1');--}}

            {{--imgElement.src = (imgElement.src === img1)? img2 : img1;--}}
        {{--}--}}
</script>


@endsection