<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Admin extends CI_Controller
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

        $data = array(
            'judul' => 'Dashboard',
            'page' => 'admin/dashboard',
            'pesananMasuk' => $this->M_admin->tampil_total_pesanan_customer('status = "order"'),
            'pesananMenunggu' => $this->M_admin->tampil_total_pesanan_customer('bukti_transfer != "" AND status = "order" '),
            'pesananProses' => $this->M_admin->tampil_total_pesanan_customer('status = "diproses"'),
            'pesananDikirim' => $this->M_admin->tampil_total_pesanan_customer('status = "dikirim"'),
            'pesananSelesai' => $this->M_admin->tampil_total_pesanan_customer('status = "diterima"'),
        );
        $this->load->view('admin/index', $data, false);
    }

    public function data_barang()
    {
        $data = array(
            'judul' => 'Data Barang',
            'page' => 'admin/data_barang',
            'admin' => $this->M_admin->tampil_data_barang(),
            'isiKategori' => $this->M_admin->tampil_data_kategori(),
        );
        $this->load->view('admin/index', $data, false);
    }

    public function tambah_barang()
    {

         $nama_barang = $this->db->get_where('tabel_barang', ['nama_barang' => htmlspecialchars($this->input->post('nama_barang', true))])->row_array();

         if ($nama_barang) {
                $this->session->set_flashdata('pesan',  '<div class="alert alert-danger">Data barang tidak berhasil ditambah ! barang yang telah ada tidak boleh ditambahkan kembali!</div>');
                redirect('admin/data_barang');
            } else {

        $nama_barang = htmlspecialchars($this->input->post('nama_barang', true));
        $keterangan_barang = htmlspecialchars($this->input->post('keterangan_barang', true));
        $kategori_barang = htmlspecialchars($this->input->post('id_kategori', true));
        $harga_barang = htmlspecialchars($this->input->post('harga_barang', true));
        $stok_barang = htmlspecialchars($this->input->post('stok_barang', true));
        $kondisi_barang = htmlspecialchars($this->input->post('kondisi_barang', true));
        $berat_barang = htmlspecialchars($this->input->post('berat_barang', true));
        $gambar_barang = $_FILES['gambar_barang'];

        if ($gambar_barang = '') {
            $this->session->set_flashdata('pesan',  '<div class="alert alert-danger">Gambar barang tidak boleh kosong !!</div>');
            redirect('admin/data_barang');
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_barang')) {
                $this->session->set_flashdata('pesan',  '<div class="alert alert-danger">Gambar tidak berhasil di upload !! Silahkan ulangi dan gunakan tipe gambar jpg, jpeg, png, atau gif</div>');
                redirect('admin/data_barang');
            } else {
                $gambar_barang = $this->upload->data('file_name');
            

             

            $data = array(
                'nama_barang' => $nama_barang,
                'keterangan_barang' => $keterangan_barang,
                'id_kategori' => $kategori_barang,
                'harga_barang' => $harga_barang,
                'stok_barang' => $stok_barang,
                'kondisi_barang' => $kondisi_barang,
                'berat_barang' => $berat_barang,
                'gambar_barang' => $gambar_barang,
                'status_produk' => 'belum disetujui'
            );

            $this->M_admin->tambah_barang($data);
            $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Data barang Berhasil Ditambah !!</div>');
        
            redirect('admin/data_barang');
        }
        }
    }
    }

    public function edit_barang($id_barang)
    {

        $data = array(
            'judul' => 'Edit Data Barang',
            'page' => 'admin/edit_barang',
            'admin' => $this->M_admin->detail_barang($id_barang),
            'isiKategori' => $this->M_admin->tampil_data_kategori(),
        );
        $this->load->view('admin/index', $data, false);
    }

    public function update_barang($id_barang)
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('keterangan_barang', 'Keterangan', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('harga_barang', 'Harga', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        if ($this->form_validation->run() == false) {
            $data = array(
                'judul' => 'Edit Data Barang',
                'page' => 'admin/edit_barang',
                'admin' => $this->M_admin->detail_barang($id_barang),
                'isiKategori' => $this->M_admin->tampil_data_kategori(),
            );
            $this->load->view('admin/index', $data, false);
        } else {
            $nama_barang = htmlspecialchars($this->input->post('nama_barang', true));
            $keterangan_barang = htmlspecialchars($this->input->post('keterangan_barang', true));
            $kategori_barang = htmlspecialchars($this->input->post('id_kategori', true));
            $harga_barang = htmlspecialchars($this->input->post('harga_barang', true));
            $stok_barang = htmlspecialchars($this->input->post('stok_barang', true));
            $kondisi_barang = htmlspecialchars($this->input->post('kondisi_barang', true));
            $berat_barang = htmlspecialchars($this->input->post('berat_barang', true));
            $gambar_barang = $_FILES['gambar_barang'];

            if ($gambar_barang = '') {
            } else {
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar_barang')) {
                    $data = array(
                        'id_barang' => $id_barang,
                        'nama_barang' => $nama_barang,
                        'keterangan_barang' => $keterangan_barang,
                        'id_kategori' => $kategori_barang,
                        'harga_barang' => $harga_barang,
                        'stok_barang' => $stok_barang,
                        'kondisi_barang' => $kondisi_barang,
                        'berat_barang' => $berat_barang,
                        'status_produk' => 'belum disetujui'
                    );

                    $this->M_admin->edit_barang($data);

                    // Data berhasil diubah di db
                    $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Data barang Berhasil Diubah !!</div>');
                    redirect('admin/data_barang');
                } else {
                    $barang = $this->M_admin->get_barang($id_barang);
                    if ($barang->gambar_barang != "") {
                        unlink('./uploads/' . $barang->gambar_barang);
                    }
                    $gambar_barang = $this->upload->data('file_name');
                    $data = array(
                        'id_barang' => $id_barang,
                        'nama_barang' => $nama_barang,
                        'keterangan_barang' => $keterangan_barang,
                        'id_kategori' => $kategori_barang,
                        'harga_barang' => $harga_barang,
                        'stok_barang' => $stok_barang,
                        'kondisi_barang' => $kondisi_barang,
                        'berat_barang' => $berat_barang,
                        'gambar_barang' => $gambar_barang,
                        'status_produk' => 'belum disetujui'
                    );

                    $this->M_admin->edit_barang($data);
                    $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Data barang Berhasil Diubah !!</div>');
                    redirect('admin/data_barang');
                }
            }
        }
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
        redirect('admin/data_barang');
    }

    public function data_kategori()
    {
        $data = array(
            'judul' => 'Data Kategori',
            'page' => 'admin/data_kategori',
            'admin' => $this->M_admin->tampil_data_kategori(),
        );
        $this->load->view('admin/index', $data, false);
    }

    public function tambah_kategori()
    {

         $nama_kategori = $this->db->get_where('tabel_kategori', ['nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true))])->row_array();

         if ($nama_kategori) {
                $this->session->set_flashdata('pesan',  '<div class="alert alert-danger">Data kategori tidak berhasil ditambah ! kategori yang telah ada tidak boleh ditambahkan kembali!</div>');
                redirect('admin/data_kategori');
            } else {


        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));


        $nama_kategori = htmlspecialchars($this->input->post('nama_kategori', true));

        $data = array(
            'nama_kategori' => $nama_kategori,
        );

        $this->M_admin->tambah_kategori($data);
        $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Data barang Berhasil Ditambah !!</div>');
        redirect('admin/data_kategori');
    }
    }


    public function edit_kategori($id_kategori)
    {

        $data = array(
            'judul' => 'Edit Data Kategori',
            'page' => 'admin/edit_kategori',
            'admin' => $this->M_admin->detail_kategori($id_kategori),
        );
        $this->load->view('admin/index', $data, false);
    }

    public function update_kategori($id_kategori)
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $nama_kategori = htmlspecialchars($this->input->post('nama_kategori', true));


        $data = array(
            'id_kategori' => $id_kategori,
            'nama_kategori' => $nama_kategori,
        );

        $this->M_admin->edit_kategori($data);
        $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Data Kategori Berhasil Diubah !!</div>');
        redirect('admin/data_kategori');
    }


    public function delete_kategori($id_kategori)
    {

        $data = array(
            'id_kategori' => $id_kategori,
        );
        $this->M_admin->hapus_kategori($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data Kategori Berhasil Dihapus !!</div>');
        redirect('admin/data_kategori');
    }

    public function detail_barang($id_barang)
    {
        $data = array(
            'judul' => 'Detail Barang',
            'page' => 'admin/detail_data_barang',
            'admin' => $this->M_admin->detail_barang($id_barang)
        );
        $this->load->view('admin/index', $data, false);
    }



   // KELOLA AKUN - MANAGER

    public function akun_user()
    {
        $data = array(
            'judul' => 'Data Akun Customers',
            'page' => 'manager/akun_cs',
            'akun' => $this->M_admin->tampil_data_customers()
        );
        $this->load->view('manager/index', $data, false);
    }

    public function akun_admin()
    {
        $data = array(
            'judul' => 'Data Akun Staff Penjualan/Admin',
            'page' => 'manager/akun_ad',
            'akun' => $this->M_admin->tampil_data_admin(),
            'role' => $this->M_admin->tampil_data_role(),
        );
        $this->load->view('manager/index', $data, false);
    }

    public function akun_manager()
    {
        $data = array(
            'judul' => 'Data Akun Manager',
            'page' => 'manager/akun_mg',
            'akun' => $this->M_admin->tampil_data_manager()
        );
        $this->load->view('manager/index', $data, false);
    }

    public function delete_akunCS($id_user)
    {
        $data = array(
            'id_user' => $id_user
        );
        $this->M_admin->delete_akun($data);
        $this->session->set_flashdata('pesan', 'Data Akun Berhasil Dihapus !!');
        redirect('admin/akun_user');
    }

    public function delete_akunAD($id_user)
    {
        $data = array(
            'id_user' => $id_user
        );
        $this->M_admin->delete_akun($data);
        $this->session->set_flashdata('pesan', 'Data Akun Berhasil Dihapus !!');
        redirect('admin/akun_admin');
    }

    public function delete_akunMG($id_user)
    {
        $data = array(
            'id_user' => $id_user
        );
        $this->M_admin->delete_akun($data);
        $this->session->set_flashdata('pesan', 'Data Akun Berhasil Dihapus !!');
        redirect('admin/akun_manager');
    }

    // CLOSE KELOLA AKUN - MANAGER



    // TESTIMONI ADMIN
    public function data_testi()
    {
        $data = array(
            'judul' => 'Kelola Testimoni',
            'page' => 'admin/testimoni',
            'testimoni' => $this->M_admin->tampil_testimoni_admin()
        );
        $this->load->view('admin/index', $data, false);
    }

    public function delete_testi($id_testi)
    {
        $data = array(
            'id_testi' => $id_testi
        );
        $this->M_admin->delete_testi($data);
        $this->session->set_flashdata('pesan', 'Data Testimoni Berhasil Dihapus !!');
        redirect('admin/data_testi');
    }
    // CLOSE TESTIMONI ADMIN


    // search - admin

    public function search_produk_admin()
    {

        $keyword = $this->input->post('keyword');
        $data = array(
            'judul' => 'Data Barang',
            'page' => 'admin/data_barang',
            'admin' => $this->M_admin->search_produk($keyword)
        );
       $this->load->view('admin/index', $data, false);
    }

    public function search_testi_admin()
    {

        $keyword = $this->input->post('keyword');
        $data = array(
            'judul' => 'Kelola Testimoni',
            'page' => 'admin/testimoni',
            'testimoni' => $this->M_admin->search_testi($keyword)
        );
        $this->load->view('admin/index', $data, false);
    }

    // close search - admin


    // Ubah password - admin

    public function tampilUbahPassword_admin()
    {
        $data = array(
            'judul' => 'Ganti Password',
            'page' => 'admin/ubahPW_admin',
        );
        $this->load->view('admin/index', $data, false);
    }

     public function ubah_password_admin()
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
            'page' => 'admin/ubahPW_admin',
        );
        $this->load->view('admin/index', $data, false);
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password lama salah</div>');
                redirect('admin/tampilUbahPassword_admin');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('admin/tampilUbahPassword_admin');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tabel_user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Password telah diubah</div>');
                    redirect('admin/tampilUbahPassword_admin');
                }
            }
        }
    }

    // close ubah password - admin
    

}
