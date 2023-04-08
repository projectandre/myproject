<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['barang'] = $this->M_user->tampil_data_home();
        $data['hero'] = $this->M_hero->tampil_data();
        $data['testi'] = $this->M_user->tampil_testimoni();

        $this->load->view('user/index', $data);
    }

    public function tampil_login()
    {
        $this->load->view('login/login');
    }

    public function tampil_registrasi()
    {
        $this->load->view('login/registrasi');
    }

    public function page_produk()
    {
        $data['barang'] = $this->M_user->tampil_data();
        $data['kategori'] = $this->M_user->tampil_data_kategori();
        $this->load->view('user/page_produk', $data);
    }

    public function kategori($id_kategori)
    {
        $data['judul'] = $this->M_user->ambil_kategori($id_kategori);
        $data['kategori'] = $this->M_user->tampil_data_kategori();
        $data['produk'] = $this->M_user->kategori($id_kategori);
        $this->load->view('user/page_kategori', $data);
    }

    public function page_search()
    {
        $this->load->view('user/page_search');
    }

    public function search()
    {
        $judul = $this->input->post('nama_produk');
        if ($judul === ' ') {
            $this->load->view('user/page_search');
        } else {
            $data['produk'] = $this->M_user->search_data($judul);
            $this->load->view('user/pencarian', $data);
        }
    }

    public function detail_produk($id_barang)
    {
        $data['detail'] = $this->M_user->tampil_detail($id_barang);
        $this->load->view('user/page_detail', $data);
    }


    public function tampilubahPasswordUser()
    {
        $this->load->view('user/page_ubahPassword');
    }

    public function ubah_passwordUser()
    {

        $data['user'] = $this->db->get_where('tabel_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[3]|matches[password_baru1]', [
            'matches' => 'Password baru tidak sama dengan ulangi password, silahkan masukkan ulang!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password_baru1', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[password_baru]');


        if ($this->form_validation->run() == False) {
                $this->load->view('user/page_ubahPassword');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password lama salah</div>');
                redirect('user/tampilubahPasswordUser');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('user/tampilubahPasswordUser');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tabel_user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah</div>');
                    redirect('user/tampilubahPasswordUser');
                }
            }
        }
    }
}
