<!-- modal tambah -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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
                        <label for="nama">Nama Destinasi</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gambar" id="reset"><img class="img-fluid" src="<?= base_url() ?>assets/img/noimage.png" id="output" width="200"></label>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
                            <label class="custom-file-label" for="exampleInputFile">Pilih Foto</label>
                        </div>
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
                        <label for="nama_edit">Nama Destinasi</label>
                        <input type="hidden" name="id" id="id_edit">
                        <input type="hidden" name="gambarLama" id="gambarLama">
                        <input type="text" name="nama" id="nama_edit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gambar2" id="hasil"><img class="img-fluid" src="<?= base_url() ?>assets/img/noimage.png" id="output2" width="200"></label>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile2(event)" id="gambar2" name="gambar">
                            <label class="custom-file-label" for="exampleInputFile">Ganti Foto</label>
                        </div>
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
            <form id="form_hapus">
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