<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Promo</h1>
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
						<h3 class="card-title"><i class="fas fa-edit"></i>Promo</h3>
						<br>
						<hr>
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fas fa-plus"></i> Tambah</button>
					</div>
					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-sm w-100" id="myData">
							<thead class="thead-dark">
								<tr>
									<th>No</th>
									<th>Gambar</th>
									<th>Judul</th>
									<th>Deskripsi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody id="show_data">

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include "modal.php" ?>
<script>
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};
	var loadFileedit = function(event) {
		var output2 = document.getElementById('output2');
		output2.src = URL.createObjectURL(event.target.files[0]);
	};
	$(document).ready(function() {
		var siswa;
		siswa = $('#myData').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= site_url('promo/getLists'); ?>",
				"type": "POST"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false
			}]
		});
	});
	$(document).ready(function() {

		$('#form_tambah').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: "<?= site_url('promo/tambah'); ?>",
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(data) {
					$('#myData').DataTable().ajax.reload();
					$('#form_tambah')[0].reset();
					$('#reset').html('<img class="img-fluid" width="200px" src="<?= base_url() ?>assets/img/promo/noimage.png" id="output">');
					$('#Modal').modal('hide');
				}
			});
		});

		$('#myData').on('click', '.edit', function() {
			var judul = $(this).data('judul_edit');
			var isi = $(this).data('isi_edit');
			var gambar = $(this).data('gambar_edit');
			var id = $(this).data('id_promo');
			$('#Modal_edit').modal('show');
			$('#id_edit').val(id);
			$('#judul_edit').val(judul);
			$('#isi_edit').val(isi);
			$('#gambarLama').val(gambar);
			$('#hasil').html('<img class="img-fluid" width="200px" src="<?= base_url() ?>assets/img/promo/' + gambar + '" id="output2">');
		});

		$('#form_edit').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: "<?= site_url('promo/edit'); ?>",
				type: "post",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function(data) {
					$('#myData').DataTable().ajax.reload();
					$('#Modal_edit').modal('hide');
				}
			});
		});

		$('#myData').on('click', '.hapus', function() {
			var id = $(this).data('id_promo');
			$('#Modal_hapus').modal('show');
			$('#id_hapus').val(id);
		});
		$('#btn_hapus').on('click', function() {
			$.ajax({
				url: '<?= site_url('promo/delete') ?>',
				type: 'POST',
				data: $('#form_hapus').serialize(),
				dataType: 'json',
				success: function(data) {
					$('#myData').DataTable().ajax.reload();
					$('#Modal_hapus').modal('hide');
				}
			});
		});


	});
</script>