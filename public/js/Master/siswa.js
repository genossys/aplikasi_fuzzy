    $.get('siswa/dataKelas', function (data) {
        $('#cmbKelas').empty();
        $.each(data, function (index, element) {
            $('#cmbKelas').append('<option>'+element.idKelas+'</option>')
        });
    });


    var alertSukses = $('.alert-success');
    var alertDanger = $('.alert-danger');

    $('#formtambahsiswa').on('submit',function (e) {
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
                nis      		: $('#txtNis').val(),
                namaSiswa   	: $('#txtNamaSiswa').val(),
                jenisKelamin   	: $('#cmbjenisKelamin').val(),
                tanggalLahir   	: $('#datepicker').val(),
                alamat         	: $('#txtAlamatSiswa').val(),
                idKelas        	: $('#cmbKelas').val(),
                namaOrtu       	: $('#txtOrtuSiswa').val(),
                foto           	: $('#txtFotoSiswa').val(),
                noHp           	: $('#txtNoHp').val(),
            },
            success: function(response){
                console.log(response);
                if (response.valid){

                    alertDanger.hide();
                    alertSukses.hide();
                    // alertSukses.show().html('<p> Berhasil Menambahkan Data '+response.sukses.idKelas+'</p>');
                    // clearSave();
                    // table.draw();
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
