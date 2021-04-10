<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Murid extends CI_Controller
{
    public function index()
    {
        if ($_SESSION['user'] == "guru")
            redirect(base_url('guru/siswa'));
        else if ($_SESSION['user'] == "admin")
            redirect(base_url('admin/guru'));
        else if ($_SESSION['user'] == "siswa")
            redirect(base_url('murid/nilai'));
    }
    public function myprofile()
    {
        if ($_SESSION['user'] == "siswa") {
            $_SESSION['page'] = "myprofile";
            $data['title'] = 'Website Murid';
            $data['user'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();

            $id = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row()->id;
            $this->load->model('showtable');
            $data['datas'] = $this->showtable->checkEditSiswa($id);


            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarSiswa.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('murid/myprofileSiswa.php', $data);
            $this->load->view('templates/footer.php');
        } else
            redirect(base_url());
    }
    public function nilai()
    {
        if ($_SESSION['user'] == "siswa") {

            $_SESSION['page'] = "nilai";
            $data['title'] = 'Website Murid';
            $data['user'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();

            $id = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row()->id;
            $cek = $this->db->get_where('siswa_temp', ['id' => $id])->row_array();
            if (!empty($cek)) {
                $data['cekProfile'] = $this->db->get_where('siswa_temp', ['id' => $id])->row()->status;
            }

            $this->load->model('showtable');
            $admin['datag'] = $this->showtable->nilaiSiswa($data['user']['id']);
            $data['guru'] = $this->db->get_where('guru', ['id' => $data['user']['guru']])->row_array();
            $data['tbl'] = $this->load->view('murid/nilaiSiswa.php', $admin, TRUE);

            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarSiswa.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('murid/nilaiSiswa.php', $data);
            $this->load->view('templates/footer.php');

            if (!empty($cek)) {
                $idtemp = $this->db->get_where('siswa_temp', ['id' => $id])->row()->id;
                $this->load->model('CRUD');
                $this->CRUD->deleteSiswaTemp($idtemp);
            }
        } else
            redirect(base_url());
    }
    public function tinjauNilai()
    {
        if ($_SESSION['user'] == "siswa") {
            $this->load->model('CRUD');
            $this->CRUD->tinjauNilai($_GET['id'], $_GET['assestment']);
            redirect(base_url('murid/nilai'));
        } else
            redirect(base_url());
    }
    public function editProfile()
    {
        if ($_SESSION['user'] == "siswa") {
            $id = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row()->id;
            $this->load->model('showtable');
            $check = $this->showtable->checkEditSiswa($id);
            if (empty($check)) {
                $data['title'] = "Edit Profile";
                $data['user'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header.php', $data);
                $this->load->view('templates/sidebarGuru.php', $data);
                $this->load->view('templates/topbar.php', $data);
                $this->load->view('murid/editProfile.php', $data);
                $this->load->view('templates/footer.php');
            } else if (!empty($check)) {
                redirect(base_url('murid/myprofile'));
            }
        } else
            redirect(base_url());
    }
    public function editProfileSiswa()
    {
        if ($_SESSION['user'] == "siswa") {
            $this->load->model('CRUD');
            $id = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row()->id;
            if (!empty($_FILES['image']['name'])) {
                $new_name = $id . $_FILES["image"]['name'];
                    $config['file_name'] = $new_name;
                    $config['upload_path'] = "./assets/img/siswa/";
                    $config['allowed_types'] = "gif|jpg|png|jfif|jpeg";
                    $config['max_size'] = "5000000";
                    $this->load->library('upload', $config);
    
                    $stat = $this->upload->do_upload('image');
    
                    if ($stat) {
                        $imageunique = $id . $_FILES['image']['name'];
                        $this->CRUD->editProfileSiswa($id, $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['address'], $_POST['notelp'], $_POST['date'], $_POST['gender'], $imageunique);
                    } 
            }else if(empty($_FILES['image']['name'])){
                $image = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row()->image;
                $this->CRUD->editProfileSiswa($id, ucfirst($_POST['fname']), ucfirst($_POST['lname']), $_POST['email'], $_POST['address'], $_POST['notelp'], $_POST['date'], $_POST['gender'], $image);
            }
            redirect(base_url('murid/myprofile'));
        } else
            redirect(base_url());
    }
}
