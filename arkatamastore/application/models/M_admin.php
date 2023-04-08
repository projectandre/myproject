<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function tampil_total_pesanan_customer($where)
    {
        $this->db->where($where);
            $query = $this->db->get('tabel_penjualan');
            return $query->num_rows();
    }

    public function tampil_produk_dashboard_manager($where)
    {
        $this->db->where($where);
            $query = $this->db->get('tabel_barang');
            return $query->num_rows();
    }

    public function tampil_hero_dashboard_manager($where)
    {
        $this->db->where($where);
            $query = $this->db->get('tabel_hero');
            return $query->num_rows();
    }

    public function tampil_data_barang()
    {
        // $this->db->select('*');
        // $this->db->from('tabel_barang');
        // return $this->db->get()->result();

        $sql = "    SELECT  tb.*, k.nama_kategori
                    FROM    tabel_barang tb
                    LEFT JOIN tabel_kategori k ON k.id_kategori = tb.id_kategori
                    ORDER BY tb.stok_barang ASC ";

        return $this->db->query($sql)->result_array();
    }

    public function tampil_data_barang_manager()
    {
        // $this->db->select('*');
        // $this->db->from('tabel_barang');
        // return $this->db->get()->result();

        $sql = "    SELECT  tb.*, k.nama_kategori
                    FROM    tabel_barang tb
                    LEFT JOIN tabel_kategori k ON k.id_kategori = tb.id_kategori
                    ORDER BY tb.status_produk = 'belum disetujui' DESC ";

        return $this->db->query($sql)->result_array();
    }

    public function tambah_barang($data)
    {
        $this->db->insert('tabel_barang', $data);
    }

    public function edit_barang($edit)
    {
        $this->db->where('id_barang', $edit['id_barang']);
        $this->db->update('tabel_barang', $edit);
    }

    public function hapus_barang($delete)
    {
        $this->db->where('id_barang', $delete['id_barang']);
        $this->db->delete('tabel_barang', $delete);
    }



    public function detail_barang($id_barang)
    {
        $sql = "    SELECT  jp.*, m.nama_kategori
                    FROM    tabel_barang jp
                    LEFT JOIN tabel_kategori m ON m.id_kategori = jp.id_kategori 
                    WHERE jp.id_barang = '$id_barang' ";
        return $this->db->query($sql)->result_array();
    }

    public function get_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tabel_barang');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }

    public function tampil_data_kategori()
    {   
        $this->db->order_by('tabel_kategori.id_kategori', 'ASC');
        return $this->db->get('tabel_kategori')->result_array();
    }

    public function tambah_kategori($data)
    {
        $this->db->insert('tabel_kategori', $data);
    }

    public function edit_kategori($edit)
    {
        $this->db->where('id_kategori', $edit['id_kategori']);
        $this->db->update('tabel_kategori', $edit);
    }

    public function hapus_kategori($delete)
    {
        $this->db->where('id_kategori', $delete['id_kategori']);
        $this->db->delete('tabel_kategori', $delete);
    }

    public function detail_kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tabel_kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }

    public function ambil_barang($where)
    {
        return $this->db->get_where('tabel_barang', $where);
    }

    public function tampil_data_customers()
    {
        $this->db->select('*');
        $this->db->from('tabel_user');
        $this->db->where('role_id', 3);
        return $this->db->get()->result();
    }

    public function tampil_data_admin()
    {
        $this->db->select('*');
        $this->db->from('tabel_user');
        $this->db->where('role_id', 2);
        return $this->db->get()->result();
    }

    public function tampil_data_manager()
    {
        $this->db->select('*');
        $this->db->from('tabel_user');
        $this->db->where('role_id', 1);
        return $this->db->get()->result();
    }

    public function tampil_data_role()
    {
        $this->db->select('*');
        $this->db->from('tabel_role');
        return $this->db->get()->result();
    }

    public function delete_akun($delete)
    {
        $this->db->where('id_user', $delete['id_user']);
        $this->db->delete('tabel_user', $delete);
    }

    public function tampil_testimoni_admin()
    {
        $sql = "    SELECT  *
                    FROM    tabel_testimoni tt
                    LEFT JOIN tabel_user user ON tt.id_user = user.id_user
                    ORDER BY tt.id_testi DESC
                    
                     ";

        return $this->db->query($sql)->result_array();
    }


    public function delete_testi($delete)
    {
        $this->db->where('id_testi', $delete['id_testi']);
        $this->db->delete('tabel_testimoni', $delete);
    }


    // search
    public function search_produk($keyword)
    {
        
        // $this->db->select('*');
        // $this->db->from('tabel_barang');
        // return $this->db->get()->result();

        $sql = "    SELECT  jp.*, m.nama_kategori
                    FROM    tabel_barang jp
                    LEFT JOIN tabel_kategori m ON m.id_kategori = jp.id_kategori
                    WHERE jp.nama_barang LIKE '%$keyword%' OR m.nama_kategori LIKE '%$keyword%' OR jp.status_produk LIKE '%$keyword%'
                    ORDER BY jp.id_barang DESC ";

        return $this->db->query($sql)->result_array();
    }

    public function search_customers($keyword)
    {
        $this->db->select('*');
        $this->db->from('tabel_user');
        $this->db->where('role_id', 3);
        $this->db->like('nama', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get()->result();
    }

    public function search_admin($keyword)
    {
        $this->db->select('*');
        $this->db->from('tabel_user');
        $this->db->where('role_id', 2);
        $this->db->like('nama', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get()->result();
    }

    public function search_manager($keyword)
    {
        $this->db->select('*');
        $this->db->from('tabel_user');
        $this->db->where('role_id', 1);
        $this->db->like('nama', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get()->result();
    }

    public function search_testi($keyword)
    {
        $sql = "    SELECT  *
                    FROM    tabel_testimoni tt
                    LEFT JOIN tabel_user user ON tt.id_user = user.id_user
                    WHERE tt.komentar LIKE '%$keyword%' OR user.nama LIKE '%$keyword%' OR user.email LIKE '%$keyword%'
                    ORDER BY tt.id_testi DESC
                     ";

        return $this->db->query($sql)->result_array();
    }

    // close search
}
