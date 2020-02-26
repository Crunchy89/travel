<?php
class Home_model extends CI_Model
{
    function data()
    {
        $data = [
            'promo' => $this->db->query("SELECT * FROM promo ORDER BY id_promo DESC")->result(),
            'berita' => $this->db->query("SELECT * FROM berita ORDER BY id_berita DESC")->result(),
        ];
        return $data;
    }
}
