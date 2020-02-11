<?php
class Berita_m extends CI_Model
{
    public function tampil()
    {
        return $this->db->get('berita')->result();
    }
    public function tambah()
    {
        $gambar = $this->_uploadImage();
        $date = date('Y/m/d');
        $data = [
            'judul_berita' => $this->input->post('judul'),
            'isi_berita' => $this->input->post('isi'),
            'gambar' => $gambar,
            'tanggal_berita' => $date
        ];
        return $this->db->insert('berita', $data);
    }
    public function edit()
    {
        $gambar_lama = $this->input->post('gambarLama');
        if ($_FILES["gambar"]["name"]) {
            $gambar = $this->_uploadImage();
            if ($gambar_lama != $gambar || $gambar_lama != "noimage.png") {
                unlink("assets/img/berita/$gambar_lama");
            }
        } else {
            $gambar = $gambar_lama;
        }
        $data = [
            'judul_berita' => $this->input->post('judul'),
            'isi_berita' => $this->input->post('isi'),
            'gambar' => $gambar
        ];
        $this->db->where('id_berita', $this->input->post('id'));
        return $this->db->update('berita', $data);
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $inv = $this->db->query("SELECT gambar FROM inventaris WHERE id_inv = $id")->row();
        if ($inv->gambar != 'noimage.png') {
            unlink("assets/img/berita/$inv->gambar");
        }
        $this->db->where('id_berita', $id);
        return $this->db->delete('berita');
    }
    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/img/berita/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
