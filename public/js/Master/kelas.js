function getDataKelas1(route) {
    $('#example2').DataTable({
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
            {
                render: function (data, type, row) {
                    return '<a class="btn-sm btn-warning" href="#" onclick="showDetail(\''+row.idKelas+'\', \''+row.namaKelas+'\');"> Edit <a/> &nbsp' +
                        ' <a class="btn-sm btn-danger" href="#" onclick="javascript:if (confirm(\'Yakin Menghapus Data?\')) deleteDataKelas(\''+row.idKelas+'\')">Delete</a> ';
                }
            }
        ]

    });
}