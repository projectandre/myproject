<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "third_party/dompdf/autoload.php";
 use Dompdf\Dompdf;
 define("DOMPDF_ENABLE_REMOTE", false);
class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // $this->output->set_header('Last-Modified:' . gmdate('D,d M Y H:i:s') . 'GMT');
        // $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
        // $this->output->set_header('Cache-Control:post-check=0,pre-check=0', false);
        // $this->output->set_header('Pragma: no-cache');

        $this->load->library('Pdf');
    }

    public function index()
    {
        $data = array(
            'judul' => 'Cetak Laporan Penjualan',
            'page' => 'admin/laporan',
        );
        $this->load->view('admin/index', $data, false);
    }

    public function cetak()
    {
        $tgl_awal             = $this->input->post('tgl_awal');
        $tgl_akhir             = $this->input->post('tgl_akhir');

        $data = array(
            'judul' => 'Data Penjualan',
            'tgl_awal'             => $this->input->post('tgl_awal'),
            'tgl_akhir'            => $this->input->post('tgl_akhir'),
            'data_penjualan'    => $this->M_penjualan->tampil_data('tabel_penjualan.status = "Diterima" and tabel_penjualan.tgl_pemesanan BETWEEN "' . date('Y-m-d', strtotime($tgl_awal)) . '" and "' . date('Y-m-d', strtotime($tgl_akhir)) . '" or tabel_penjualan.status = "Dikirim" and tabel_penjualan.tgl_pemesanan BETWEEN "' . date('Y-m-d', strtotime($tgl_awal)) . '" and "' . date('Y-m-d', strtotime($tgl_akhir)) . '" or tabel_penjualan.status = "Diproses" and tabel_penjualan.tgl_pemesanan BETWEEN "' . date('Y-m-d', strtotime($tgl_awal)) . '" and "' . date('Y-m-d', strtotime($tgl_akhir)) . '"')->result()
        );
        $this->load->view('admin/pdf/penjualan', $data, FALSE);
    }

     public function export()
    {

        $tgl_awal             = $this->input->post('tgl_awal');
        $tgl_akhir             = $this->input->post('tgl_akhir');


        $data = array(
            'judul' => 'Data Penjualan',
            'tgl_awal'             => $this->input->post('tgl_awal'),
            'tgl_akhir'            => $this->input->post('tgl_akhir'),
            'data_penjualan'    => $this->M_penjualan->tampil_data_laporan('tabel_penjualan.status = "Diterima" and tabel_penjualan.tgl_pemesanan BETWEEN "' . date('Y-m-d', strtotime($tgl_awal)) . '" and "' . date('Y-m-d', strtotime($tgl_akhir)) . '" or tabel_penjualan.status = "Dikirim" and tabel_penjualan.tgl_pemesanan BETWEEN "' . date('Y-m-d', strtotime($tgl_awal)) . '" and "' . date('Y-m-d', strtotime($tgl_akhir)) . '" or tabel_penjualan.status = "Diproses" and tabel_penjualan.tgl_pemesanan BETWEEN "' . date('Y-m-d', strtotime($tgl_awal)) . '" and "' . date('Y-m-d', strtotime($tgl_akhir)) . '"')->result()
        );
        $this->load->view('admin/pdf/cetak_laporan', $data, FALSE);

        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();

        $pdf = new Dompdf();

        $pdf->setPaper($paper_size, $orientation);

        $pdf->loadHtml($html);
        $pdf->render();

        $pdf->stream("Data Laporan Penjualan Arkatama Store.pdf", array('Attachment' => 0));
    }
}
