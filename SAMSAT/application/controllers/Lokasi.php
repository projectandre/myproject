<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "third_party/dompdf/autoload.php";

use Dompdf\Dompdf;

class Lokasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = array(
            'judul' => 'Pemetaan Wilayah Samsat Lampung',
            'page' => 'v_pemetaan_lokasi',
            'lokasi' => $this->M_lokasi->alldata()
        );
        $this->load->view('v_template', $data, false);
    }

    public function input()
    {
        $this->form_validation->set_rules('nama_kantor', 'Nama Kantor', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('petugas', 'Petugas', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        if ($this->form_validation->run() == False) {
            $data = array(
                'judul' => 'Tambah Lokasi Samsat',
                'page' => 'v_input_lokasi',
            );
            $this->load->view('v_template', $data, false);
        } else {
            // simpan ke database
            $data = array(
                'nama_kantor' => htmlspecialchars($this->input->post('nama_kantor', true)),
                'petugas' => htmlspecialchars($this->input->post('petugas', true)),
                'npp' => htmlspecialchars($this->input->post('npp', true)),
                'grade' => htmlspecialchars($this->input->post('grade', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'informasi' => htmlspecialchars($this->input->post('informasi', true)),
                'latitude' => htmlspecialchars($this->input->post('latitude', true)),
                'longitude' => htmlspecialchars($this->input->post('longitude', true)),

            );

            $this->M_lokasi->input($data);

            // Data berhasil masuk db
            $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Lokasi Berhasil Disimpan !!</div>');
            redirect('lokasi/input');
        }
    }



    public function detail($id_kantor)
    {
        $data = array(
            'judul' => 'Detail Koordinat Samsat',
            'page' => 'v_detail_lokasi',
            'lokasi' => $this->M_lokasi->detail($id_kantor)
        );
        $this->load->view('v_template', $data, false);
    }

    // edit data
    public function edit($id_data)
    {

        $this->form_validation->set_rules('nama_kantor', 'Nama Lokasi', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('petugas', 'Petugas', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));


        if ($this->form_validation->run() == False) {
            $data = array(
                'judul' => 'Edit Lokasi Samsat',
                'page' => 'v_edit_lokasi',
                'lokasi' => $this->M_lokasi->detail($id_data)
            );
            $this->load->view('v_template', $data, false);
        } else {

            // simpan ke database
            $data = array(
                'id_data' => $id_data,
                'nama_kantor' => htmlspecialchars($this->input->post('nama_kantor', true)),
                'petugas' => htmlspecialchars($this->input->post('petugas', true)),
                'npp' => htmlspecialchars($this->input->post('npp', true)),
                'grade' => htmlspecialchars($this->input->post('grade', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'informasi' => htmlspecialchars($this->input->post('informasi', true)),
                'latitude' => htmlspecialchars($this->input->post('latitude', true)),
                'longitude' => htmlspecialchars($this->input->post('longitude', true)),
            );

            $this->M_lokasi->edit($data);

            // Data berhasil diubah di db
            $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Data Lokasi Berhasil Diubah !!</div>');
            redirect('lokasi');
        }
    }

    public function delete($id_data)
    {
        $data = array(
            'id_data' => $id_data
        );
        $this->M_lokasi->delete($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data Lokasi Berhasil Dihapus !!</div>');
        redirect('lokasi');
    }

    public function listlokasi()
    {
        $data = array(
            'judul' => 'Data Petugas Samsat Lampung',
            'page' => 'v_list_lokasi',
            'lokasi' => $this->M_lokasi->alldata()
        );
        $this->load->view('v_template', $data, false);
    }



    public function menuRegistrasi()
    {
        $data = array(
            'judul' => 'Registrasi Akun',
            'page' => 'auth/registrasi',
        );
        $this->load->view('v_template', $data, false);
    }

    public function registrasi_akun()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdaftar!'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password tidak sama!!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data = array(
                'judul' => 'Registrasi Akun',
                'page' => 'auth/registrasi',
            );
            $this->load->view('v_template', $data, false);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! akun telah dibuat, Silahkan Login!</div>');
            redirect('lokasi/menuRegistrasi');
        }
    }

    public function export()
    {

        $data = array(
            'lokasi' => $this->M_lokasi->alldata(),
        );
        $this->load->view('v_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();

        $pdf = new Dompdf();

        $pdf->setPaper($paper_size, $orientation);
        $pdf->loadHtml($html);
        $pdf->render();

        $pdf->stream("Data Samsat.pdf", array('Attachment' => 0));
    }

    public function tabelAkun()
    {
        $data = array(
            'judul' => 'Data Akun',
            'page' => 'v_list_akun',
            'lokasi' => $this->M_lokasi->tampil_data_user()
        );
        $this->load->view('v_template', $data, false);
    }

    public function delete_akun($id_user)
    {
        $data = array(
            'id_user' => $id_user
        );
        $this->M_lokasi->delete_akun($data);
        $this->session->set_flashdata('pesan', 'Data Akun Berhasil Dihapus !!');
        redirect('lokasi/tabelAkun');
    }

    public function tampilUbahPassword()
    {
        $data = array(
            'judul' => 'Ganti Password',
            'page' => 'auth/ganti_password',
        );
        $this->load->view('v_template', $data, false);
    }

    public function ubah_password()
    {

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[3]|matches[password_baru1]', [
            'matches' => 'Password baru tidak sama dengan ulangi password, silahkan masukkan ulang!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password_baru1', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[password_baru]');


        if ($this->form_validation->run() == False) {
            $data = array(
                'judul' => 'Ganti Password',
                'page' => 'auth/ganti_password'
            );
            $this->load->view('v_template', $data, false);
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password lama salah</div>');
                redirect('lokasi/ubah_password');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('lokasi/ubah_password');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password telah diubah</div>');
                    redirect('lokasi/ubah_password');
                }
            }
        }
    }
}
