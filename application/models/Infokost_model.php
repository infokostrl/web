<?php

class Infokost_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('kost')->result_array();
    }
}
