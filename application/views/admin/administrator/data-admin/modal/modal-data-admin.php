<!-- Modal -->
<div class="modal fade" id="modalNewData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Admin</h5>
                <button type="button" class="close" onclick="tutup();">
                    <i data-feather="x-circle">close</i>
                </button>
            </div>
            <form method="post" id="form-add-new-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="nama">Nama lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Enter Nama lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Email" required>
                    </div>
                    
                    <hr>

                    <div class="alert alert-danger" style='display:none;' id="msg-pass">
                        <span></span>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter Username" required>
                    </div>

                    <div id="div-password">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" required onkeyup="checkPass();">
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi">Konfirmasi</label>
                            <input class="form-control" type="password" name="confirm" id="confirms" placeholder="Konfirmasi Password" required onkeyup="checkPass();">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn disbled" id="btnSimpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>