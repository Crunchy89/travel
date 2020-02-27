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
                        <br>
                        <hr>
                        <button type="button" id="edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</button>
                        <button type="button" id="cancel" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Cancel</button>
                        <button type="button" id="simpan" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Simpan</button>
                    </div>
                    <div class="card-body pad table-responsive">
                        <form id="edit_form">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nama">Nama Travel</label>
                                            <input type="text" name="nama" id="nama" class="form-control form-control-sm" required disabled>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="gambar" id="reset"><img class="img-fluid" src="<?= base_url() ?>assets/img/noimage.png" id="output" width="200"></label>
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
        $('#cancel').addClass('modal');
        $('#simpan').addClass('modal');

        $('#edit').on('click', function() {
            $('input').removeAttr('disabled');
            $('textarea').removeAttr('disabled');
            $('#edit').addClass('modal');
            $('#cancel').removeClass('modal');
            $('#simpan').removeClass('modal');
        });

        $('#cancel').on('click', function() {
            $('input').attr("disabled", "disabled");
            $('textarea').attr("disabled", "disabled");
            $('#edit').removeClass('modal');
            $('#cancel').addClass('modal');
            $('#simpan').addClass('modal');
        });
    });
</script>