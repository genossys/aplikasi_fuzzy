function getListkelas1(route) {
    $.get(route, function (data) {
        console.log(data);
        $('#cmbKelas').empty();
        $.each(data, function (index, element) {
            $('#cmbKelas').append('<option>'+element.idKelas+'</option>')
        });
    });
}