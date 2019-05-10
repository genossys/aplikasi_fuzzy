
$(document).ready(function () {
    var alertSukses = $('.alert-success');
    var alertDanger = $('.alert-danger');
    getDataKelas('kelas/dataKelas');

    // simpanDataSiswa
    $('#formSimpanKelas').on('submit',function (e) {
        e.preventDefault();
        var method = $(this).attr("method");
        var url = $(this).attr("action");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: method,
            url: url,
            dataType: 'JSON',
            data: {
                _token 		    : $('input[name=_token]').val(),
                idKelas 		: $('#txtIdKelas').val(),
                namaKelas   	: $('#txtNamaKelas').val()
            },
            success: function(response){
                console.log(response);
                if (response.valid){

                    alertDanger.hide();
                    alertSukses.hide();
                    alertSukses.show().html('<p> Berhasil Menambahkan Data '+response.sukses.idKelas+'</p>');
                    clearSave();
                    getDataKelas(response.url);
                }else{
                    alertDanger.hide();
                    alertSukses.hide();
                    $.each(response.errors, function(key, value){
                        alertDanger.show().append('<p>'+value+'</p>');
                    });
                }
            },
            error: function(xhr, textStatus, errorThrown){
                alert(errorThrown);
            }

        });

    });


    $('#formEditKelas').on('submit', function (e) {
        e.preventDefault();
        var method = $(this).attr("method");
        var url = $(this).attr("action");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: method,
            url: url,
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
                    alertDanger.hide();
                    alertSukses.hide();
                    alertSukses.show().html('<p> Berhasil merubah Data '+$('#txtOldIdKelas').val()+' Menjadi '+$('#txtIdKelasEdit').val()+'  </p>');
                    clearEdit();
                    getDataKelas(response.url);
                }else{
                    $.each(response.errors, function(key, value){
                        alertDanger.show().append('<p>'+value+'</p>');
                    });
                }
            },
            error: function(xhr, textStatus, errorThrown){
                alert(errorThrown+ xhr+ textStatus);

            }
        });
    });

});

function test2(id) {
    alert(id);
}

function getDataKelas(url) {
    var table = $('#example2').DataTable({
        destroy     : true,
        lengthMenu: [ [5, 10, 15, -1], [5, 10, 15, "All"] ],
        autowidth   : true,
        serverSide  : true,
        processing  : false,
        ajax        : url,
        columns     : [
            {data : 'DT_RowIndex', name : 'DT_RowIndex', searchable : false, orderable : false, sortable: false},
            {data :'idKelas', name   : 'idKelas'},
            {data :'namaKelas', name : 'namaKelas'},
            {data : 'action', name : 'action', searchable : false, orderable : false}
        ]

    });

    //     $('#example2').find('tbody').on('click', 'td a#btn-edit', function (e) {
    //         e.preventDefault();
    //         var tr = $(this).closest('tr');
    //         var row = table.row( tr );
    //         var vIdKelas = table.row(row).data()['idKelas'];
    //         var vNamaKelas = table.row(row).data()['namaKelas'];
    //         showDetail(vIdKelas, vNamaKelas);
    //         // console.log(table.row(row).data().idKelas);
    //     });
    //
    // $('#example2').find('tbody').on('click', 'td a#btn-test', function (e) {
    //     e.preventDefault();
    //     var tr = $(this).closest('tr');
    //     var row = table.row( tr );
    //     var vIdKelas = table.row(row).data();
    //     console.log(table.row(row).data()['idKelas']);
    // });
    //
    //     $('#example2').find('tbody').on('click', 'td a#btn-delete', function (e) {
    //         e.preventDefault();
    //         var tr = $(this).closest('tr');
    //         var row = table.row( tr );
    //         var vIdKelas = table.row(row).data().idKelas;
    //         if(confirm('Yakin Akan Menghapus Data '+vIdKelas+' ?')){
    //             deleteDataKelas(vIdKelas);
    //         }
    //     });
}


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


function deleteDataKelas(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'kelas/hapusDataKelas',
        data: {
            _method: 'DELETE',
            _token: $('input[name=_token]').val(),
            idKelas:id
        },
        success: function (response){
            console.log(response);
            getDataKelas(response.url);
        },error: function (xhr, textStatus, errorThrown) {
            alert(xhr + textStatus + errorThrown);
        }

    });
}