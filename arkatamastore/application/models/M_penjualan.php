<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penjualan extends CI_Model
{
    public function tampil_data($where)
    {
        $this->db->select('*');
        $this->db->from('tabel_penjualan');
        $this->db->join('tabel_user','tabel_penjualan.id_user = tabel_user.id_user', 'inner');
        $this->db->where($where);
        $this->db->order_by('tabel_penjualan.id_pemesanan', 'DESC');
        return $this->db->get();
    }

    public function tampil_data_laporan($where)
    {
        $this->db->select('*');
        $this->db->from('tabel_penjualan');
        $this->db->join('tabel_user','tabel_penjualan.id_user = tabel_user.id_user', 'inner');

        $this->db->where($where);
        $this->db->order_by('tabel_penjualan.id_pemesanan', 'ASC');
        return $this->db->get();
    }

    public function get_penjualan($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('tabel_penjualan');
        $this->db->join('tabel_user','tabel_penjualan.id_user = tabel_user.id_user', 'inner');
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->get()->row();
    }

    public function tampil_datadetail($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('tabel_detail_penjualan');
        $this->db->join('tabel_barang','tabel_detail_penjualan.id_barang = tabel_barang.id_barang', 'inner');
        $this->db->where('tabel_detail_penjualan.id_pemesanan', $id_pemesanan);
       return $this->db->get()->result();
    }

    public function tambah_pemesanan($data)
    {
        $this->db->insert('tabel_penjualan', $data);
    }

    public function edit_penjualan($data)
    {
        $this->db->where('id_pemesanan', $data['id_pemesanan']);
        $this->db->update('tabel_penjualan', $data);
    }

    public function hapus_penjualan($delete)
    {
        $this->db->where('id_pemesanan', $delete['id_pemesanan']);
        $this->db->delete('tabel_penjualan', $delete);
    }

    public function edit_konfirmasi($edit)
    {
        $this->db->where('id_pemesanan', $edit['id_pemesanan']);
        $this->db->update('tabel_penjualan', $edit);
    }

    public function get_keyword($where,$keyword)
    {
        $this->db->select('*');
        $this->db->from('tabel_penjualan');
        $this->db->join('tabel_user','tabel_penjualan.id_user = tabel_user.id_user', 'inner');
        $this->db->where($where);
        $this->db->order_by('tabel_penjualan.tgl_pemesanan', 'DESC');
        $this->db->like('no_order', $keyword);

        return $this->db->get();
    }

    public function get_keyword2($where,$where2,$keyword)
    {
        $this->db->select('*');
        $this->db->from('tabel_penjualan');
        $this->db->join('tabel_user','tabel_penjualan.id_user = tabel_user.id_user', 'inner');
        $this->db->where($where,$where2);
        $this->db->order_by('tabel_penjualan.tgl_pemesanan', 'DESC');
        $this->db->like('no_order', $keyword);

        return $this->db->get();
    }

}
