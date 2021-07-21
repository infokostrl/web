<?php

class Infokost_model extends CI_Model
{
    // get all data kost admin
    public function getAllAdmin()
    {
        return $this->db->get('kost')->result_array();
    }
    // get all data kost user

    public function getAllUser($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
        }
        return $this->db->get('kost', $limit, $start)->result_array();
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
        return $this->db->get('image')->result_array();
    }

    // function yang di gunakan pada tombol delete
    public function deleteImageByIdKost($id)
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
}
