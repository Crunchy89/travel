<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("berita_m");
	}
	public function index()
	{
		$data['title'] = 'Berita';
		admin_page('index', $data);
	}
	public function tampil()
	{
		$data = $this->berita_m->tampil();
		echo json_encode($data);
	}
	public function tambah()
	{
		$data = $this->berita_m->tambah();
		echo json_encode($data);
	}
	public function edit()
	{
		$data = $this->berita_m->edit();
		echo json_encode($data);
	}
	public function hapus()
	{
		$data = $this->berita_m->hapus();
		echo json_encode($data);
	}
}
