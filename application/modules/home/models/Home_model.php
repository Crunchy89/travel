<?php
class Home_model extends CI_Model
{
    function data()
    {
        $data = [
            'promo' => $this->db->query("SELECT * FROM promo ORDER BY id_promo DESC limit 3")->result(),
            'berita' => $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC limit 3")->result(),
            'destinasi' => $this->db->query("SELECT * FROM destinasi ORDER BY id_destinasi DESC limit 3")->result()
        ];
        return $data;
    }
}
