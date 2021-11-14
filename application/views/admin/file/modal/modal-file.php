<!-- Modal -->
<div class="modal fade" id="modalNewData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah File</h5>
                <button type="button" class="close" onclick="tutup();">
                    <i data-feather="x-circle">close</i>
                </button>
            </div>
            <form method="post" id="form-add-new-data" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="nama_file">Nama file</label>
                        <input type="text" class="form-control" id="nama_file" name="nama_file"
                            placeholder="Enter File" required>
                    </div>

                    <div class="form-group">
                        <label for="files">File</label>
                        <input type="file" class="form-control" id="file" name="file" required>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Upload Now</button>
                </div>
            </form>
        </div>
    </div>
</div>