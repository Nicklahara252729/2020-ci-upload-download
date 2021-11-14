<script>
function ubahFotoProfile(key) {
    $("#modalUbahPhotoProfile").modal({
        backdrop: 'static',
        keyboard: false
    }, 'show');
    $('#idphoto').val(key);
}

//update profile
var ubahPhoto = $('#form_ubah_photo').on('submit', function(e) {
    e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "<?php echo base_url('ubah-photo-profile'); ?>",
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
                        $('#modalUbahPhotoProfile').modal('hide');
                        window.location.href = "<?= base_url() ?>"+r.link;
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

function changeUsername(id) {
    $("#modalEditProfileUser").modal({
        backdrop: 'static',
        keyboard: false
    }, 'show');
    $('#id_username').val(id);
}

//update profile
var ins = $('#form_username').on('submit', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "<?php echo base_url('change-username'); ?>",
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
                        $('#modalEditProfileUser').modal('hide');
                        $('#form_username').trigger("reset");
                        window.location.href = "<?= base_url() ?>"+r.link;
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
</script>