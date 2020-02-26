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
                                    <label for="judul">Judul Berita</label>
                                    <input type="text" name="judul" id="judul" class="form-control form-control-sm" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="ckeditor">Berita</label>
                                    <textarea name="isi" id="ckeditor" class="ckeditor"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="gambar">Sampul Berita</label>
                                </div>
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
                                    <label for="judul">Judul Berita</label>
                                    <input type="hidden" id="id_edit" name="id">
                                    <input type="hidden" id="gambarLama" name="gambarLama">
                                    <input type="text" name="judul" id="judul_edit" class="form-control form-control-sm" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="isi">Isi Berita</label>
                                    <textarea name="isi" id="ckeditor2" class="ckeditor"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="gambar2">Sampul Berita</label>
                                </div>
                                <div class="form-group">
                                    <label for="gambar2" id="hasil"><img class="img-fluid" src="<?= base_url() ?>assets/img/noimage.png" id="output2" width="200"></label>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile2(event)" id="gambar2" name="gambar">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
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