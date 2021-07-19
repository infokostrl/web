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

        if ($this->session->userdata('email') == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Login!</div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        /* 
        method index menampilkan semua data kost dengan semua gambarnya...
        */
        $data['title'] = 'Dashboard';

        // untuk mengambil data pada database berdasarkan data yang ada di session(yang dikirim dari login)
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();


        $data['kosts'] = $this->Infokost_model->getAll();
        $data['joins'] = $this->Infokost_model->innerJoin();
        $data['images'] = $this->Infokost_model->getAllImage();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin/footer');

        /* 
        Penjelasan mengenai file index

        1. melakukan foreach data kosts untuk menambilkan semua data kost pada tabel
        2. kemudian melakukan perulangan(foreach) pada tag img untuk melooping semua gambar pada satu tempat kolom. karena jika tidak melakukan looping pada img maka data kostnya akan menduplikat sesuai jumlah fotonya. 
        3. kemudian diberikan kondisi apakah field id_kost pada tabel image sama dengan field id pada tabel kost. hal ini dilakukan agar gambar yang di tampilakn sesuai dengan kostnya secara spesifik
        4. kumudian diberikan lagi kondisi apakah main_kost == 1. hal ini di lakukan agar menampilkan 1 foto saja pada tabel yaitu yang merupakan main image
        */
    }
    public function create()
    {
        /* 
        
        method create ini berfungsi menampilkan form tambah data kost sekaligus melakukan proses upload data ke database
        
        */
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
            /* sebenarnya data ini bisa di siapkan di dalam model  */
            $data = [
                'name' => $this->input->post('name', true),
                'contact' => $this->input->post('contact', true),
                'address' => $this->input->post('address', true),
                'price' => $this->input->post('price', true),
                'description' => $this->input->post('description', true),
                'longlat' => $this->input->post('longlat', true),
                'link' => $this->input->post('link', true)
            ];
            $this->Infokost_model->store($data);
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            redirect('admin');
        }
    }
    public function upload_image($id)
    {
        /* 
        method upload image ini berfungsi menampilkan form tambah gambar dengan mengambil id dari salah satu data kost yang nantinya digunakan untuk menambahkan gambar spesifik untuk data kost tersebut
        */
        $data['title'] = 'Add New Image';

        $data['id_kost'] = $id;



        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/upload_image', $data);
        $this->load->view('templates/admin/footer');
    }
    public function do_upload()
    {
        // $this->form_validation->set_rules('id_kost', 'id_kost', 'required');
        // $this->form_validation->set_rules('level', 'Level', 'required');
        // $this->form_validation->set_rules('userfile', 'Userfile', 'required');

        /* 
        method do_upload ini melakukan proses upload gambar ke database 
        */

        /* 
        
        1. baris di bawah ini merupakan config yang digunakan untuk proses upload file....
        2. Ingat path yang digunakan harus di ubah permissionnya jadi excutable
        3. library('upload') merupakan ketentuan dari CI
        4. library kemudian digunakan seperti => $this->upload->do_upload('userfile);
        5. 'userfile' itu berasal dari name pada form inputan
        6. (penjelasan if else) kondisi pertama apabaila proses pilih gambar(jadi apakah ada gambar yang di pilih atau tidak) $this->upload->do_upload('userfile) gagal atau bernilai false maka akan di tampilkan error. tapi sebenarnya error tersebut belum fix. nah trik yang saya gunakan untuk mencegah kondisi tersebut adalah dengan memberikan required pada form input. sehingga form tidak akan berfungsi jika inputannya kosong.
        7. (penjelasan if else) ketika ada foto yang di select maka akan di lakukan upload->data(). data() ini merupakan ketentuan dari CI. lalu kumudian di simpan ke dalam variabel image. karena mungkin berntuk data dari variabel image tersebut adalah array. maka untuk mengambil nama file di gunakan $image['file_name'] kemudian di simpan ke dalam variabel. nnatinya untuk di simpan ke database.
        8. menyiapkan data yang bersisi id_kost dari inputan dgn name id_kost, main_image dari inpuutan dgn main level dan image_name dari variabel $image
        9. lalu kemudian memanggil model method upload_image dengan mengirimkan data
        10. pada model tersebut dilakukan insert data ke database tabel image
        11. lalu dilakukan redirect ke halaman admin(index)
        .
        */
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000;

        $this->load->library('upload', $config);



        // if ($this->form_validation->run() == false) {
        //     // redirect('admin/upload_image/' . $this->input->post('id_kost'));
        //     echo 'gagal';
        // } else {
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/upload_image', $error);
        } else {
            $image = $this->upload->data();
            $image = $image['file_name'];
            $data = [
                'id_kost' => $this->input->post('id_kost'),
                'main_image' => $this->input->post('level'),
                'image_name' => $image
            ];

            $this->Infokost_model->upload_image($data);
            redirect('admin');
        }
        // }
    }
    public function update($id)
    {
        $data['title'] = 'Update Data';

        $data['kost'] = $this->Infokost_model->getById($id);


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
            $this->load->view('admin/update', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $data = [
                'name' => $this->input->post('name', TRUE),
                'contact' => $this->input->post('contact', true),
                'address' => $this->input->post('address', true),
                'price' => $this->input->post('price', true),
                'description' => $this->input->post('description', true),
                'longlat' => $this->input->post('longlat', true),
                'link' => $this->input->post('link', true)
            ];
            $this->Infokost_model->update($data);
            $this->session->set_flashdata('flash', 'Di Perbaharui');
            redirect('admin');
        }
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Data';

        $data['images'] = $this->Infokost_model->getImageByIdKost($id);
        $data['kost'] = $this->Infokost_model->getById($id);
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/admin/footer');
    }
    public function delete($id)
    {
        $this->Infokost_model->destroy($id);
        $this->Infokost_model->destroyimg($id);
        $this->session->set_flashdata('flash', 'Di Hapus');
        redirect('admin');
    }
}
