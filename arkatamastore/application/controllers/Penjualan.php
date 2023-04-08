<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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
            'judul' => 'Data Penjualan',
            'page' => 'admin/penjualan/page_penjualan',
            'data_order' => $this->M_penjualan->tampil_data('(tabel_penjualan.status = "Order") OR (tabel_penjualan.status = "Ditolak")')->result(),
            'data_proses' => $this->M_penjualan->tampil_data('tabel_penjualan.status = "Diproses"')->result(),
            'data_kirim' => $this->M_penjualan->tampil_data('tabel_penjualan.status = "Dikirim"')->result(),
            'data_selesai' => $this->M_penjualan->tampil_data('tabel_penjualan.status = "Diterima"')->result(),
        );
        $this->load->view('admin/index', $data, false);
    }

    public function edit_penjualan($id_penjualan)
    {

        $data = array(
            'judul' => 'Data Penjualan',
            'page' => 'admin/penjualan/page_edit_penjualan',
            'penjualan' => $this->M_penjualan->get_penjualan($id_penjualan),
            'detail' => $this->M_penjualan->tampil_datadetail($id_penjualan),
        );
        $this->load->view('admin/index', $data, false);
    }

    public function proses($id_penjualan)
    {
        $status = 'Diproses';
        $data = array(
            'id_pemesanan' => $id_penjualan,
            'status' => $status
        );
        $this->M_penjualan->edit_penjualan($data);
        $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Pesanan Berhasil Diproses !!</div>');
        redirect('penjualan');
            
    }

    public function ditolak($id_penjualan)
    {
        $status = 'Ditolak';
        $data = array(
            'id_pemesanan' => $id_penjualan,
            'status' => $status
        );
        $this->M_penjualan->edit_penjualan($data);
        $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Pesanan Ditolak !!</div>');
        redirect('penjualan');
            
    }

    public function kirim()
    {

        $no_resi = $this->db->get_where('tabel_penjualan', ['no_resi' => htmlspecialchars($this->input->post('no_resi', true))])->row_array();

         if ($no_resi) {
                $this->session->set_flashdata('pesan',  '<div class="alert alert-danger">No resi gagal ditambah ! No resi harus berbeda dari yang telah ada!</div>');
                redirect('penjualan');
            } else {

        $status = 'Dikirim';
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan'),
            'status' => $status,
            'no_resi' => $this->input->post('no_resi')
        );
        $this->M_penjualan->edit_penjualan($data);
        $this->session->set_flashdata('pesan',  '<div class="alert alert-success">Pesanan Berhasil Dikirim !!</div>');
        redirect('penjualan');

    }
            
    }

    public function hapus_penjualan($id_penjualan)
    {

        $data = array(
            'id_pemesanan' => $id_penjualan,
        );
        $this->M_penjualan->hapus_penjualan($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data Transaksi Berhasil Dihapus !!</div>');
        redirect('penjualan');
    }

    public function buktibayar($id_pemesanan)
    {

        $penjualan = $this->M_penjualan->get_penjualan($id_pemesanan);
        $foto = base_url('uploads/bukti/') . $penjualan->bukti_transfer;
        $logo = base_url('gambar/') . 'logo.png';
        echo "
            <div class='modal-header'>
                <h5 class='modal-title'>Bukti Pembayaran </h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                <div class='row justify-content-evenly'>
                    <div class=' col-sm-5'>
                        <img src=" . $foto . " width='100%'  alt='image'>
                    </div>
                    <div class=' col-sm-5 align-self-center'><br>                          
                        <b><h2 align='center'><img src=" . $logo . " width='47' height='47' alt='image'>  Arkatama Store</h2></b>
                        <h4 align='center'>Lihat Bukti Pembayaran</h4><br>
                        <table class='table'>
                        <tr>
                                <th>No Transaksi</th>
                                <td>" . $penjualan->no_order . "</td>
                            </tr>
                            <tr>
                                <th>Pembayaran atas nama</th>
                                <td>" . $penjualan->atas_nama . "</td>
                            </tr>
                            <tr>
                                <th>Bank</th>
                                <td>" . $penjualan->nama_bank . "</td>
                            </tr>
                            <tr>
                                <th>No rekening </th>
                                <td>" . $penjualan->no_rekening . "</td>
                            </tr>
                            <tr>
                                <th>Total yang harus dibayar</th>
                                <td>Rp. " . number_format($penjualan->total_bayar, 0, ',', '.') .  "</td>
                            </tr>
                        </table>
                    </div>
                        
                        <div class='modal-footer'>
                <button type='button' class='btn btn-secondary btnclosed' data-dismiss='modal'>Close</button>
            </div>
                    ";
       
    }


    public function search()
    {

        $keyword = $this->input->post('keyword');
        $data = array(
            'judul' => 'Data Penjualan',
            'page' => 'admin/penjualan/page_penjualan_search',
            'data_order' => $this->M_penjualan->get_keyword('tabel_penjualan.status = "Order"', $keyword)->result(),
            'data_ditolak' => $this->M_penjualan->get_keyword('tabel_penjualan.status = "Ditolak"', $keyword)->result(),
            'data_proses' => $this->M_penjualan->get_keyword('tabel_penjualan.status = "Diproses"',$keyword)->result(),
            'data_kirim' => $this->M_penjualan->get_keyword('tabel_penjualan.status = "Dikirim"',$keyword)->result(),
            'data_selesai' => $this->M_penjualan->get_keyword('tabel_penjualan.status = "Diterima"',$keyword)->result(),
        );
       $this->load->view('admin/index', $data, false);
    }

}
