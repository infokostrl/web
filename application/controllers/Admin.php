<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->model('Infokost_model');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';

        $data['kosts'] = $this->Infokost_model->getAll();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin/footer');
    }
    public function create()
    {
        $data['title'] = 'Create New Data';

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|required|numeric');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('description', 'Desctription', 'trim|required');
        $this->form_validation->set_rules('longlat', 'Lonlat', 'trim|required');
        $this->form_validation->set_rules('link', 'Link', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/create');
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'contact' => $this->input->post('contact'),
                'address' => $this->input->post('address'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description'),
                'longlat' => $this->input->post('longlat'),
                'link' => $this->input->post('link')
            ];
            $this->Infokost_model->store($data);
            redirect('admin');
        }
    }
}
