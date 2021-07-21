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
    public function index()
    {
        $this->load->model('Infokost_model');

        $data['title'] = 'Welcome To InfoKost Romang Lompoa';
        $data['infokost'] = $this->Infokost_model->getAll();
        $data['flatlist'] = $this->Infokost_model->innerJoin();
        $data['longlat'] = $this->Infokost_model->longLat();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id)
    {
        $this->load->model('Infokost_model');

        $data['title'] = 'Detail Kost';
        $data['detailkost'] = $this->Infokost_model->getById($id);
        $data['carousel'] = $this->Infokost_model->carouselMain($id);
        $data['carouselAll'] = $this->Infokost_model->carouselAll($id);

        $this->load->view('templates/header', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('templates/footer');
    }
}