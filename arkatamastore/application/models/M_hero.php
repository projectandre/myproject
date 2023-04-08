<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hero extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('tabel_hero');
        $this->db->order_by('tabel_hero.id_hero', 'ASC');   
        return $this->db->get()->result();
    }

    public function get_hero($id_hero)
    {
        $this->db->select('*');
        $this->db->from('tabel_hero');
        $this->db->where('id_hero', $id_hero);
        return $this->db->get()->row();
    }

    public function tambah_hero($data)
    {
        $this->db->insert('tabel_hero', $data);
    }

    public function edit_hero($id_hero)
    {
        $this->db->where('id_hero', $id_hero['id_hero']);
        $this->db->update('tabel_hero', $id_hero);
    }

    public function hapus_hero($delete)
    {
        $this->db->where('id_hero', $delete['id_hero']);
        $this->db->delete('tabel_hero', $delete);
    }

    public function edit_setujui($edit)
    {
        $this->db->where('id_hero', $edit['id_hero']);
        $this->db->update('tabel_hero', $edit);
    }
    public function edit_setujui_produk($edit)
    {
        $this->db->where('id_barang', $edit['id_barang']);
        $this->db->update('tabel_barang', $edit);
    }
}
