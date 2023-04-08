<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Riwayat extends CI_Controller
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
        $id_user = $this->session->userdata('id_user');
        $data['data_order'] = $this->M_user->tampil_riwayat('(tabel_penjualan.status = "Order" and tabel_penjualan.id_user = '.$id_user.') OR (tabel_penjualan.status = "Ditolak" and tabel_penjualan.id_user = '.$id_user.')')->result();
        $data['data_proses'] = $this->M_user->tampil_riwayat('tabel_penjualan.status = "Diproses" and tabel_penjualan.id_user = '.$id_user.'')->result();
        $data['data_kirim'] = $this->M_user->tampil_riwayat('tabel_penjualan.status = "Dikirim" and tabel_penjualan.id_user = '.$id_user.'')->result();
        $data['data_terima'] = $this->M_user->tampil_riwayat('tabel_penjualan.status = "Diterima" and tabel_penjualan.id_user = '.$id_user.'')->result();
        $this->load->view('user/page_riwayat', $data);
    }

    public function bayar($id)
    {
        $id_user = $this->session->userdata('id_user');
        $data['id_penjualan'] = $id;
        $data['data_order'] = $this->M_user->tampil_riwayat('tabel_penjualan.id_pemesanan = '.$id.'')->row();
        $this->load->view('user/page_bayar', $data);
    }

    public function updatebayar()
    {
        $id_pemesanan = htmlspecialchars($this->input->post('id_pemesanan', true));
        $atas_nama = htmlspecialchars($this->input->post('atas_nama', true));
        $nama_bank = htmlspecialchars($this->input->post('nama_bank', true));
        $no_rekening = htmlspecialchars($this->input->post('no_rekening', true));
        $bukti_transfer = $_FILES['bukti_transfer'];

        $image 						= time().'-'.$_FILES["bukti_transfer"]['name'];
        $config['upload_path']      = './uploads/bukti/';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';
        $config['file_name']  	    = str_replace(" ","_",$image);

        $this->upload->initialize($config);
        
        if ($this->upload->do_upload('bukti_transfer')) {
            $data = array(
                'id_pemesanan' => $id_pemesanan,
                'atas_nama' => $atas_nama,
                'nama_bank' => $nama_bank,
                'no_rekening' => $no_rekening,
                'bukti_transfer' => str_replace(" ","_",$image)
            );
            $this->M_user->update($data);
        }

        $this->session->set_flashdata('message',  '<div class="alert alert-success">Terimakasih, Bukti pembayaran berhasil di upload</div>');
        redirect('riwayat');
        
    }

    public function terima()
    {
        $id = htmlspecialchars($this->input->post('id_pesan', true));
        $rating = htmlspecialchars($this->input->post('rating', true));
        $komentar = htmlspecialchars($this->input->post('komentar', true));

        $status = 'Diterima';
        $data = array(
            'id_pemesanan' => $id,
            'status' => $status
        );

        $testi = array(
            'komentar' => $komentar,
            'id_user' => $this->session->userdata('id_user'),
        );
       $this->M_user->update($data);

       $this->M_user->tambahTesti($testi);

        
        redirect('riwayat');
            
    }

    public function hapus_penjualan($id_penjualan)
    {

        $data = array(
            'id_pemesanan' => $id_penjualan,
        );
        $this->M_penjualan->hapus_penjualan($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Transaksi Berhasil Dibatalkan !!</div>');
        redirect('riwayat');
    }


}
