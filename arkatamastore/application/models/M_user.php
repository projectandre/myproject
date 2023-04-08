<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public function tampil_data_home()
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->limit(15);
        $this->db->order_by('tabel_barang.id_barang', 'DESC');   
        return $this->db->get()->result();
    }

    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->order_by('tabel_barang.id_barang', 'DESC'); 
        return $this->db->get()->result();
    }

    public function tampil_data_kategori()
    {
        return $this->db->get('tabel_kategori')->result_array();
    }

    public function tambah_user($data)
    {
        $this->db->insert('tabel_user', $data);
    }

    public function kategori($id_kategori)
    {
        $sql = "SELECT  tb.*, tk.nama_kategori
                FROM    tabel_barang tb
                LEFT JOIN tabel_kategori tk ON tk.id_kategori = tb.id_kategori 
                
                WHERE tk.id_kategori = '$id_kategori'
                ORDER BY tb.id_barang DESC ";

        return $this->db->query($sql)->result_array();
    }

    public function ambil_kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tabel_kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->result_array();
    }

    public function search_data($keyword)
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('harga_barang', $keyword);
        return $this->db->get()->result_array();
    }

    public function tampil_detail($id_barang)
    {
        $sql = "SELECT  tb.*, tk.nama_kategori
                FROM    tabel_barang tb
                LEFT JOIN tabel_kategori tk ON tk.id_kategori = tb.id_kategori 
                WHERE tb.id_barang = '$id_barang' ";;

        return $this->db->query($sql)->result();
    }

    public function tambah_keranjang($data)
    {
        $this->db->insert('tabel_keranjang', $data);
    }

    public function tambah_detail($data)
    {
        $this->db->insert('tabel_detail_penjualan', $data);
    }

    public function checkout($data)
    {
        $this->db->insert('tabel_penjualan', $data);
    }

    public function tampil_riwayat($where)
    {
        $this->db->select('*');
        $this->db->from('tabel_penjualan');
        $this->db->join('tabel_user', 'tabel_penjualan.id_user = tabel_user.id_user', 'inner');
        $this->db->where($where);
        $this->db->order_by('tabel_penjualan.id_pemesanan', 'DESC');        
        $query = $this->db->get();
        return $query;
    }

    public function update_jumlah_keranjang($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tabel_keranjang', $data);
    }

    public function update($data)
    {
        $this->db->where('id_pemesanan', $data['id_pemesanan']);
        $this->db->update('tabel_penjualan', $data);
    }

    public function tampil_keranjang()
    {
        $id_user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('tabel_keranjang');
        $this->db->join('tabel_barang', 'tabel_keranjang.id_barang = tabel_barang.id_barang', 'inner');
        $this->db->where('tabel_keranjang.id_user', $id_user);
        $query = $this->db->get();
        return $query;
    }

    public function delete_keranjang($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tabel_keranjang');
    }

    public function hapus_detail_keranjang($id)
    {
        $this->db->where('id_keranjang', $id);
        $this->db->delete('tabel_keranjang');
    }

    public function cek_id_pemesanan_terkahir()
    {
        $query = $this->db->query("SELECT MAX(id_pemesanan) as id_pemesanan from tabel_penjualan");
        $hasil = $query->row();
        return $hasil->id_pemesanan;
    }

    public function detail_pemesanan($where)
    {
        $this->db->select('*');
		$this->db->from('tabel_detail_penjualan');
		$this->db->join('tabel_barang','tabel_detail_penjualan.id_barang = tabel_barang.id_barang', 'inner');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
    }


    public function tambahTesti($data)
    {
        $this->db->insert('tabel_testimoni', $data);
    }

    

    public function tampil_testimoni()
    {
        $sql = "    SELECT  *
                    FROM    tabel_testimoni tt
                    LEFT JOIN tabel_user user ON tt.id_user = user.id_user
                    ORDER BY tt.id_testi DESC
                    LIMIT 10
                     ";

        return $this->db->query($sql)->result_array();
    }
}
