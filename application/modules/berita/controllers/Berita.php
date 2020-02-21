<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Berita extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_m');
	}
	//functions  
	function index()
	{
		$data["title"] = "List Berita";
		admin_page('index', $data);
	}
	function fetch_user()
	{
		$fetch_data = $this->berita_m->make_datatables();
		$data = array();
		$i = 1;
		foreach ($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $i++;
			$sub_array[] = '<img src="' . base_url() . 'assets/img/berita/' . $row->gambar . '" class="img-thumbnail" width="50" height="35" />';
			$sub_array[] = $row->judul_berita;
			$sub_array[] = date('d - M - Y', strtotime($row->tanggal_berita));
			$sub_array[] = '<button type="button" name="update" id="' . $row->id_berita . '" class="btn btn-warning btn-xs update">Update</button>';
			$sub_array[] = '<button type="button" name="delete" id="' . $row->id_berita . '" class="btn btn-danger btn-xs delete">Delete</button>';
			$data[] = $sub_array;
		}
		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->berita_m->get_all_data(),
			"recordsFiltered"     =>     $this->berita_m->get_filtered_data(),
			"data"                    =>     $data
		);
		echo json_encode($output);
	}
	public function user_action()
	{
		if ($this->input->post("action") == "Tambah") {
			$insert_data = array(
				'judul_berita' => $this->input->post('judul'),
				'isi_berita' => $this->input->post("isi"),
				'gambar' => $this->upload_image(),
				'tanggal_berita' => date('Y/m/d')
			);
			$this->berita_m->insert_crud($insert_data);
			echo 'Data Inserted';
		}
		if ($this->input->post("action") == "Edit") {
			$gambar = '';
			if ($_FILES["user_image"]["name"] != '') {
				$gambar = $this->upload_image();
			} else {
				$gambar = $this->input->post("hidden_user_image");
			}
			$updated_data = array(
				'judul_berita' => $this->input->post('judul'),
				'isi_berita' => $this->input->post('isi'),
				'gambar' => $gambar
			);
			$this->berita_m->update_crud($this->input->post("id_berita"), $updated_data);
			echo 'Data Updated';
		}
	}
	function upload_image()
	{
		if (isset($_FILES["user_image"])) {
			$extension = explode('.', $_FILES['user_image']['name']);
			$new_name = rand() . '.' . $extension[1];
			$destination = './assets/img/berita/' . $new_name;
			move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
			return $new_name;
		}
	}
	function fetch_single_user()
	{
		$output = array();
		$data = $this->berita_m->fetch_single_user($this->input->post("id_berita"));
		foreach ($data as $row) {
			$output['judul_berita'] = $row->judul_berita;
			$output['isi_berita'] = $row->isi_berita;
			if ($row->gambar != '') {
				$output['gambar'] = '<img src="' . base_url() . 'assets/img/berita/' . $row->gambar . '" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="' . $row->gambar . '" />';
			} else {
				$output['gambar'] = '<input type="hidden" name="hidden_user_image" value="" />';
			}
		}
		echo json_encode($output);
	}
}
