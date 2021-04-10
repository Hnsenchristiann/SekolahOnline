<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
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
        if ($_SESSION['user'] == "guru") {
            $_SESSION['page'] = "myprofile";
            $data['title'] = 'My Profile';
            $data['user'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();

            $id = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row()->id;
            $this->load->model('showtable');
            $data['datas'] = $this->showtable->checkEditGuru($id);

            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarGuru.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('guru/myprofileGuru.php', $data);
            $this->load->view('templates/footer.php');
        } else
            redirect(base_url());
    }
    public function siswa()
    {
        if ($_SESSION['user'] == "guru") {
            $_SESSION['page'] = "siswa";
            $data['title'] = 'Guru Tabel Siswa';
            $data['user'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row()->id;
            $cek = $this->db->get_where('guru_temp', ['id' => $id])->row_array();
            if (!empty($cek)) {
                $data['cekProfile'] = $this->db->get_where('guru_temp', ['id' => $id])->row()->status;
            }

            $this->load->model('showtable');
            $tinjaunilai = $this->showtable->checkTinjau($id);
            if(!empty($tinjaunilai)){
                    $data['tinjaunilai'] = 1;
            }

            $admin['datas'] = $this->showtable->tableGuruSiswa($data['user']['id']);
            $data['tbl'] = $this->load->view('admin/tblSiswa.php', $admin, TRUE);
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebarGuru.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('guru/tblSiswa.php', $data);
            $this->load->view('templates/footer.php', $data);

            if (!empty($cek)) {
                $idtemp = $this->db->get_where('guru_temp', ['id' => $id])->row()->id;
                $this->load->model('CRUD');
                $this->CRUD->deleteGuruTemp($idtemp);
            }
        } else
            redirect(base_url());
    }
    public function mapel()
    {
        if ($_SESSION['user'] == "guru") {
            $this->load->model('showtable');
            if (!isset($_GET['mapel'])) {
                $_SESSION['page'] = "mapel";
                $data['title'] = 'Mata Pelajaran';
                $data['user'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
                $admin['datas'] = $this->showtable->nilaiSeluruhMapel($data['user']['id']);
                $data['tbl'] = $this->load->view('guru/mapel.php', $admin, TRUE);
                $this->load->view('templates/header.php', $data);
                $this->load->view('templates/sidebarGuru.php', $data);
                $this->load->view('templates/topbar.php', $data);
                $this->load->view('guru/mapel.php', $data);
                $this->load->view('templates/footer.php');
            } else {
                $mapel = $this->showtable->checkMapel();
                foreach ($mapel as $row) {
                    if ($row['nama_mapel'] == $_GET['mapel']) {
                        $_SESSION['page'] = "mapel";
                        $data['title'] = $_GET['mapel'];
                        $data['user'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
                        $admin['siswa'] = $this->showtable->tableGuruSiswa($data['user']['id']);
                        $admin['datas'] = $this->showtable->nilaiGuruSiswa($data['user']['id'], $_GET['mapel']);
                        $data['tbl'] = $this->load->view('guru/tblNilaiSiswa.php', $admin, TRUE);
                        $this->load->view('templates/header.php', $data);
                        $this->load->view('templates/sidebarGuru.php', $data);
                        $this->load->view('templates/topbar.php', $data);
                        $this->load->view('guru/tblNilaiSiswa.php', $data);
                        $this->load->view('templates/footer.php');
                    break;
                    }
                }
                if(empty($data))
                    redirect(base_url('guru/mapel'));
            }
        } else
            redirect(base_url());
    }
    public function editNilai()
    {
        if ($_SESSION['user'] == "guru" && isset($_GET['mapel']) && isset($_GET['idsiswa'])&& isset($_GET['idguru'])) {
            $id = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row()->id;
            $this->load->model('showtable');
            $siswa = $this->showtable->tableGuruSiswa($id);
            $mapel = $this->showtable->checkMapel();
            foreach ($mapel as $rowm) {
                foreach ($siswa as $row) {
                    if ($id == $_GET['idguru'] && $row['id'] == $_GET['idsiswa'] && $rowm['nama_mapel'] == $_GET['mapel']) {
                        $data['title'] = $_GET['mapel'];
                        $data['user'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
                        $this->load->model('showtable');
                        $admin['datas'] = $this->showtable->editnilaiSiswa($_GET['idsiswa'], $_GET['idguru'], $_GET['mapel']);
                        $data['tugas'] = $admin['datas']->row()->nilai_tugas;
                        $data['uts'] = $admin['datas']->row()->nilai_uts;
                        $data['uas'] = $admin['datas']->row()->nilai_uas;
                        $this->load->view('templates/header.php', $data);
                        $this->load->view('templates/sidebarGuru.php', $data);
                        $this->load->view('templates/topbar.php', $data);
                        $this->load->view('guru/editNilai.php', $data);
                        $this->load->view('templates/footer.php');
                        break;
                    }
                }
            }
            if (empty($data))
                redirect(base_url('guru/mapel'));
        } else
            redirect(base_url());
        // else if($_SESSION['user'] == "guru" && !isset($_GET)){
        //     $id = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row()->id;
        //     if($_GET['idguru'] == $id){
        //         $this->load->model('CRUD');
        //         $cek = $this->CRUD->editNilai($_GET['mapel'], $_GET['idsiswa'], $_GET['idguru']);
        //     }
        // }
    }
    public function editNilaiSiswa()
    {
        if ($_SESSION['user'] == "guru") {
            $id = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row()->id;
            if ($_GET['idguru'] == $id) {
                $this->load->model('CRUD');
                $this->CRUD->editNilai($_GET['mapel'], $_GET['idsiswa'], $_GET['idguru'], $_POST['tugas'], $_POST['uts'], $_POST['uas']);
                redirect(base_url('guru/mapel?mapel=' . $_GET["mapel"] . ''));
            }
        } else
            redirect(base_url());
    }
    public function editProfile()
    {
        if ($_SESSION['user'] == "guru") {
            $id = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row()->id;
            $this->load->model('showtable');
            $check = $this->showtable->checkEditGuru($id);
            if (empty($check)) {
                $data['title'] = "Edit Profile";
                $data['user'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->view('templates/header.php', $data);
                $this->load->view('templates/sidebarGuru.php', $data);
                $this->load->view('templates/topbar.php', $data);
                $this->load->view('guru/editProfile.php', $data);
                $this->load->view('templates/footer.php');
            } else if (!empty($check)) {
                redirect(base_url('guru/myprofile'));
            }
        } else
            redirect(base_url());
    }
    public function editProfileGuru()
    {
        if ($_SESSION['user'] == "guru") {
            $this->load->model('CRUD');
            $id = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row()->id;
            if (!empty($_FILES['image']['name'])) {
                    $new_name = $id . $_FILES["image"]['name'];
                    $config['file_name'] = $new_name;
                    $config['upload_path'] = "./assets/img/guru/";
                    $config['allowed_types'] = "gif|jpg|png|jfif|jpeg";
                    $config['max_size'] = "5000000";
                    $this->load->library('upload', $config);
    
                    $stat = $this->upload->do_upload('image');
    
                    if ($stat) {
                        $imageunique = $id . $_FILES['image']['name'];
                        $this->CRUD->editProfileGuru($id, ucfirst($_POST['fname']), ucfirst($_POST['lname']), $_POST['email'], $_POST['address'], $_POST['notelp'], $_POST['date'], $_POST['gender'], $imageunique);
                    } 
            }else if(empty($_FILES['image']['name'])){
                $image = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row()->image;
                $this->CRUD->editProfileGuru($id, ucfirst($_POST['fname']), ucfirst($_POST['lname']), $_POST['email'], $_POST['address'], $_POST['notelp'], $_POST['date'], $_POST['gender'], $image);
            }
            redirect(base_url('guru/myprofile'));
        } else
            redirect(base_url());
    }
}
