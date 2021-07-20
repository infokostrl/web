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
    public function destroy($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kost');
    }
    public function destroyimg($id)
    {
        $this->db->where('id_kost', $id);
        return $this->db->delete('image');
    }
    public function getImageByIdKost($id)
    {
        $this->db->where('id_kost', $id);
        return $this->db->get('image')->result_array();
    }
    public function update($data)
    {
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('kost', $data);
    }

    // Carousel
    public function carouselMain($id)
    {
        $arr = array('id_kost' => $id, 'main_image' => 1);
        $this->db->where($arr);
        return $this->db->get('image')->row_array();
    }

    public function carouselAll($id)
    {
        $arr = array('id_kost' => $id, 'main_image' => 0);
        $this->db->where($arr);
        return $this->db->get('image')->result_array();
    }
}