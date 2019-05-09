function getDataKelas(route) {
    var table = $('#example2').DataTable({
        destroy     : true,
        lengthMenu: [ [5, 10, 15, -1], [5, 10, 15, "All"] ],
        autowidth   : true,
        serverSide  : true,
        processing  : false,
        ajax        : route,
        columns     : [
            {data : 'DT_RowIndex', name : 'DT_RowIndex', searchable : false, sortable : false},
            {data :'idKelas', name   : 'idKelas'},
            {data :'namaKelas', name : 'namaKelas'},
            {data : 'action', name : 'action'}
        ]

    });

        $('#example2 tbody').on('click', 'td a#btn-edit', function (e) {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
        console.log(table.row(row).data().idKelas);
        // console.log($(this));
    });
}

function test2() {

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

function updateDataKelas(route) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: route,
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

function insertDataSiswa(route) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: route,
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

function deleteDataKelas(route, id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: route,
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