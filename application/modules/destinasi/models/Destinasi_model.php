<?php
class Destinasi_model extends CI_Model
{
    function __construct()
    {
        $this->table = 'destinasi';
        $this->id = 'id_destinasi';
        $this->column_order = array(null, 'nama_destinasi');
        $this->column_search = array('nama_destinasi');
        $this->order = array('nama_destinasi' => 'asc');
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
        $data = [
            'nama_destinasi' => htmlspecialchars($this->input->post('nama')),
            'foto' => $this->_uploadImage()
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
                unlink("assets/img/foto/" . $gambar_lama . "");
            }
        } else {
            $upload = $gambar_lama;
        }
        $data = [
            'nama_destinasi' => htmlspecialchars($this->input->post('nama')),
            'foto' => $upload
        ];
        $this->db->where($this->id, $id);
        $result = $this->db->update($this->table, $data);
        return $result;
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where($this->id, $id);
        return $this->db->delete($this->table);
    }
    public function getData($id)
    {
        $result = $this->db->get_where('gambar_destinasi', ['id_destinasi' => $id])->result();
        return $result;
    }
    public function tambah_gambar($id)
    {
        $hit = count($_FILES['gambar']['name']);
        if ($_FILES['gambar']['name']) {
            $config['upload_path']          = 'assets/img/' . $this->table . '/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            for ($i = 0; $i < $hit; $i++) {
                $_FILES['foto']['name'] = $_FILES['gambar']['name'][$i];
                $_FILES['foto']['type'] = $_FILES['gambar']['type'][$i];
                $_FILES['foto']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                $_FILES['foto']['error'] = $_FILES['gambar']['error'][$i];
                $_FILES['foto']['size'] = $_FILES['gambar']['size'][$i];
                if ($this->upload->do_upload('foto')) {
                    $nama = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/' . $this->table . '/' . $nama['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '100%';
                    $config['width'] = 800;
                    $config['height'] = 1000;
                    $config['new_image'] = './assets/img/' . $this->table . '/' . $nama['file_name'];
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();

                    $data = [
                        'gambar' => $this->upload->data('file_name'),
                        'id_destinasi' => $id
                    ];
                }
                $arr[] = $this->db->insert('gambar_destinasi', $data);
            }
            return $arr;
        }
    }
    public function hapus_gambar()
    {
        $result = $this->input->post('id');
        foreach ($result as $row) {
            $nama = $this->db->get_where('gambar_destinasi', ['id_gambar' => $row])->row();
            unlink("assets/img/" . $this->table . "/" . $nama->gambar . "");
            $this->db->where('id_gambar', $row);
            $data[] = $this->db->delete('gambar_destinasi');
        }
        return $data;
    }
    public function hapus_semua($id)
    {
        $data = $this->db->get_where('gambar_destinasi', ['id_destinasi' => $id])->result();
        foreach ($data as $d) {
            unlink("assets/img/" . $this->table . "/" . $d->gambar . "");
        }
        $this->db->where('id_destinasi', $id);
        $result = $this->db->delete('gambar_destinasi');
        return $result;
    }
    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $gbr = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/img/foto/' . $gbr['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '100%';
            $config['width'] = 800;
            $config['height'] = 1000;
            $config['new_image'] = './assets/img/foto/' . $gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            return $this->upload->data("file_name");
        }
        return "noimage.png";
    }
}
