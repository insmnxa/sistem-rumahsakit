<?php

class Spesialisasi_model extends CI_Model
{
    public $id;
    public $nama;

    private $_table = 'spesialisasi';

    public function get_spesialisasi(string $id = '')
    {
        if (!empty($id)) {
            $query = $this->db->get_where($this->_table, ['id' => $id]);
            $spesialisasi = $query->row();
            return $spesialisasi;
        }

        $query = $this->db->get($this->_table);
        $spesialisasis = $query->result();
        return $spesialisasis;
    }

    public function store($nama) 
    {
        $this->id = uniqid('SPL-');
        $this->nama = $nama;

        $this->db->insert($this->_table, $this);
    }

    public function update(string $id, $nama)
    {
        $data = [
            'nama' => $nama
        ];

        $this->db->update($this->_table, $data, ['id' => $id]);
    }

    public function destroy(string $id)
    {
        $this->db->delete($this->_table, ['id' => $id]);
    }
}