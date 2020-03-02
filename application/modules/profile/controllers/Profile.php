<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model', 'model');
	}

	public function index()
	{
		admin_page('index');
	}
	public function getData()
	{
		$result = $this->model->getData();
		echo json_encode($result);
	}
	public function edit()
	{
		$result = $this->model->edit();
		echo json_encode($result);
	}
}
