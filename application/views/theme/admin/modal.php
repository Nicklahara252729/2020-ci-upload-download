<?php
$uri = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
if($uri == 'dashboard' || $uri == 'file'){
    $this->load->view('admin/'.$uri.'/modal/modal-'.$uri);
}else{
    $this->load->view('admin/'.$uri.'/'.$uri2.'/modal/modal-'.$uri2);
}
?>

<!-- reset pass -->
<div class="modal fade" id="modalResetPassword">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Reset Password</h5>
                <button type="button" class="close" onclick="closeResetPass();">
                    <i class="icon-close"></i>
                </button>
            </div>
            <form method="post" id="form_reset_pass">
            <div class="modal-body">
            <input type="hidden" id="id_reset" name="id_reset" >
            <input type="hidden" id="type" name="type" value="1">
            <div class="alert alert-danger" style='display:none;' id="msg-alert-reset">
                <span></span>
            </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="r-newpass">New Password</label>
                    <div class="col-sm-8">
                        <input autofocus type="password" class="form-control" placeholder="Enter New Password" id="r-newpass" name="r_newpass" onkeyup="checkResetPass();">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="r-confirm">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" placeholder="Enter Confirm Password" id="r-confirm" name="r_confirm" onkeyup="checkResetPass();">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn disabled" id="btnSaveReset">Simpan Perubahan</button>
            </div>
            </form>
        </div>
    </div>
</div>
