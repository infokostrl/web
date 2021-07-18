<?php

class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        $this->load->view('admin/upload_form', array('error' => ' '));
    }

    public function do_upload()
    {
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/upload_form', $error);
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];

            $data = [
                'judul' => $gambar
            ];

            $this->db->insert('test', $data);
        }
    }
}
