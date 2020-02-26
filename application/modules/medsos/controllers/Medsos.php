<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medsos extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('medsos_model', 'model');
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
			$icon = '<i class="' . $member->icon . '"></i>';
			$btn_edit = '<a href="#" class="btn btn-warning btn-sm edit" data-icon_edit="' . $member->icon . '" data-link_edit="' . $member->link . '" data-id_medsos="' . $member->id_medsos . '"><i class="fas fa-fw fa-edit"></i> Edit</a>';
			$btn_hapus = '<a href="#" class="btn btn-danger btn-sm hapus"  data-id_medsos="' . $member->id_medsos . '"><i class="fas fa-fw fa-trash"></i> Hapus</a>';
			$data[] = array($i, $icon, $member->link, $btn_edit . ' ' . $btn_hapus);
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
