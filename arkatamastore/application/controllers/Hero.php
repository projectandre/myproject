<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero extends CI_Controller
{

    public function index()
    {
        $data = array(
            'judul' => 'Setting Hero',
            'page' => 'admin/hero/page_hero',
            'hero' => $this->M_hero->tampil_data(),
        );
        $this->load->view('admin/index', $data, false);
    }

    public function tambah_hero()
    {

        $judul_hero = htmlspecialchars($this->input->post('judul_hero', true));
        $teks_hero = htmlspecialchars($this->input->post('teks_hero', true));
        $gambar_hero = $_FILES['gambar_hero'];

        if ($gambar_hero = '') {
        } else {
            $config['upload_path'] = './gambar/hero';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_hero')) {
                echo "gambar gagal upload!";
            } else {
                $gambar_hero = $this->upload->data('file_name');
            }

            $data = array(
                'gambar_hero' => $gambar_hero,
                'judul_hero' => $judul_hero,
                'teks_hero' => $teks_hero,
                'status_hero' => 'belum disetujui',
            );

            $this->M_hero->tambah_hero($data);
            $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Data Hero Berhasil Ditambah !!</div>');
            redirect('hero');
        }
    }

    public function edit_hero($id_hero)
    {

        $data = array(
            'judul' => 'Edit Data Hero',
            'page' => 'admin/hero/page_edit_hero',
            'hero' => $this->M_hero->get_hero($id_hero),
        );
        $this->load->view('admin/index', $data, false);
    }

    public function update_hero($id_hero)
    {
        $this->form_validation->set_rules('judul_hero', 'Judul Hero', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));

        $this->form_validation->set_rules('teks_hero', 'Teks Hero', 'required', array(
            'required' => '%s Wajib Diisi !'
        ));


        $judul_hero = htmlspecialchars($this->input->post('judul_hero', true));
        $teks_hero = htmlspecialchars($this->input->post('teks_hero', true));
        $gambar_hero = $_FILES['gambar_hero'];

        if ($gambar_hero = '') {
        } else {
            $config['upload_path'] = './gambar/hero';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_hero')) {
                $data = array(
                    'id_hero' => $id_hero,
                    'judul_hero' => $judul_hero,
                    'teks_hero' => $teks_hero,
                    'status_hero' => 'belum disetujui',
                );

                $this->M_hero->edit_hero($data);

                // Data berhasil diubah di db
                $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Data Hero Berhasil Diubah !!</div>');
                redirect('hero');
            } else {
                $barang = $this->M_hero->get_hero($id_hero);
                if ($barang->gambar_hero != "") {
                    unlink('./gambar/hero/' . $barang->gambar_hero);
                }
                $gambar_hero = $this->upload->data('file_name');
                $data = array(
                    'id_hero' => $id_hero,
                    'judul_hero' => $judul_hero,
                    'teks_hero' => $teks_hero,
                    'gambar_hero' => $gambar_hero
                );

                $this->M_hero->edit_hero($data);
                $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Data barang Berhasil Diubah !!</div>');
                redirect('hero');
            }
        }
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
        redirect('hero');
    }
}
