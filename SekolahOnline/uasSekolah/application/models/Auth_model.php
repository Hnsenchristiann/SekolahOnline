<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    public function _login($user, $cekuser, $password)
    {
        if ($user) {
            //cek pass
            $passwordhash = md5($password);
            if ($user['password'] == $passwordhash) {
                $data = [
                    'email' => $user['email'],
                ];
                $this->session->set_userdata($data);
                if($cekuser == 1){
                    $_SESSION['user'] = "admin";
                    redirect('admin/guru');
                }
                else if($cekuser == 2){
                    $_SESSION['user'] = "guru";
                    redirect('guru/siswa');
                }
                else if($cekuser == 3){
                    $_SESSION['user'] = "siswa";
                    redirect('murid/nilai');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Password!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!</div>');
            redirect('auth');
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
}
