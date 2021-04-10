<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
    public function guru()
    {
        if ($_SESSION['user'] == "admin") {
            $_SESSION['page'] = "guru";
            $data['title'] = 'Admin Tabel Guru';
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->model('showtable');
            $admin['datag'] = $this->showtable->tableAdminGuru();
            $admin['editguru'] = $this->showtable->editGuru();
            $data['tbl'] = $this->load->view('admin/tblGuru.php', $admin, TRUE);
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarAdmin.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('admin/tblGuru.php', $data);
            $this->load->view('templates/footer.php');
        }else
            redirect(base_url());
    }
    public function siswa()
    {
        if ($_SESSION['user'] == "admin") {
            $_SESSION['page'] = "siswa";
            $data['title'] = 'Admin Tabel Siswa';
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->model('showtable');
            $admin['datas'] = $this->showtable->tableAdminSiswa();
            $admin['editsiswa'] = $this->showtable->editSiswa();
            $data['tbl'] = $this->load->view('admin/tblSiswa.php', $admin, TRUE);
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarAdmin.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('admin/tblSiswa.php', $data);
            $this->load->view('templates/footer.php');
        }else
        redirect(base_url());
    }
    public function myprofile()
    {
        if ($_SESSION['user'] == "admin") {
            $_SESSION['page'] = "myprofile";
            $data['title'] = 'My Profile Admin';
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarAdmin.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('admin/myprofileAdmin.php', $data);
            $this->load->view('templates/footer.php');
        }else
        redirect(base_url());
    }
    public function tambahGuru()
    {
        if ($_SESSION['user'] == "admin") {
            $_SESSION['page'] = "guru";
            $data['title'] = "Tambah Guru";
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarAdmin.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('admin/tambahGuru.php', $data);
            $this->load->view('templates/footer.php');
        }else
        redirect(base_url());
    }
    public function tambahSiswa()
    {
        if ($_SESSION['user'] == "admin") {
            $_SESSION['page'] = "siswa";
            $data['title'] = "Tambah Siswa";
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->model('showtable');
            $admin['datag'] = $this->showtable->tableAdminGuru();
            $data['tbl'] = $this->load->view('admin/tambahSiswa.php', $admin, TRUE);
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarAdmin.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('admin/tambahSiswa.php', $data);
            $this->load->view('templates/footer.php');
        }
        else
            redirect(base_url());
        unset($_SESSION['cekemail']);

    }

    public function deleteGuru()
    {
        if ($_SESSION['user'] == "admin") {
            $this->load->model('CRUD');
            $this->CRUD->deleteGuru($_GET['id']);
            redirect(base_url('admin/guru'));
        }
    }
    public function deleteSiswa()
    {
        if ($_SESSION['user'] == "admin") {
            $this->load->model('CRUD');
            $this->CRUD->deleteSiswa($_GET['id']);
            redirect(base_url('admin/siswa'));
        }else
        redirect(base_url());
    }
    public function tambahGuruCreate()
    {
        if ($_SESSION['user'] == "admin") {
            $email = $this->db->get_where('guru', ['email' => $_POST['email'] . "@guru.com"])->row_array();
            if (!empty($email)) {
                $_SESSION['cekemail'] = 1;
                redirect(base_url('admin/tambahGuru'));
            } else {
                $this->load->model('CRUD');
                if (empty($_FILES["image"]['name'])) {
                    $this->CRUD->tambahGuru(ucfirst($_POST['fname']), ucfirst($_POST['lname']), $_POST['email'] . "@guru.com", $_POST['password'], "default.jpg", $_POST['date'], $_POST['address'], $_POST['notelp'], $_POST['gender']);
                } else if (!empty($_FILES['image']['name'])) {
                    $maxid = $this->db->query('SELECT MAX(id) AS `maxid` FROM guru')->row()->maxid + 1;
                    $new_name = $maxid . $_FILES["image"]['name'];
                    $config['file_name'] = $new_name;
                    $config['upload_path'] = "./assets/img/guru/";
                    $config['allowed_types'] = "gif|jpg|png|jfif|jpeg";
                    $config['max_size'] = "5000000";
                    $this->load->library('upload', $config);

                    $stat = $this->upload->do_upload('image');

                    if ($stat) {
                        $imageunique = $maxid . $_FILES['image']['name'];
                        $this->CRUD->tambahGuru(ucfirst($_POST['fname']), ucfirst($_POST['lname']), $_POST['email'] . "@guru.com", $_POST['password'], $imageunique, $_POST['date'], $_POST['address'], $_POST['notelp'], $_POST['gender']);
                    }
                }
                redirect(base_url('admin/guru'));
            }
        }else
        redirect(base_url());
    }
    public function tambahSiswaCreate()
    {
        if ($_SESSION['user'] == "admin") {
            $email = $this->db->get_where('siswa', ['email' => $_POST['email'] . "@siswa.com"])->row_array();
            if (!empty($email)) {
                $_SESSION['cekemail'] = 1;
                redirect(base_url('admin/tambahSiswa'));
            } else {
                $this->load->model('CRUD');
                if(empty($_FILES['image']['name'])){
                    $this->CRUD->tambahSiswa(ucfirst($_POST['fname']), ucfirst($_POST['lname']), $_POST['email'] . "@siswa.com", $_POST['password'], $_POST['guru'], "default.jpg", $_POST['date'], $_POST['address'], $_POST['notelp'], $_POST['gender']);
                }else{
                    $maxid = $this->db->query('SELECT MAX(id) AS `maxid` FROM siswa')->row()->maxid + 1;
                    $new_name = $maxid . $_FILES["image"]['name'];
                    $config['file_name'] = $new_name;
                    $config['upload_path'] = "./assets/img/siswa/";
                    $config['allowed_types'] = "gif|jpg|png|jfif|jpeg";
                    $config['max_size'] = "5000000";
                    $this->load->library('upload', $config);
    
                    $stat = $this->upload->do_upload('image');
    
                    if ($stat) {
                        $imageunique = $maxid . $_FILES['image']['name'];
                        $this->CRUD->tambahSiswa(ucfirst($_POST['fname']), ucfirst($_POST['lname']), $_POST['email'] . "@siswa.com", $_POST['password'], $_POST['guru'], $imageunique, $_POST['date'], $_POST['address'], $_POST['notelp'], $_POST['gender']);
                    } 
                }
                redirect(base_url('admin/siswa'));
            }
        }else
        redirect(base_url());
    }
    public function editGuru()
    {
        if ($_SESSION['user'] == "admin") {
            $_SESSION['page'] = "guru";
            $data['title'] = "Edit Guru";
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

            $data['userguru'] = $this->db->get_where('guru_temp', ['id' => $_GET['id']])->row_array();
            $data['userguruawal'] = $this->db->get_where('guru', ['id' => $_GET['id']])->row_array();


            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarAdmin.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('admin/editGuru.php', $data);
            $this->load->view('templates/footer.php');
        }else
        redirect(base_url());
    }
    public function editProfileGuru()
    {
        if ($_SESSION['user'] == "admin") {
            if (isset($_POST['action'])) {
                $id = $this->db->get_where('guru', ['email' => $_POST['email'] . "@guru.com"])->row()->id;
                $this->load->model('CRUD');
                if ($_POST['action'] == 'cancel') {
                    $this->CRUD->changeStatusGuru($id, 2);
                } else if ($_POST['action'] == "approve") {
                    if(empty($_FILES['image']['name'])){
                        $image = $this->db->get_where('guru_temp', ['id' => $id])->row()->image;
                        $this->CRUD->editAdminProfileGuru($id, $_POST['fname'], $_POST['lname'], $_POST['email'] . "@guru.com", $_POST['address'], $_POST['notelp'], $_POST['date'], $_POST['gender'], $image);
                        $this->CRUD->changeStatusGuru($id, 1);
                    }
                }
            }
            redirect(base_url('admin/guru'));
            // print_r($_POST);
        }else
        redirect(base_url());
    }
    public function editSiswa()
    {
        if ($_SESSION['user'] == "admin") {
            $_SESSION['page'] = "siswa";
            $data['title'] = "Edit Siswa";
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

            $data['userguru'] = $this->db->get_where('siswa_temp', ['id' => $_GET['id']])->row_array();
            $data['userguruawal'] = $this->db->get_where('siswa', ['id' => $_GET['id']])->row_array();


            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarAdmin.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('admin/editSiswa.php', $data);
            $this->load->view('templates/footer.php');
        }else
        redirect(base_url());
    }
    public function editProfileSiswa()
    {
        if ($_SESSION['user'] == "admin") {
            if (isset($_POST['action'])) {
                $id = $this->db->get_where('siswa', ['email' => $_POST['email'] . "@siswa.com"])->row()->id;
                $this->load->model('CRUD');
                if ($_POST['action'] == 'cancel') {
                    $this->CRUD->changeStatusSiswa($id, 2);
                } else if ($_POST['action'] == "approve") {
                    if(empty($_FILES['image']['name'])){
                        $image = $this->db->get_where('siswa_temp', ['id' => $id])->row()->image;
                        $this->CRUD->editAdminProfileSiswa($id, $_POST['fname'], $_POST['lname'], $_POST['email'] . "@siswa.com", $_POST['address'], $_POST['notelp'], $_POST['date'], $_POST['gender'], $image);
                        $this->CRUD->changeStatusGuru($id, 1);
                    }
                }
            }
            redirect(base_url('admin/guru'));
            // print_r($_POST);
        }else
        redirect(base_url());
    }
}
