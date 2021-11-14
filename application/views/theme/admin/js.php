<?php
$uri = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
if($uri == "dashboard" || $uri == 'file'){
    $this->load->view('admin/'.$uri.'/js/js-'.$uri);
}else{
    $this->load->view('admin/'.$uri.'/'.$uri2.'/js/js-'.$uri2);
}
?>

<script>
function underConstruction(){
    swal({
        title: "Peringatan",
        text: "Menu under construction",
        icon: "warning"
    });
}

function ubahKataSandi(key){
    $("#id_reset").val(key);
    $("#modalResetPassword").modal({backdrop: 'static', keyboard: false},'show');
}

function checkResetPass(){
    var newPass = $('#r-newpass').val(); 
    var confirmPass = $('#r-confirm').val(); 
    if(newPass == confirmPass && newPass != "" && confirmPass != "" && newPass.length >= 8 ){
        $('#btnSaveReset').attr('type','submit');
        $('#btnSaveReset').attr('class','btn btn-primary pd-y-12 btn-block');
            $('#msg-alert-reset').attr('style','display:block;');
            $('#msg-alert-reset').attr('class','alert alert-success');
            $('#msg-alert-reset span').html('Password sesuai');
    }else{
        $('#msg-alert-reset').attr('style','display:block;');
        $('#msg-alert-reset').attr('class','alert alert-danger');
        if(newPass != confirmPass){
            $('#msg-alert-reset span').html('Password tidak sama');
        }else if(newPass.length < 8){
            $('#msg-alert-reset span').html('Panjang password kurang dari 8');
        }
        $('#btnSaveReset').attr('type','button');
        $('#btnSaveReset').attr('class','btn disbled pd-y-12 btn-block');
    }
}

function closeResetPass(){
    $('#modalResetPassword').modal('hide');
    $('#form_reset_pass').trigger("reset");	
    $('#msg-alert-reset').attr('style', 'display:none;');
    $('#btnSaveReset').attr('type', 'button');
    $('#btnSaveReset').attr('class', 'btn disbled');
}

var resetPassword = $('#form_reset_pass').on('submit', function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: '<?= base_url('proses-reset-password'); ?>',
                method: 'post',
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function(r){
                    if(r.icon == 'success'){
                        swal({
                            title: "Success",
                            icon: r.icon,
                            text: r.msg,
                            dangerMode: false,
                            buttons: {                        
                                confirm: "ok",
                            }
                        }).then((ok) => {
                            closeResetPass();
                        });
                    }else{
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