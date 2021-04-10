<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ShowTable extends CI_Model
{
    public function tableAdminGuru()
    {
        $query = $this->db->query("SELECT * FROM guru");
        return $query->result_array();
    }
    public function tableAdminSiswa()
    {
        $query = $this->db->query("SELECT * FROM siswa");
        return $query->result_array();
    }
    public function tableGuruSiswa($id)
    {
        $query = $this->db->query("SELECT * FROM siswa WHERE guru = '$id'");
        return $query->result_array();
    }
    public function nilaiSeluruhMapel($id)
    {
        $query = $this->db->query("SELECT * FROM nilai WHERE id_guru = '$id'");
        return $query->result_array();
    }
    public function nilaiGuruSiswa($id, $mapel)
    {
        $query = $this->db->query("SELECT * FROM nilai WHERE id_guru = '$id' and mapel = '$mapel'");
        return $query->result_array();
    }
    public function nilaiSiswa($id)
    {
        $query = $this->db->query("SELECT * FROM nilai WHERE id_siswa = '$id'");
        return $query->result_array();
    }
    public function editnilaiSiswa($idsiswa, $idguru, $mapel)
    {
        $query = $this->db->query("SELECT * FROM nilai WHERE id_siswa = '$idsiswa' AND id_guru = '$idguru' AND mapel = '$mapel'");
        return $query;
    }
    public function checkEditGuru($id)
    {
        $query = $this->db->query("SELECT * FROM guru_temp WHERE id=$id");
        return $query->result_array();
    }
    public function checkEditSiswa($id)
    {
        $query = $this->db->query("SELECT * FROM siswa_temp WHERE id=$id");
        return $query->result_array();
    }
    public function editGuru()
    {
        $query = $this->db->query("SELECT * FROM guru_temp");
        return $query->result_array();
    }
    public function editSiswa()
    {
        $query = $this->db->query("SELECT * FROM siswa_temp");
        return $query->result_array();
    }
    public function checkMapel()
    {
        $query = $this->db->query("SELECT * FROM kode_mapel");
        return $query->result_array();
    }
    public function checkTinjau($id){
        $query = $this->db->query("SELECT * FROM nilai WHERE id_guru = $id AND (status_tugas = 1 OR status_uts = 1 OR status_uas=1)");
        return $query->result_array();
    }
}
    // public function _login($user, $password){
    //     if ($user) {
    //         //user aktif
    //         if ($user['is_active'] == 1) {
    //             //cek pass
    //             $passwordhash = md5($password);
    //             if ($user['password'] == $passwordhash) {
    //                 $data = [
    //                     'email' => $user['email'],
    //                     'role_id' => $user['role_id'],

    //                 ];
    //                 $this->session->set_userdata($data);
    //                 if ($user['role_id'] == 1) {
    //                     redirect('admin');
    //                 } else if ($user['role_id'] == 2) {
    //                     redirect('guru');
    //                 } else if ($user['role_id'] == 3) {
    //                     redirect('murid');
    //                 }
    //             } else {
    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         Wrong Password!</div>');
    //                 redirect('auth');
    //             }
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         This email has not been activated!</div>');
    //             redirect('auth');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         Email is not registered!</div>');
    //         redirect('auth');
    //     }
    // }
