<?php
class Profile_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'profile';
        $this->id = 'id_profile';
    }
    public function getData()
    {
        return $this->db->get_where($this->table, [$this->id => 1])->row();
    }
    public function edit()
    {
        $gambar_lama = $this->input->post('gambarLama');
        if ($_FILES['gambar']['name']) {
            $upload = $this->_uploadImage();
            if ($gambar_lama != "noimage.png") {
                unlink("assets/img/" . $gambar_lama . "");
            }
        } else {
            $upload = $gambar_lama;
        }
        $data = [
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'email' => htmlspecialchars($this->input->post('email')),
            'logo' => $upload,
            'no_wa' => htmlspecialchars($this->input->post('wa')),
            'no_kantor' => htmlspecialchars($this->input->post('nohp')),
            'about' => htmlspecialchars($this->input->post('tentang')),
            'nama' => htmlspecialchars($this->input->post('nama'))
        ];
        $this->db->where($this->id, 1);
        return $this->db->update($this->table, $data);
    }
    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gbr = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '100%';
            $config['width'] = 100;
            $config['height'] = 100;
            $config['new_image'] = './assets/img/' . $gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
