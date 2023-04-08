<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lokasi extends CI_Model
{
    public function alldata()
    {
        $this->db->select('*');
        $this->db->from('tabel_data');
        return $this->db->get()->result();
    }

    public function input($data)
    {
        $this->db->insert('tabel_data', $data);
    }

    public function detail($id_kantor)
    {
        $this->db->select('*');
        $this->db->from('tabel_data');
        $this->db->where('id_data', $id_kantor);
        return $this->db->get()->row();
    }

    public function edit($edit)
    {
        $this->db->where('id_data', $edit['id_data']);
        $this->db->update('tabel_data', $edit);
    }

    public function delete($delete)
    {
        $this->db->where('id_data', $delete['id_data']);
        $this->db->delete('tabel_data', $delete);
    }
    public function tampil_data_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }
    public function delete_akun($delete)
    {
        $this->db->where('id_user', $delete['id_user']);
        $this->db->delete('user', $delete);
    }
}
