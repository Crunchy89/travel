<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Destinasi extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('destinasi_model', 'model');
	}
	public function index()
	{
		admin_page('index');
	}
	function getLists()
	{
		$data = array();

		// Fetch member's records
		$memData = $this->model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($memData as $member) {
			$i++;
			$upload = "<a href='" . site_url('destinasi/galeri/') . $member->id_destinasi . "' class='btn btn-info' ><i class='fas fa-fw fa-eye'></i> Galeri</a>";
			$btn_edit = '<a href="#" class="btn btn-warning edit"  data-nama_destinasi_edit="' . $member->nama_destinasi . '" data-id_destinasi="' . $member->id_destinasi . '"><i class="fas fa-fw fa-pen"></i> Edit</a>';
			$btn_hapus = '<a href="#" class="btn btn-danger hapus"  data-id_destinasi="' . $member->id_destinasi . '"><i class="fas fa-fw fa-trash"></i> Hapus</a>';
			$data[] = array($i, $member->nama_destinasi, $upload, $btn_edit . ' ' . $btn_hapus);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model->countAll(),
			"recordsFiltered" => $this->model->countFiltered($_POST),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function tambah()
	{
		$result = $this->model->tambah();

		echo json_encode($result);
	}
	public function edit()
	{
		$result = $this->model->edit();

		echo json_encode($result);
	}

	public function delete()
	{
		$result = $this->model->delete();
		echo json_encode($result);
	}
	public function galeri()
	{
		admin_page('galeri');
	}
	public function getData($id)
	{
		$result = $this->model->getData($id);
		echo json_encode($result);
	}
	public function tambah_gambar($id)
	{
		$result = $this->model->tambah_gambar($id);
		echo json_encode($result);
	}
	public function hapus_gambar()
	{
		$result = $this->model->hapus_gambar();
		echo json_encode($result);
	}
	public function hapus_semua($id)
	{
		$result = $this->model->hapus_gambar($id);
		echo json_encode($result);
	}
}
