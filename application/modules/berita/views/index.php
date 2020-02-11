<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?= $title ?></h1>
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
						<div class="float-right"><button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button></div>
					</div>
					<div class="card-body pad table-responsive">
						<table id="user_data" class="table table-bordered table-striped" style="width: 100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Gambar</th>
									<th>Judul Berita</th>
									<th>Tanggal Upload</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
						</table>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
</section>


<div class="toast" role="alert" id="success" aria-live="assertive" aria-atomic="true" data-delay="5000">
	<div class="toast-header">
		<strong class="mr-auto">Bootstrap</strong>
		<small class="text-muted">just now</small>
		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="toast-body">
	</div>
</div>



<div class="modal fade bd-example-modal-xl" data-backdrop="static" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tulis Berita</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="berita_form" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-9">
							<div class="form-group">
								<label>Judul Berita</label>
								<input type="text" name="judul" id="judul" class="form-control">
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
					<input type="hidden" name="id_berita" id="id_berita">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<input type="submit" class="btn btn-primary" name="action" id="action" value="Tambah">
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" language="javascript">
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
	};

	$(document).ready(function() {
		$('#add_button').click(function() {
			$('#berita_form')[0].reset();
			$('.modal-title').text("Tulis Berita");
			$('#action').val("Tambah");
			$('#gambar').html('');
		})

		var dataTable = $('#user_data').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "<?= site_url('berita/fetch_user'); ?>",
				type: "POST"
			},
			"columnDefs": [{
				"targets": [0, 3, 4],
				"orderable": false,
			}, ],
		});

		$(document).on('submit', '#berita_form', function(event) {
			event.preventDefault();
			var judul_berita = $('#judul').val();
			var isi_berita = CKEDITOR.instances['ckeditor'].getData();
			var extension = $('#gambar').val().split('.').pop().toLowerCase();
			if (extension != '') {
				if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
					alert("Invalid Image File");
					$('#gambar').val('');
					return false;
				}
			}
			if (judul_berita != '' && isi_berita != '') {
				$.ajax({
					url: "<?= site_url('berita/user_action') ?>",
					method: 'POST',
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(data) {
						$('#berita_form')[0].reset();
						$('#userModal').modal('hide');
						$('.toast').toast('show');
						$('.toast-body').html(data);
						dataTable.ajax.reload();
					}
				});
			} else {
				alert("Bother Fields are Required");
			}
		});
		$(document).on('click', '.update', function() {
			var id_berita = $(this).attr("id");
			$.ajax({
				url: "<?= site_url('berita/fetch_single_user'); ?>",
				method: "POST",
				data: {
					id_berita: id_berita
				},
				dataType: "json",
				success: function(data) {
					$('#userModal').modal('show');
					$('#judul').val(data.judul_berita);
					CKEDITOR.instances['ckeditor'].setData(data.isi_berita);
					$('.modal-title').text("Edit User");
					$('#id_berita').val(id_berita);
					$('#output').html(data.gambar);
					$('#action').val("Edit");
				}
			})
		});
	});
</script>