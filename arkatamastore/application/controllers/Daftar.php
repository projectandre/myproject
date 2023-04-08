<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tabel_user.email]', [
            'valid_email' => 'Email anda salah!',
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password2]', [
            'required' => 'Password harus di isi!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('login/registrasi');
        } else {
            // success valid
            $this->_daftar();
        }
    }

    public function _daftar()
    {

        $nama = htmlspecialchars($this->input->post('nama', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $user = $this->db->get_where('tabel_user', ['email' => $email])->row_array();

        if ($user) {
            //user sudah ada

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email Sudah Digunakan Sebelumnya!</div>');
            redirect('daftar');
        } else { //user tidak ada

            $data = array(
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'role_id' => 3
            );

            $this->M_user->tambah_user($data);
            $this->session->set_flashdata('message',  '<div class="alert alert-success">Akun anda berhasil didaftarkan, Silahkan Login untuk berbelanja !!</div>');
            redirect('daftar');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda telah logout!</div>');
        redirect('auth');
    }
}
