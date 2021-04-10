<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] == "guru" || $_SESSION['user'] == "admin")
                redirect(base_url('' . $_SESSION['user'] . ''));
            else
                redirect(base_url('murid'));
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            // $this->load->view('templates/auth_header');
            $this->load->view('auth/login1', $data);
            // $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $cekuser = 1;
            $user = $this->db->get_where('admin', ['email' => $email])->row_array();
            if (!$user) {
                $cekuser = 2;
                $user = $this->db->get_where('guru', ['email' => $email])->row_array();
                if (!$user) {
                    $cekuser = 3;
                    $user = $this->db->get_where('siswa', ['email' => $email])->row_array();
                }
            }
            $this->load->model('auth_model');
            $this->auth_model->_login($user, $cekuser, $password);
        }
    }
    public function logout()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out</div>');
        session_destroy();
        redirect('auth');
    }
    public function changepassword(){
        if(isset($_SESSION['user'])){
            $this->load->model('CRUD');
            $pass = md5($_POST['pass']);
            if($_SESSION['user'] == "siswa"){
                $id = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row()->id;
                $this->CRUD->changepassword($id, "siswa", $pass);
            }else if($_SESSION['user'] == "guru"){
                $id = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row()->id;
                $this->CRUD->changepassword($id, "guru", $pass);
            }else if($_SESSION['user'] == "admin"){
                $id = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row()->id;
                $this->CRUD->changepassword($id, "admin", $pass);
            }
            redirect(base_url(''));
        }
    }
}
