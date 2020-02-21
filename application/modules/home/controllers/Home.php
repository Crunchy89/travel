<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function index()
	{
		front_page('index');
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
