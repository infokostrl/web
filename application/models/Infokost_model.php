<?php

class Infokost_model extends CI_Model
{
    // get all data kost
    public function getAll()
    {
        return $this->db->get('kost')->result_array();
    }
    // get kost by id   
    public function getById($id)
    {
        return $this->db->get_where('kost', ['id' => $id])->row_array();
    }

    // function to store data into table kost
    public function store($data)
    {
        $this->db->insert('kost', $data);
    }

    // function to uploadimage
    public function upload_image($data)
    {
        $this->db->insert('image', $data);
    }

    // function to get all relation off 2 table
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

    // function to get all image from table image
    public function getAllImage()
    {
        return $this->db->get('image')->result_array();
    }

    // function to destroy data kost
    public function destroy($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kost');
    }

    // function to destroy data img form table image
    public function destroyimg($id)
    {
        $this->db->where('id_kost', $id);
        return $this->db->delete('image');
    }

    // function to get all image by id kost
    public function getImageByIdKost($id)
    {
        $this->db->where('id_kost', $id);
        return $this->db->get('image')->row_array();
    }

    // function to update data kost
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
