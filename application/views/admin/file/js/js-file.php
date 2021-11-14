<script type="text/javascript">
$(document).ready(function() {
    var table = $('#konten').DataTable({
        "bDestroy": true,
        "language": {
            "searchPlaceholder": 'Pencarian',
            "sSearch": '',
            "lengthMenu": '_MENU_ items/page',
        },
        "ajax": "<?php echo base_url('file/view-file'); ?>",
        "order": [
            [2, 'asc']
        ],
        "columns": [{
                "data": null,
                "width": "50px",
                "sClass": "text-center",
                "orderable": false,
            },
            { "data": "nama_file"},
            { "data": "nama"},
            { "data": "username"},
            {
                "data": null,
                "render": function(data) {
                    return '<button title="edit" class="btn btn-outline-warning btn-sm"  onclick=edit("' +
                        data.idfile + '");>Edit</button> ' +
                        '<button title="hapus" class="btn btn-outline-danger btn-sm" onclick=hapus("' + data
                        .idfile + '");>Hapus</button> ' +
                        '<button title="Download" class="btn btn-outline-info btn-sm" onclick=download("' +
                        data.idfile + '");>Download</button> ';
                }
            },
        ]
    });

    table.on('order.dt search.dt', function() {
        table.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
});

function show() {
    $('#modalNewData').modal({
        backdrop: 'static',
        keyboard: false
    }, 'show');
}

function tutup() {
    $('#modalNewData').modal('hide');
    $('#form-add-new-data').trigger("reset");
    $('#exampleModalCenterTitle').text('Tambah File');
    $('#file').attr('required','required');
}
 
$("#form-add-new-data input").on("change invalid", function() {
    var pasar = $(this).get(0);
    pasar.setCustomValidity("");

    if (!pasar.validity.valid) {
        pasar.setCustomValidity("Opss.. harus diisi !");
    }
});

var ins = $('#form-add-new-data').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        url: "<?php echo base_url('file/save-file'); ?>",
        method: 'post',
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        success: function(r) {
            if (r.icon == 'success') {
                swal({
                    title: "Success",
                    icon: r.icon,
                    text: r.msg,
                    dangerMode: false,
                    buttons: {
                        confirm: "Ok",
                    }
                }).then((ok) => {
                    tutup();
                    window.location.href = "<?= base_url() ?>" + r.link;
                });
            } else {
                swal({
                    title: r.icon,
                    text: r.msg,
                    icon: r.icon
                });
            }
        }
    });
});

function hapus(id) {
    swal({
        title: "Peringatan",
        icon: "warning",
        text: "Yakin ingin menghapus data ini?",
        dangerMode: true,
        buttons: {
            cancel: "Batal",
            confirm: "Hapus",
        }
    }).then((ok) => {
        if (ok) {
            $.ajax({
                url: "<?php echo base_url('file/delete-file'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                },
                success: function(r) {
                    swal({
                        title: "Berhasil",
                        icon: r.icon,
                        text: r.msg,
                        dangerMode: false,
                        buttons: {
                            confirm: "Ok",
                        }
                    }).then((ok) => {
                        window.location.reload();
                    });
                }
            });
        } else {
            swal({
                title: "Dibatalkan",
                text: "Data Batal Dihapus",
                icon: "info"
            });
        }
    });
}

function download(id) {
    swal({
        title: "Peringatan",
        icon: "warning",
        text: "Yakin ingin mendownload data ini?",
        dangerMode: false,
        buttons: {
            cancel: "Batal",
            confirm: "Download",
        }
    }).then((ok) => {
        if (ok) {
            $.ajax({
                url: "<?php echo base_url('file/download-file'); ?>",
                type: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                },
                success: function(r) {
                    window.location.href = "<?= base_url() ?>" + r.link;
                }
            });
        } else {
            swal({
                title: "Dibatalkan",
                text: "Data Batal Dihapus",
                icon: "info"
            });
        }
    });
}

function edit(id) {
    $.ajax({
        url: "<?php echo base_url('file/get-file'); ?>",
        type: "POST",
        dataType: "JSON",
        data: {
            id: id,
        },
        success: function(res) {
            if (res.icon != null && res.icon != '') {
                swal({
                    title: "Terjadi kesalahan",
                    text: res.msg,
                    icon: res.icon
                });
            } else {
                $('#modalNewData').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
                $('#id').val(res.id); 
                $('#exampleModalCenterTitle').text('Edit Data Admin');
                $('#id').val(res.id);
                $('#nama_file').val(res.nama_file);
                $('#file').removeAttr('required','required');
            }
        },
        error: function() {
            swal({
                title: "Terjadi kesalahan",
                text: "Kesalahan dalam mengambil data",
                icon: "error"
            });
        }
    });
}
</script>