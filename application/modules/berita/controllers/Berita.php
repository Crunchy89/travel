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
		$data["title"] = "List Berita";
		admin_page('index', $data);
	}
}
