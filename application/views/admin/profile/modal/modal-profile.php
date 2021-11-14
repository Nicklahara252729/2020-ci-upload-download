<div class="modal fade" id="modalEditProfileUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Username</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form method="post" id="form_username" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_username" id="id_username">

                    <div class="form-group">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username Baru" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" id="btnSave">Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalUbahPhotoProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Photo Profile</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form method="post" id="form_ubah_photo" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group ">
                        <input type="hidden" name="idphoto" id="idphoto">
                        <label for="files">Photo</label>
                        <input type="file" class="form-control" id="files" name="files" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary   pd-y-12 btn-block" type="submit" id="btnSave">Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>
