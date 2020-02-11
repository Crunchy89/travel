<?php
class Berita_m extends CI_Model
{
    var $table = "berita";
    var $select_column = array("id_berita", "judul_berita", "isi_berita", "gambar", "tanggal_berita");
    var $order_column = array("id_berita", "judul_berita", 'isi_berita', "gambar", "tanggal_berita");
    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        if (isset($_POST["search"]["value"])) {
            $this->db->like("judul_berita", $_POST["search"]["value"]);
            $this->db->or_like("tanggal_berita", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_berita', 'DESC');
        }
    }
    function make_datatables()
    {
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function insert_crud($data)
    {
        $this->db->insert('berita', $data);
    }
    function fetch_single_user($id_berita)
    {
        $this->db->where("id_berita", $id_berita);
        $query = $this->db->get('berita');
        return $query->result();
    }
    function update_crud($id_berita, $data)
    {
        $this->db->where("id_berita", $id_berita);
        $this->db->update("berita", $data);
    }
}
