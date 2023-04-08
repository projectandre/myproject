<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Keranjang extends CI_Controller
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
        $data['data_keranjang'] = $this->M_user->tampil_keranjang()->result();
        $this->load->view('user/page_keranjang', $data);
    }

    public function tambah_keranjang()
    {
        $id             = $this->input->post('id');
        $jumlah         = $this->input->post('jumlah');
        $id_pelanggan     = $this->session->userdata('id_user');
        $check = $this->db->get_where('tabel_keranjang', ['id_user' => $id_pelanggan, 'id_barang' => $id])->row_array();
        if ($check) {
            $data = array(
                'id_barang'        => $id,
                'id_user'        => $id_pelanggan,
                'jumlah'        => $check['jumlah'] + $jumlah
            );
            $this->M_user->update_jumlah_keranjang($data);

            $result['result'] = 2;
        } else {
            $data = array(
                'id_barang'        => $id,
                'id_user'    => $id_pelanggan,
                'jumlah'        => $jumlah
            );

            $this->M_user->tambah_keranjang($data);

            $result['result'] = 1;
        }

        echo json_encode($result);
    }

    public function update_keranjang()
    {
        $r         = $this->input->post('row');
        $i = 0;
        for ($x = 0; $x < $r; $x++) {
            $data = array(
                'id_barang'        => $this->input->post('id_barang_' . $i . ''),
                'id_user'        => $this->session->userdata('id_user'),
                'jumlah'        => $this->input->post('jumlah_' . $i . '')
            );
            $this->M_user->update_jumlah_keranjang($data);
            $i++;
        }

        $this->session->set_flashdata('message',  '<div class="alert alert-success">Jumlah produk berhasil diubah</div>');
        redirect('keranjang');
    }

    public function delete_keranjang()
    {
        $id             = $this->input->post('id');
        $this->M_user->hapus_detail_keranjang($id);

        $result['result'] = 1;
        echo json_encode($result);
    }

    public function checkout()
    {
        $kota = $this->input->post('destination');
        $province = $this->input->post('propinsi_tujuan');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=" . $kota . "&province=" . $province,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: bd56c82a0878156ec33a8d914e80885c"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $data = json_decode($response, true);

        $new_prov = $data['rajaongkir']['results']['province'];
        $new_city = $data['rajaongkir']['results']['city_name'];


        $id_user     = $this->session->userdata('id_user');

        $data = array(
            'no_order'        => mt_rand(),
            'id_user'         => $id_user,
            'tgl_pemesanan'   => date('Y-m-d'),
            'biaya_kirim'     => $this->input->post('biaya_kirim'),
            'total_bayar'     => $this->input->post('total'),
            'no_telp'         => $this->input->post('no_telp'),
            'alamat'          => $this->input->post('alamat'),
            'kurir'           => $this->input->post('courier'),
            'jenis_ongkir'    => $this->input->post('jenis_ongkir'),
            'provinsi'        => $new_prov,
            'kota'            => $new_city,
            'status'          => 'Order'
        );
        $this->M_user->checkout($data);

        $id_pemesanan = $this->M_user->cek_id_pemesanan_terkahir();


        $keranjang         = $this->M_user->tampil_keranjang()->result();
        foreach ($keranjang as $row_keranjang) {

            $data = array(
                'id_pemesanan'     => $id_pemesanan,
                'id_barang'     => $row_keranjang->id_barang,
                'jumlah'        => $row_keranjang->jumlah,
                'harga_satuan'    => $row_keranjang->harga_barang,
                'sub_total'        => $row_keranjang->jumlah * $row_keranjang->harga_barang
            );
            $this->M_user->tambah_detail($data);
        }
        $this->M_user->delete_keranjang($id_user);

        $result['result'] = 1;
        echo json_encode($result);
    }

    public function detail_keranjang($id)
    {
        $detail = $this->M_user->detail_pemesanan('id_pemesanan = ' . $id . '')->result();
        $penjualan = $this->M_penjualan->get_penjualan($id);

        echo "
            <div class='modal-header'>
                <h5 class='modal-title'>Detail Pemesanan </h5>
            </div>
            <div class='modal-body'>
                <div class='row'>
                    <div class='col-sm-12>
                    
                        <div class='col-sm-4'><b>No. Transaksi</b> : " . $penjualan->no_order . "</div>
                        <div class='col-sm-4'><b>Nama Pemesan</b> : " . $penjualan->nama . "</div>
                        <div class='col-sm-4'><b>No. Telp</b> : " . $penjualan->no_telp . "</div>
                        <div class='col-sm-4'><b>Tanggal Pemesanan</b> : " . $penjualan->tgl_pemesanan . " </div>
                        <div class='col-sm-4'><b>Provinsi</b> : " . $penjualan->provinsi . "</div>
                        <div class='col-sm-4'><b>Kota</b> : " . $penjualan->kota . "</div>
                        <div class='col-sm-4'><b>Alamat</b> : " . $penjualan->alamat . "</div>    
                   
                    </div>
                        <hr>
                    <div class='col-12>
                        <div class='table-content table-responsive'>
                            <table class='table table-responsive table-content'>
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th style='text-align: right;'>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>";
        $total_produk = 0;
        foreach ($detail as $row_order) {
            $total_produk = $total_produk + $row_order->sub_total;
            echo "
                                            <tr>
                                                <td>" . $row_order->nama_barang . "</td>
                                                <td>Rp. " . number_format($row_order->harga_satuan, 0, ',', '.') . "</td>
                                                <td>" . $row_order->jumlah . "</td>
                                                <td align='right'>Rp. " . number_format($row_order->sub_total, 0, ',', '.') . "</td>
                                            </tr>
                                        ";
        }

        echo "
                                            <tr align='right'>
                                                <td></td>
                                                <td></td>
                                                <td>Total Produk</td>
                                                <td>Rp. " . number_format($total_produk, 0, ',', '.') . "</td>
                                            </tr>

                                            <tr align='right'>
                                                <td colspan='3'>Biaya Ongkir <b>(" . $penjualan->kurir . " - " . $penjualan->jenis_ongkir . ")</b></td>
                                                <td>Rp. " . number_format($penjualan->biaya_kirim, 0, ',', '.') . "</td>
                                            </tr>

                                            <tr align='right'>
                                                <td></td>
                                                <td></td>
                                                <td><b>Total</b></td>
                                                <td><b>Rp. " . number_format($penjualan->total_bayar, 0, ',', '.') . "</b></td>
                                            </tr>
                                        ";
        echo "
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary btnclose' data-dismiss='modal'>Close</button>
            </div>
        ";
    }
}
