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
                            <a href="<?= site_url('destinasi') ?>" class="btn btn-xs btn-info"><i class="fas fa-fw fa-arrow-alt-circle-left"></i> Kembali</a>
                            <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-xs btn-success"><i class="fas fa-fw fa-plus"></i> Tambah Foto</button>
                            <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#hapus"><i class="fas fa-fw fa-trash"></i> Hapus Seleksi</button>
                            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapus_semua"><i class="fas fa-fw fa-trash"></i> Hapus Galeri</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_hapus">
                            <div class="row" id="data">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Gambar</h5>
                <button type="button" class="close cancel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_tambah" method="post" enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="gambar">Pilih Gambar</label>
                            <input type="file" name="gambar[]" id="gambar" onchange="preview_image()" accept="image/*" multiple>
                        </div>
                        <div class="row" id='preview'></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="upload">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Seleksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Apakah Anda Yakin ?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn_hapus">Hapus</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_semua" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Apakah Anda Yakin ?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="hapus_semua">Hapus Semua</button>
            </div>
        </div>
    </div>
</div>


<script>
    function preview_image() {
        var total_file = document.getElementById("gambar").files.length;
        for (var i = 0; i < total_file; i++) {
            data = '<div class="col-sm-1">' +
                '<a href="#" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">' +
                '<img src="' + URL.createObjectURL(event.target.files[i]) + '" class="img-fluid mb-2" alt="white sample" />' +
                '</a>' +
                '</div>';
            $('#preview').append(data);
        }
    }
    $(document).ready(function() {
        show_data();

        function show_data() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('destinasi/getData/') . $this->uri->segment('3') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        file = '<div class="col-sm-2">' +
                            '<input type="checkbox" name="id[]" id="id' + data[i].id_gambar + '" value="' + data[i].id_gambar + '"/><label for="id' + data[i].id_gambar + '" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">' +
                            '<img src="<?= base_url('assets/img/destinasi/') ?>' + data[i].gambar + '" class="img-fluid mb-2" alt="white sample" />' +
                            '</label>' +
                            '</div>';
                        $('#data').append(file);
                    }
                }

            });
        }
        $('.cancel').click(function() {
            $('#form_tambah')[0].reset();
            $('#preview').html('');
        });
        $('#form_tambah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('destinasi/tambah_gambar/') . $this->uri->segment('3'); ?>",
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    $('#tambah').modal('hide');
                    $('#form_tambah')[0].reset();
                    $('#preview').html('');
                    $('#data').html('');
                    show_data();
                }
            });
        });
        $('#btn_hapus').on('click', function() {
            $.ajax({
                url: '<?= site_url('destinasi/hapus_gambar') ?>',
                type: 'POST',
                data: $('#form_hapus').serialize(),
                dataType: 'json',
                success: function(data) {
                    $('#hapus').modal('hide');
                    $('#data').html('');
                    show_data();
                }
            });
        });
    });
</script>