var alertSukses = $('.alert-success');
var alertDanger = $('.alert-danger');

$('#formtambahsiswa').on('submit', function (event) {
    event.preventDefault();
    var url = $(this).attr("action");
    $.ajax({
        url:url,
        method:"POST",
        data: new FormData($('#formtambahsiswa')[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success:function(response)
        {
            if (response.valid) {
                console.log(response);
                clearSimpanSiswa();
                alertSukses.show().html('<p> Berhasil Menambahkan Data ' + response.sukses.nis + '</p>');
            }else{
                alertDanger.hide();
                alertSukses.hide();
                $.each(response.errors, function (key, value) {
                    alertDanger.show().append('<p>' + value + '</p>');
                });
            }
            
        },
        error: function (respoxhr, textStatus, errorThrownnse) {
            alert(errorThrown + xhr + textStatus);
        }
    });
});

$.get('/siswa/dataKelas', function (data) {
    $('#cmbKelas').empty();
    $.each(data, function (index, element) {
        $('#cmbKelas').append('<option>'+element.idKelas+'</option>')
    });
});


function clearSimpanSiswa() {
    
    $('#txtNis').val('');
    $('#txtNamaSiswa').val('');
    $('#datepicker').val('');
    $('#txtAlamat').val('');
    $('#txtOrtuSiswa').val('');
    $('#txtNoHp').val('');
    $('#txtFoto').val('');
    alertDanger.hide();
    alertSukses.hide();

}