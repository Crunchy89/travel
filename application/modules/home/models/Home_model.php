<?php
class Home_model extends CI_Model
{
    function promo()
    {
        $hasil = $this->db->get('promo');
        return $hasil->result();
    }
}
