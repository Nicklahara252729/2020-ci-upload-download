<script type="text/javascript">
function checkPass() {
    var newPass = $('#password').val();
    var confirmPass = $('#confirms').val();
    if (newPass == confirmPass && newPass != "" && confirmPass != "" && newPass.length >= 8) {
        $('#btnSimpan').attr('type', 'submit');
        $('#btnSimpan').attr('class', 'btn btn-primary');
        $('#msg-pass').attr('style', 'display:block;');
        $('#msg-pass').attr('class', 'alert alert-success ');
        $('#msg-pass span').html('Password sesuai');
    } else {
        $('#msg-pass').attr('style', 'display:block;');
        $('#msg-pass').attr('class', 'alert alert-danger ');
        if (newPass != confirmPass) {
            $('#msg-pass span').html('Password tidak sama');
        } else if (newPass.length < 8) {
            $('#msg-pass span').html('Panjang password kurang dari 8');
        }
        $('#btnSimpan').attr('type', 'button');
        $('#btnSimpan').attr('class', 'btn disbled');
    }
}


$(document).ready(function() {
    var table = $('#konten').DataTable({
        "bDestroy": true,
        "language": {
            "searchPlaceholder": 'Pencarian',
            "sSearch": '',
            "lengthMenu": '_MENU_ items/page',
        },
        "ajax": "<?php echo base_url('administrator/view-data-admin'); ?>",
        "order": [
            [2, 'asc']
        ],
        "columns": [{
                "data": null,
                "width": "50px",
                "sClass": "text-center",
                "orderable": false,
            },
            { "data": "nama"},
            { "data": "email"},
            { "data": "username"},
            {
                "data": null,
                "render": function(data) {
                    return '<button title="edit" class="btn btn-outline-warning btn-sm"  onclick=edit("' +
                        data.id + '");>Edit</button> ' +
                        '<button title="hapus" class="btn btn-outline-danger btn-sm" onclick=hapus("' + data
                        .id + '");>Hapus</button> ' +
                        '<button title="ubah password" class="btn btn-outline-info btn-sm" onclick=ubahKataSandi("' +
                        data.id + '");>Reset Password</button> ';
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
    $('#exampleModalCenterTitle').text('Tambah Data Admin');
    $('#msg-pass').attr('style', 'display:none;');
    $('#div-password').removeAttr('style', 'display:none;');
    $('#btnSimpan').attr('type', 'button');
    $('#btnSimpan').attr('class', 'btn disbled');
    $('option').removeAttr('selected','selected');
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
        url: "<?php echo base_url('administrator/save-data-admin'); ?>",
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
                url: "<?php echo base_url('administrator/delete-data-admin'); ?>",
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

function edit(id) {
    $.ajax({
        url: "<?php echo base_url('administrator/get-data-admin'); ?>",
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
                $('#email').val(res.email);
                $('#username').val(res.username);
                $('#nama').val(res.nama);
                $('#div-password').attr('style', 'display:none;');
                $('#btnSimpan').attr('type', 'submit');
                $('#btnSimpan').attr('class', 'btn btn-primary');
                $('#password').removeAttr('required', 'required');
                $('#confirms').removeAttr('required', 'required');
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