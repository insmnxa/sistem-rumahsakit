<?php

class Dokter_model extends CI_Model
{
    public $id;
    public $nama;
    public $nip;
    public $alamat;
    public $no_telp;
    public $id_spesialisasi;

    private $_table = 'dokter';

    public function get_dokter(string $id = '') 
    {
        if ($id) {
            $query = $this->db->get_where($this->_table, ['id' => $id]);
            $dokter = $query->row();
            return $dokter;
        }

        $query = $this->db->get($this->_table);
        $dokters = $query->result();
        return $dokters;
    }

    public function store(string $nama, $nip, $alamat, $no_telp, $id_spesialisasi)
    {
        $this->id = uniqid('DKT-');
        $this->nama = $nama;
        $this->nip = $nip;
        $this->alamat = $alamat;
        $this->no_telp = $no_telp;
        $this->id_spesialisasi = $id_spesialisasi;

        $this->db->insert($this->_table, $this);
    }

    public function update(string $id, $nama, $nip, $alamat, $no_telp, $id_spesialisasi)
    {
        $data = [
            'nama' => $nama,
            'nip' => $nip,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'id_spesialisasi' => $id_spesialisasi,
        ];

        $this->db->update($this->_table, $data, ['id' => $id]);
    }

    public function destroy(string $id)
    {
        $this->db->delete($this->_table, ['id' => $id]);
    }
}