<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function cek_login()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $user = $this->db->get_where('user', ['Username' => $username])->row_array();

        if ($user) { //jika ada

            if ($password == $user['password']) { //Mencocokkan password yang di input dengan yang ada di db
                $data = [
                 
                    'id' => $user['id'],
                    'Username' => $user['Username'],
                 
                ]; //Membuat data untuk Session
                $this->session->set_userdata($data); //Membuat session Login
                redirect('welcome');
            } else { // Jika data salah password
                echo "<script> alert('password anda salah'); document.location.href = '" . base_url('index.php/login') . "';</script>";
            }
        } else { //Jika email salah
            echo "<script> alert('username tidak ditemukan'); document.location.href = '" . base_url('index.php/login') . "';</script>";
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>alert("Sukses! Anda berhasil logout."); window.location.href="' . base_url('index.php/login') . '";
        </script>';
    }
}
