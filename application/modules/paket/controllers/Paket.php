<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('paket_model', 'model');
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
			$foto = "<img src='" . base_url('assets/img/tour/') . $member->gambar . "' width='100px' alt='gambar'>";
			$upload = "<a href='" . site_url('paket/destinasi/') . $member->id_tour . "' class='btn btn-info' ><i class='fas fa-fw fa-eye'></i> Destinasi Tour</a>";
			$btn_edit = '<a href="#" class="btn btn-warning edit"  data-nama_tour_edit="' . $member->nama_tour . '" data-id_tour_edit="' . $member->id_tour . '" data-gambar_lama="' . $member->gambar . '"><i class="fas fa-fw fa-pen"></i> Edit</a>';
			$btn_hapus = '<a href="#" class="btn btn-danger hapus"  data-id_tour="' . $member->id_tour . '"><i class="fas fa-fw fa-trash"></i> Hapus</a>';
			$data[] = array($i, $member->nama_tour, $foto, $upload, $btn_edit . ' ' . $btn_hapus);
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
}
