<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>List Berita</h1>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title">
							Berita
						</h3>
						<div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><i class="fas fa-plus"></i> Add New</a></div>
					</div>
					<div class="card-body pad table-responsive">
						<table class="table table-bordered text-center" id="tabel_berita">
							<thead>
								<tr>
									<th>No</th>
									<th>Judul Berita</th>
									<th>Gambar</code></th>
									<th>Tanggal Upload</code></th>
									<th>Aksi</code></th>
								</tr>
							</thead>
							<tbody id="data_berita">

							</tbody>
						</table>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
</section>

<div class="modal fade bd-example-modal-xl" data-backdrop="static" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tulis Berita</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="berita_tambah">
				<div class="modal-body">
					<div class="row">
						<div class="col-9">
							<div class="form-group">
								<label>Judul Berita</label>
								<input type="text" name="judul" class="form-control">
							</div>
							<div class="form-group">
								<label>Isi Berita</label>
								<textarea name="isi" id="ckeditor" class="ckeditor"></textarea>
							</div>
						</div>
						<div class="col-3">
							<div class="form-group">
								<label for="gambar">Sampul Berita</label>
								<label for="gambar"><img src="<?= base_url('assets/img/noimage.png') ?>" width="100%" height="200px" id="output" class="img-thumbnail rounded"></label>
							</div>
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
									<label class="custom-file-label" for="exampleInputFile" id="file">Choose file</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="button" class="btn btn-primary" id="btn_tambah">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
	var loadFile = function(event) {
		document.getElementById("file").innerHTML = document.getElementById("gambar").value;
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
	$(document).ready(function() {
		show_product(); //call function show all product

		$('#tabel_berita').dataTable();

		//function show all product
		function show_product() {
			$.ajax({
				type: 'ajax',
				url: '<?php echo site_url('berita/tampil') ?>',
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<tr>' +
							'<td>' + parseInt(i + 1) + '</td>' +
							'<td>' + data[i].judul_berita + '</td>' +
							'<td>' + data[i].gambar + '</td>' +
							'<td>' + data[i].tanggal_berita + '</td>' +
							'<td style="text-align:right;">' +
							'<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="' + data[i].id_berita + '" data-judul="' + data[i].judul_berita + '" data-gambar="' + data[i].gambar + '">Edit</a>' + ' ' +
							'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="' + data[i].id_beri + '">Delete</a>' +
							'</td>' +
							'</tr>';
					}
					$('#data_berita').html(html);
				}

			});
		}
	});

	$('#btn_tambah').on('click', function() {
		$.ajax({
			url: '<?= site_url('berita/tambah') ?>',
			type: 'POST',
			data: $('#siswa').serialize(),
			dataType: 'json',
			success: function(data) {
				$('#mydata').DataTable().ajax.reload();
				$('[name="nama_save"]').val("");
				$('[name="alamat_save"]').val("");
				$('#Modal_Add').modal('hide');
			}
		});
	});

	$('#mydata').on('click', '.edit', function() {
		var nama = $(this).data('nama_edit');
		var alamat = $(this).data('alamat_edit');
		var id = $(this).data('id_siswa');
		$('#Modal_Edit').modal('show');
		$('#nama_edit').val(nama);
		$('#alamat_edit').val(alamat);
		$('#id_edit').val(id);
	});

	$('#btn_edit').on('click', function() {
		$.ajax({
			url: '<?= site_url('home/edit') ?>',
			type: 'POST',
			data: $('#siswa_edit').serialize(),
			dataType: 'json',
			success: function(data) {
				$('#mydata').DataTable().ajax.reload();
				$('#Modal_Edit').modal('hide');
			}
		});
	});

	$('#mydata').on('click', '.hapus', function() {
		var id = $(this).data('id_siswa');
		$('#Modal_hapus').modal('show');
		$('#id_hapus').val(id);
	});
	$('#btn_hapus').on('click', function() {
		$.ajax({
			url: '<?= site_url('home/hapus') ?>',
			type: 'POST',
			data: $('#siswa_hapus').serialize(),
			dataType: 'json',
			success: function(data) {
				$('#mydata').DataTable().ajax.reload();
				$('#Modal_hapus').modal('hide');
			}
		});
	});
</script>