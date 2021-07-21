<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index()
    {
        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url'] = 'http://localhost/web/home/index/';

        $this->db->like('name', $data['keyword']);
        $this->db->from('kost');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 3;



        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);

        $data['title'] = 'Welcome To InfoKost Romang Lompoa';
        // $data['infokost'] = $this->Infokost_model->getAllUser($config['per_page'], $data['start'], $data['keyword']);

        $data['flatlist'] = $this->User_model->innerJoin($config['per_page'], $data['start'], $data['keyword']); //mengambil data hasil join 2 tabel berdasarkan main_kostnya dan limitnya
        $data['longlat'] = $this->User_model->longLat();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id)
    {


        $data['title'] = 'Detail Kost';
        $data['detailkost'] = $this->User_model->getById($id);
        $data['carousel'] = $this->User_model->carouselMain($id);
        $data['carouselAll'] = $this->User_model->carouselAll($id);

        $this->load->view('templates/header', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('templates/footer');
    }
}
