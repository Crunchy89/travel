<!-- modal tambah -->
<div class="modal fade bd-example-modal-xl" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_tambah" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-control form-control-sm" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="isi">Deskripsi</label>
                                    <textarea name="isi" id="isi" cols="30" rows="3" class="form-control form-control-sm" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="gambar" id="reset"><img class="img-fluid" src="<?= base_url() ?>assets/img/noimage.png" id="output" width="200"></label>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
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
<div class="modal fade bd-example-modal-xl" id="Modal_edit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_edit" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="hidden" name="id" id="id_edit">
                                    <input type="hidden" name="gambarLama" id="gambarLama">
                                    <input type="text" name="judul" id="judul_edit" class="form-control form-control-sm" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="isi">Deskripsi</label>
                                    <textarea name="isi" id="isi_edit" cols="30" rows="3" class="form-control form-control-sm" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="gambar_edit" id="hasil"></label>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" onchange="loadFileedit(event)" id="gambar_edit" name="gambar">
                                        <label class="custom-file-label" for="gambar_edit">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
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
<div class="modal fade bd-example-modal-xl" id="Modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
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