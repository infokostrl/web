<?php
class User_model extends CI_Model
{


    // function to get all relation off 2 table (kost & image)
    public function innerJoin($limit, $start, $keyword = null)
    {
        $arr = array('main_image' => 1);

        if ($keyword) {
            $this->db->like('name', $keyword);
        }

        $this->db->select('
            kost.*, image.image_name
        ');
        $this->db->from('kost');
        $this->db->join('image', 'kost.id=image.id_kost', 'inner');
        $this->db->where($arr);
        $this->db->limit($limit, $start);
        $this->db->order_by('kost.id');
        return $this->db->get()->result_array();
    }


    // Function Long lat
    public function longLat()
    {
        $this->db->select('id, name, longlat, link');
        $this->db->from('kost');
        return $this->db->get()->result_array();
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


    // get kost by id   
    public function getById($id)
    {
        return $this->db->get_where('kost', ['id' => $id])->row_array();
    }
}
