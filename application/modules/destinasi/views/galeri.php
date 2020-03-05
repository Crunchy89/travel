<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Galeri</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            Ekko Lightbox
                        </div>
                        <br>
                        <hr>
                        <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-xs btn-info">Tambah Foto</button>
                        <button type="button" class="btn btn-xs btn-danger">Delete</button>
                    </div>
                    <div class="card-body">
                        <div class="row" id="data">



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_tambah" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="gambar">Pilih Gambar</label>
                        <input type="file" name="gambar[]" id="gambar" accept="image/*" multiple>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        show_data();

        function show_data() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('destinasi/getData/') . $this->uri->segment('3') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    data += '<div class="col-sm-2">' +
                        '<a href="#" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">' +
                        '<img src="<?= base_url('assets/img/destinasi/') ?>' + data.nama_destinasi + '" class="img-fluid mb-2" alt="white sample" />' +
                        '</a>' +
                        '</div>';
                    $('#data').html(data);
                }

            });
        }
    });
</script>