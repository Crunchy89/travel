<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model', 'model');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data = $this->model->data();
		front_page('index', $data);
	}
	public function getDataIndex()
	{
		$data = $this->model->data();
		echo json_encode($data);
	}
	public function about()
	{
		front_page('about');
	}
	public function place()
	{
		front_page('place');
	}
	public function tour()
	{
		front_page('tour');
	}
	public function news()
	{
		front_page('news');
	}
	public function contact()
	{
		front_page('contact');
	}
}
