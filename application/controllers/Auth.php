<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
    public function login()
    {
        $data['title'] = 'Login Page';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email is not valid!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['pass'])) {
                $data = [
                    'email' => $user['email'],
                    'name' => $user['name']
                ];

                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Email is not Register. Please Register!</div>');
            redirect('auth/login');
        }
    }
    public function registration()
    {
        $data['title'] = 'Registration Page';

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email]', [
            'is_unique' => 'Email Already Registered!',
            'valid_email' => 'Email is not valid!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth/footer');
        } else {
            $data = [
                'email' => htmlspecialchars($this->input->post('email', true)),
                'pass' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'img' => 'default.jpg'
            ];

            $this->db->insert('admin', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Account Have Been Register. Please Login!</div>');
            redirect('auth/login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have Been Logged out!</div>');
        redirect('auth/login');
    }
}
