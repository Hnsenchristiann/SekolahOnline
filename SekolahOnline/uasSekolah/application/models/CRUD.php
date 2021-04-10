<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CRUD extends CI_Model
{
    public function deleteGuru($id)
    {
        $query = $this->db->query("DELETE FROM guru WHERE id='$id'");
        return "a";
    }
    public function deleteSiswa($id)
    {
        $query = $this->db->query("DELETE FROM siswa WHERE id='$id'");
        return "a";
    }
    public function tambahGuru($fname, $lname, $email, $password, $image, $date, $address, $notelp, $gender)
    {
        $hash = md5($password);
        $this->db->query("INSERT INTO guru (fname, lname, email, password, image, jenis_kelamin, tgl_lahir, tempat_tinggal, no_telp)
        VALUES ('$fname', '$lname', '$email', '$hash', '$image', '$gender', '$date', '$address', '$notelp')");
    }
    public function tambahSiswa($fname, $lname, $email, $password, $guru, $image, $date, $address, $notelp, $gender)
    {
        $maxid = $this->db->query('SELECT MAX(id) AS `maxid` FROM siswa')->row()->maxid + 1;
        $hash = md5($password);
        $query = $this->db->query("INSERT INTO siswa (fname, lname, email, password, guru, image, jenis_kelamin, tgl_lahir, tempat_tinggal, no_telp)
        VALUES ('$fname', '$lname', '$email', '$hash', '$guru', '$image', '$gender', '$date', '$address', '$notelp')");
        $this->db->query("INSERT INTO nilai(mapel, id_siswa, id_guru, nilai_tugas, nilai_uts, nilai_uas)
        VALUES ('Matematika', $maxid, $guru, 0, 0, 0), ('IPA', $maxid, $guru, 0, 0, 0), 
        ('IPS', $maxid, $guru, 0, 0, 0), ('PKN', $maxid, $guru, 0, 0, 0),
        ('Bahasa Indonesia', $maxid, $guru, 0, 0, 0), ('Seni Budaya', $maxid, $guru, 0, 0, 0),
        ('Pendidikan Jasmani', $maxid, $guru, 0, 0, 0), ('Bahasa Inggris', $maxid, $guru, 0, 0, 0)");
        return "a";
    }
    public function editNilai($mapel, $idsiswa, $idguru, $tugas, $uts, $uas)
    {
        $this->db->query("UPDATE nilai
        SET nilai_tugas = $tugas, nilai_uts= $uts, nilai_uas = $uas, status_uts = 0, status_tugas = 0, status_uas = 0
        WHERE mapel = '$mapel' AND id_siswa = $idsiswa AND id_guru = $idguru");
    }
    public function tinjauNilai($id, $tipe)
    {
        if ($tipe == 'tugas') {
            $this->db->query("UPDATE nilai
        SET status_tugas = 1 
        WHERE count = '$id'");
        } else if ($tipe == 'uts') {
            $this->db->query("UPDATE nilai
        SET status_uts = 1 
        WHERE count = '$id'");
        } else if ($tipe == 'uas') {
            $this->db->query("UPDATE nilai
        SET status_uas = 1 
        WHERE count = '$id'");
        }
    }
    public function editProfileGuru($id, $fname, $lname, $email, $address, $notelp, $date, $gender, $image)
    {
        $this->db->query("INSERT INTO guru_temp (id ,fname, lname, email, jenis_kelamin, tgl_lahir, tempat_tinggal, no_telp, image)
        VALUES ('$id','$fname', '$lname', '$email', '$gender', '$date', '$address', '$notelp', '$image')");
    }
    public function editProfileSiswa($id, $fname, $lname, $email, $address, $notelp, $date, $gender, $image)
    {
        $this->db->query("INSERT INTO siswa_temp (id ,fname, lname, email, jenis_kelamin, tgl_lahir, tempat_tinggal, no_telp, image)
        VALUES ('$id','$fname', '$lname', '$email', '$gender', '$date', '$address', '$notelp', '$image')");
    }
    public function changeStatusGuru($id, $status)
    {
        $this->db->query("UPDATE guru_temp
        SET status = $status
        WHERE id = $id");
    }
    public function editAdminProfileGuru($id, $fname, $lname, $email, $address, $notelp, $date, $gender, $image)
    {
        $this->db->query("UPDATE guru
        SET fname = '$fname', lname = '$lname', email = '$email', tempat_tinggal = '$address', no_telp = '$notelp', tgl_lahir = '$date', jenis_kelamin = '$gender', image = '$image'
        WHERE id = $id");
    }

    public function changeStatusSiswa($id, $status)
    {
        $this->db->query("UPDATE siswa_temp
        SET status = $status
        WHERE id = $id");
    }
    public function editAdminProfileSiswa($id, $fname, $lname, $email, $address, $notelp, $date, $gender, $image)
    {
        $this->db->query("UPDATE siswa
        SET fname = '$fname', lname = '$lname', email = '$email', tempat_tinggal = '$address', no_telp = '$notelp', tgl_lahir = '$date', jenis_kelamin = '$gender', image='$image'
        WHERE id = $id");
    }
    public function deleteGuruTemp($id)
    {
        $this->db->query("DELETE FROM guru_temp WHERE id='$id'");
    }
    public function deleteSiswaTemp($id)
    {
        $this->db->query("DELETE FROM siswa_temp WHERE id='$id'");
    }
    public function changePassword($id, $user, $password)
    {
        if ($user == "siswa") {
            $this->db->query("UPDATE siswa
        SET password = '$password'
        WHERE id = $id");
        }
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
