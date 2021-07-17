<?php

class Infokost_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('kost')->result_array();
    }
    public function getById($id)
    {
        return $this->db->get_where('kost', ['id' => $id])->row_array();
    }
    public function store($data)
    {
        $this->db->insert('kost', $data);
    }
}
