<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{



    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username anda harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harus di isi!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            // success valid
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');

        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            // user aktif
            if (password_verify($password, $user['password'])) {


                $data = [
                    'username' => $user['username'],
                    'nama' => $user['nama'],

                ];
                $this->session->set_userdata($data);
                redirect('lokasi');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password anda salah!</div>');
                redirect('auth');
            }
        } else {
            //user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda telah logout!</div>');
        redirect('auth');
    }
}
