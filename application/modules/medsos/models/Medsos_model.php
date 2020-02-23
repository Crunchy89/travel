<?php
class Medsos_model extends CI_Model
{
    function __construct()
    {
        $this->table = 'medsos';
        $this->nama_id = 'id_medsos';
        $this->column_order = array(null, 'icon', 'link');
        $this->column_search = array('icon');
        $this->order = array($this->nama_id => 'desc');
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
            'icon' => htmlspecialchars($this->input->post('icon')),
            'link' => htmlspecialchars($this->input->post('link'))
        ];
        return $this->db->insert($this->table, $data);
    }
    function edit()
    {
        $id = $this->input->post('id');
        $data = [
            'icon' => htmlspecialchars($this->input->post('icon')),
            'link' => htmlspecialchars($this->input->post('link'))
        ];
        $this->db->where($this->nama_id, $id);
        $result = $this->db->update($this->table, $data);
        return $result;
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where($this->nama_id, $id);
        return $this->db->delete($this->table);
    }
}
