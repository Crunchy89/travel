<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('promo_model', 'model');
	}
	public function index()
	{
		admin_page('index');
	}
	function getLists()
	{
		$data = array();
		$memData = $this->model->getRows($_POST);
		$i = $_POST['start'];
		foreach ($memData as $member) {
			$i++;
			$gambar = "<img src='" . base_url('assets/img/promo/') . $member->gambar . "' width='100px'>";
			$btn_edit = '<a href="#" class="btn btn-warning btn-sm edit" data-gambar_edit="' . $member->gambar . '" data-judul_edit="' . $member->judul . '" data-isi_edit="' . $member->isi . '" data-id_promo="' . $member->id_promo . '"><i class="fas fa-fw fa-edit"></i> Edit</a>';
			$btn_hapus = '<a href="#" class="btn btn-danger btn-sm hapus"  data-id_promo="' . $member->id_promo . '"><i class="fas fa-fw fa-trash"></i> Hapus</a>';
			$data[] = array($i, $gambar, $member->judul, $member->isi, $btn_edit . ' ' . $btn_hapus);
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
