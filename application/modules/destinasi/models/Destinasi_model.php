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
            'nama_destinasi' => htmlspecialchars($this->input->post('nama'))
        ];
        return $this->db->insert($this->table, $data);
    }
    function edit()
    {
        $id = $this->input->post('id');
        $data = [
            'nama_destinasi' => htmlspecialchars($this->input->post('nama'))
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
            $output = 'noimage.png';
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
                    $data = [
                        'gambar' => $nama['file_name'],
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
        echo json_encode($data);
    }
    public function hapus_semua($id)
    {
        $data = $this->db->get_where('gambar_destinasi', ['id_destinasi' => $id])->result();
        foreach ($data as $d) {
            unlink("assets/img/" . $this->table . "/" . $d->gambar . "");
        }
        $this->db->where('id_destinasi', $id);
        $result = $this->db->delete('gambar_destinasi');
        echo json_encode($result);
    }
}
