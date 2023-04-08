<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data2 = array(
            'judul' => 'Dashboard',
            'page' => 'manager/dashboard',
            'admin' => $this->M_admin->tampil_data_barang_manager(),
            'produkDijual' => $this->M_admin->tampil_produk_dashboard_manager('status_produk = "disetujui"'),
            'produkValidasi' => $this->M_admin->tampil_produk_dashboard_manager('status_produk = "belum disetujui"'),
            'heroValidasi' => $this->M_admin->tampil_hero_dashboard_manager('status_hero = "belum disetujui"'),
            
        );
        $this->load->view('manager/index', $data2, false);
    }


    public function barang()
    {
        $data2 = array(
            'judul' => 'Barang',
            'page' => 'manager/barang',
            'admin' => $this->M_admin->tampil_data_barang_manager(),
            'isiKategori' => $this->M_admin->tampil_data_kategori(),
        );
        $this->load->view('manager/index', $data2, false);
    }

    public function delete_barang($id_barang)
    {
        $barang = $this->M_admin->get_barang($id_barang);
        if ($barang->gambar_barang != "") {
            unlink('./uploads/' . $barang->gambar_barang);
        }
        $data = array(
            'id_barang' => $id_barang,
        );
        $this->M_admin->hapus_barang($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data Barang Berhasil Dihapus !!</div>');
        redirect('manager/barang');
    }

    public function detail_barang($id_barang)
    {
        $data = array(
            'judul' => 'Detail Barang',
            'page' => 'manager/detail_barang',
            'manager' => $this->M_admin->detail_barang($id_barang)
        );
        $this->load->view('manager/index', $data, false);
    }

    public function hero()
    {
        $data2 = array(
            'judul' => 'Hero',
            'page' => 'manager/hero',
            'hero' => $this->M_hero->tampil_data(),
        );
        $this->load->view('manager/index', $data2, false);
    }

    public function hapus_hero($id_hero)
    {
        $barang = $this->M_hero->get_hero($id_hero);
        if ($barang->gambar_hero != "") {
            unlink('./gambar/hero/' . $barang->gambar_hero);
        }
        $data = array(
            'id_hero' => $id_hero,
        );
        $this->M_hero->hapus_hero($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data Hero Berhasil Dihapus !!</div>');
        redirect('manager/hero');
    }

    public function setujui($id_hero)
    {

        $data = array(
            'id_hero' => $id_hero,
            'status_hero' => 'disetujui',
        );

        $this->M_hero->edit_setujui($data);
        $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Hero Berhasil Disetujui !!</div>');
        redirect('manager/hero');
    }

    public function tahan_hero($id_hero)
    {

        $data = array(
            'id_hero' => $id_hero,
            'status_hero' => 'belum disetujui',
        );

        $this->M_hero->edit_setujui($data);
        $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Hero Batal Disetujui !!</div>');
        redirect('manager/hero');
    }

    public function setujui_produk($id_barang)
    {

        $data = array(
            'id_barang' => $id_barang,
            'status_produk' => 'disetujui',
        );

        $this->M_hero->edit_setujui_produk($data);
        $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Produk Berhasil Disetujui !!</div>');
        redirect('manager/barang');
    }
    public function tahan_produk($id_barang)
    {

        $data = array(
            'id_barang' => $id_barang,
            'status_produk' => 'belum disetujui',
        );

        $this->M_hero->edit_setujui_produk($data);
        $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Produk Batal Disetujui !!</div>');
        redirect('manager/barang');
    }

    public function laporan()
    {
        $data = array(
            'judul' => 'Laporan Penjualan',
            'page' => 'admin/laporan',
        );
        $this->load->view('manager/index', $data, false);
    }

    public function tampil_login_admin()
    {
        $data = array(
            'judul' => 'Daftar Akun',
            'page' => 'manager/regisADMG',
            'role' => $this->M_admin->tampil_data_role(),
        );
        $this->load->view('manager/index', $data, false);
    }


    // Simpan registrasi kelola akun - manager
    public function simpan_registrasi()
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
            $data = array(
            'judul' => 'Daftar Akun',
            'page' => 'manager/regisADMG',
            'role' => $this->M_admin->tampil_data_role(),
        );
        $this->load->view('manager/index', $data, false);
        } else {
            // success valid
            $this->_simpan_registrasi();
        }
    }

    public function _simpan_registrasi()
    {

        $nama = htmlspecialchars($this->input->post('nama', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $role = htmlspecialchars($this->input->post('role', true));



            $data = array(
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'role_id' => $role
            );

            $this->M_user->tambah_user($data);
            $this->session->set_flashdata('pesan',  'Akun anda berhasil didaftarkan, Silahkan Login !!');
            redirect('manager/tampil_login_admin');
        
    }

    // Selesai kelola registrasi akun



    // search di manager
    public function search_produk()
    {

        $keyword = $this->input->post('keyword');
        $data = array(
            'judul' => 'Produk/Layanan',
            'page' => 'manager/barang',
            'admin' => $this->M_admin->search_produk($keyword)
        );
       $this->load->view('manager/index', $data, false);
    }

    public function search_user()
    {
        $keyword = $this->input->post('keyword');
        $data = array(
            'judul' => 'Data Akun Customers',
            'page' => 'manager/akun_cs',
            'akun' => $this->M_admin->search_customers($keyword)
        );
        $this->load->view('manager/index', $data, false);
    }

    public function search_admin()
    {
        $keyword = $this->input->post('keyword');
        $data = array(
            'judul' => 'Data Akun Admin/Staff Penjualan',
            'page' => 'manager/akun_ad',
            'akun' => $this->M_admin->search_admin($keyword)
        );
        $this->load->view('manager/index', $data, false);
    }

    public function search_manager()
    {
        $keyword = $this->input->post('keyword');
        $data = array(
            'judul' => 'Data Akun Manager',
            'page' => 'manager/akun_mg',
            'akun' => $this->M_admin->search_manager($keyword)
        );
        $this->load->view('manager/index', $data, false);
    }


    // close search di manager

    // Ubah password - manager

    public function tampilUbahPassword()
    {
        $data = array(
            'judul' => 'Ganti Password',
            'page' => 'manager/ubahPassword',
        );
        $this->load->view('manager/index', $data, false);
    }

     public function ubah_password()
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
            $data = array(
            'judul' => 'Ganti Password',
            'page' => 'manager/ubahPassword',
        );
        $this->load->view('manager/index', $data, false);
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password lama salah</div>');
                redirect('manager/tampilUbahPassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('manager/tampilUbahPassword');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tabel_user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Password telah diubah</div>');
                    redirect('manager/tampilUbahPassword');
                }
            }
        }
    }

    // close ubah password - manager
}




