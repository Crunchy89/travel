<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Berita extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_m', 'model');
	}
	function index()
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
			$gambar = "<img src='" . base_url('assets/img/berita/') . $member->gambar . "' width='100px'>";
			$btn_edit = '<a href="#" class="btn btn-warning btn-sm edit" data-gambar_edit="' . $member->gambar . '" data-judul_edit="' . $member->judul_berita . '" data-isi_edit="' . $member->isi_berita . '" data-id_berita="' . $member->id_berita . '"><i class="fas fa-fw fa-edit"></i> Edit</a>';
			$btn_hapus = '<a href="#" class="btn btn-danger btn-sm hapus"  data-id_berita="' . $member->id_berita . '"><i class="fas fa-fw fa-trash"></i> Hapus</a>';
			$data[] = array($i, $gambar, $member->judul_berita, $member->tanggal_berita, $btn_edit . ' ' . $btn_hapus);
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
