<?php

class Pasien_model extends CI_Model
{
    public $id;
    public $nama;
    public $tgl_lahir;
    public $no_ktp;
    public $no_telp;
    public $id_dokter;
    public $id_user;

    private $_table = 'pasien';

    public function get_pasien($is_receipt_made = null, string $id = '')
    {
        if ($id) {
            $query = $this->db->get_where($this->_table, ['id' => $id]);
            $pasien = $query->row();
            return $pasien;
        }

        if (isset($is_receipt_made)) {
            $query = $this->db->get_where($this->_table, ['is_receipt_made' => $is_receipt_made]);
            $pasiens = $query->result();
            return $pasiens;
        } else {
            $this->db->select('pasien.*, dokter.id, dokter.nama dn, users.id, users.nama un');
            $this->db->from('pasien');
            $this->db->join('dokter', 'dokter.id = pasien.id_dokter');
            $this->db->join('users', 'users.id = pasien.id_user');
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function store(string $nama, $tgl_lahir, $no_ktp, $no_telp, $id_dokter, $id_user)
    {
        $this->id = uniqid('PSN-');
        $this->nama = $nama;
        $this->tgl_lahir = $tgl_lahir;
        $this->no_ktp = $no_ktp;
        $this->no_telp = $no_telp;
        $this->id_dokter = $id_dokter;
        $this->id_user = $id_user;

        $this->db->insert($this->_table, $this);
    }

    public function update(string $id, $nama, $tgl_lahir, $no_ktp, $no_telp, $id_dokter)
    {
        $data = [
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'no_ktp' => $no_ktp,
            'no_telp' => $no_telp,
            'id_dokter' => $id_dokter,
        ];

        $this->db->update($this->_table, $data, ['id' => $id]);
    }

    public function destroy(string $id)
    {
        $this->db->delete($this->_table, ['id' => $id]);
    }
}
