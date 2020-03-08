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
}
