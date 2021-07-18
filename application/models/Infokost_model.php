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
    public function upload_image($data)
    {
        $this->db->insert('image', $data);
    }
    public function innerJoin()
    {
        $this->db->select('
            kost.*, image.image_name
        ');
        $this->db->from('kost');
        $this->db->join('image', 'kost.id=image.id_kost', 'left outer');
        $this->db->order_by('kost.id');
        return $this->db->get()->result_array();
    }
    public function getAllImage()
    {
        return $this->db->get('image')->result_array();
    }
}
