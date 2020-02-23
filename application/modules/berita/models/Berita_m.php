<?php
class Berita_m extends CI_Model
{
    function __construct()
    {
        $this->table = 'berita';
        $this->nama_id = 'id_berita';
        $this->column_order = array(null, 'gambar', 'judul_berita', 'isi_berita');
        $this->column_search = array('judul_berita');
        $this->order = array('id_berita' => 'desc');
    }

    public function getRows($postData)
    {
        $this->_get_datatables_query($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function countAll()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function countFiltered($postData)
    {
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    private function _get_datatables_query($postData)
    {

        $this->db->from($this->table);

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($postData['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($postData['order'])) {
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function tambah()
    {
        $upload = $this->_uploadImage();
        $data = [
            'judul_berita' => htmlspecialchars($this->input->post('judul')),
            'isi_berita' => htmlspecialchars($this->input->post('isi')),
            'tanggal_berita' => date('Y/m/d'),
            'gambar' => $upload
        ];
        return $this->db->insert($this->table, $data);
    }
    function edit()
    {
        $id = $this->input->post('id');
        $gambar_lama = $this->input->post('gambarLama');
        if ($_FILES['gambar']['name']) {
            $upload = $this->_uploadImage();
            if ($gambar_lama != "noimage.png") {
                unlink("assets/img/" . $this->table . "/" . $gambar_lama . "");
            }
        } else {
            $upload = $gambar_lama;
        }
        $data = [
            'judul_berita' => htmlspecialchars($this->input->post('judul')),
            'isi_berita' => htmlspecialchars($this->input->post('isi')),
            'gambar' => $upload
        ];
        $this->db->where($this->nama_id, $id);
        $result = $this->db->update($this->table, $data);
        return $result;
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $inv = $this->db->query("SELECT gambar FROM $this->table WHERE $this->nama_id = $id")->row();
        if ($inv->gambar != 'noimage.png') {
            unlink("assets/img/" . $this->table . "/" . $inv->gambar . "");
        }
        $this->db->where($this->nama_id, $id);
        return $this->db->delete($this->table);
    }
    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/img/' . $this->table . '/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gbr = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/' . $this->table . '/' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '100%';
            $config['width'] = 800;
            $config['height'] = 800;
            $config['new_image'] = './assets/img/' . $this->table . '/' . $gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
