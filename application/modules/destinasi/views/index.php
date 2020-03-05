<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Destinasi</h1>
			</div>
		</div>
	</div>
</div>


<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-edit"></i>
							Destinasi
						</h3>
						<br>
						<hr>
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modal"><i class="fas fa-plus"></i> Tambah</button>
					</div>
					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-sm" id="myData" width="100%">
							<thead class="thead-dark">
								<tr>
									<th>No</th>
									<th>Destinasi</th>
									<th>Foto Destinasi</th>
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
	$(document).ready(function() {
		var siswa;
		siswa = $('#myData').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= site_url('destinasi/getLists'); ?>",
				"type": "POST"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false
			}]
		});
	});
	$('#form_tambah').submit(function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?= site_url('destinasi/tambah'); ?>",
			type: "post",
			data: new FormData(this),
			processData: false,
			contentType: false,
			cache: false,
			async: false,
			success: function(data) {
				$('#myData').DataTable().ajax.reload();
				$('#form_tambah')[0].reset();
				$('#Modal').modal('hide');
			}
		});
	});

	$('#myData').on('click', '.edit', function() {
		var id = $(this).data('id_destinasi');
		var nama = $(this).data('nama_destinasi_edit');
		$('#Modal_edit').modal('show');
		$('#nama_edit').val(nama);
		$('#id_edit').val(id);
	});

	$('#form_edit').submit(function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?= site_url('destinasi/edit'); ?>",
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
		var id = $(this).data('id_destinasi');
		$('#Modal_hapus').modal('show');
		$('#id_hapus').val(id);
	});
	$('#btn_hapus').on('click', function() {
		$.ajax({
			url: '<?= site_url('destinasi/delete') ?>',
			type: 'POST',
			data: $('#form_hapus').serialize(),
			dataType: 'json',
			success: function(data) {
				$('#myData').DataTable().ajax.reload();
				$('#Modal_hapus').modal('hide');
			}
		});
	});
</script>