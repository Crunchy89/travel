<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profil</h1>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i>Profil Travel</h3>
                        <form id="edit_form" enctype="multipart/form-data">
                            <br>
                            <hr>
                            <button type="button" id="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</button>
                            <button type="button" id="cancel" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Cancel</button>
                            <button type="submit" id="simpan" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Simpan</button>
                    </div>
                    <div class="card-body pad table-responsive">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nama">Nama Travel</label>
                                        <input type="hidden" name="id" id="id">
                                        <input type="hidden" name="gambarLama" id="gambarLama">
                                        <input type="text" name="nama" id="nama" class="form-control form-control-sm" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="gambar" id="reset"></label>
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar" disabled>
                                                <label class="custom-file-label" for="exampleInputFile">Logo Travel</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="alamat">Alamat Travel</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control form-control-sm" disabled required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-sm" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="wa">Nomor WhatsApp</label>
                                        <input type="text" name="wa" id="wa" class="form-control form-control-sm" required disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No Telepon Kantor</label>
                                        <input type="number" name="nohp" id="nohp" class="form-control form-control-sm" required disabled>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tentang">Tentang Kami</label>
                                        <textarea name="tentang" id="tentang" cols="30" rows="12" class="form-control" disabled required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
    $(document).ready(function() {
        show_data();

        function show_data() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('profile/getData') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    $('#id').val(data.id_profile);
                    $('#gambarLama').val(data.logo);
                    $('#nama').val(data.nama);
                    $('#alamat').val(data.alamat);
                    $('#email').val(data.email);
                    $('#wa').val(data.no_wa);
                    $('#nohp').val(data.no_kantor);
                    $('#tentang').val(data.about);
                    $('#reset').html('<img class="img-fluid" width="100px" src="<?= base_url() ?>assets/img/' + data.logo + '" id="output">');
                }

            });
        }
        $('#edit_form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('profile/edit'); ?>",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    cancel();
                }
            });
        });


        $('#cancel').hide();
        $('#simpan').hide();
        $('#edit').on('click', function() {
            $('input').removeAttr('disabled');
            $('textarea').removeAttr('disabled');
            $('#edit').hide();
            $('#cancel').show();
            $('#simpan').show();
        });
        $('#cancel').on('click', function() {
            $('input').attr("disabled", "disabled");
            $('textarea').attr("disabled", "disabled");
            $('#edit').show();
            $('#cancel').hide();
            $('#simpan').hide();
            show_data();
        });

        function cancel() {
            $('input').attr("disabled", "disabled");
            $('textarea').attr("disabled", "disabled");
            $('#edit').show();
            $('#cancel').hide();
            $('#simpan').hide();
            show_data();
        }
    });
</script>