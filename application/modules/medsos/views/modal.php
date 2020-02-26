<!-- modal tambah -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_tambah" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <select name="icon" id="icon" class="form-control" required>
                            <option value="">Pilih Icon</option>
                            <option value="fab fa-fw fa-facebook-f">Facebook</option>
                            <option value="fab fa-fw fa-instagram">Instagram</option>
                            <option value="fab fa-fw fa-twitter">Twitter</option>
                            <option value="fab fa-fw fa-youtube">Youtube</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <textarea name="link" id="link" cols="30" rows="3" class="form-control" placeholder="Link" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="btn_tambah">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal Edit -->
<div class="modal fade" id="Modal_edit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_edit" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="hidden" name="id" id="id_edit">
                        <select name="icon" id="icon_edit" class="form-control" required>
                            <option value="">Pilih Icon</option>
                            <option value="fab fa-fw fa-facebook-f">Facebook</option>
                            <option value="fab fa-fw fa-instagram">Instagram</option>
                            <option value="fab fa-fw fa-twitter">Twitter</option>
                            <option value="fab fa-fw fa-youtube">Youtube</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <textarea name="link" id="link_edit" cols="30" rows="3" class="form-control" placeholder="Link" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="btn_edit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal hapus -->
<div class="modal fade" id="Modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_hapus" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_hapus">
                    <h3>Apakah Anda Yakin ?</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="btn_hapus">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>