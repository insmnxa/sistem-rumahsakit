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

    public function get_pasien(string $id = '') 
    {
        if ($id) {
            $query = $this->db->get_where($this->_table, ['id' => $id]);
            $user = $query->row();
            return $user;
        }

        $query = $this->db->get($this->_table);
        $users = $query->result();
        return $users;
    }

    public function store(string $nama, $tgl_lahir, $no_ktp, $no_telp, $id_dokter) 
    {
        $this->id = uniqid('PSN-');
        $this->nama = $nama;
        $this->tgl_lahir = $tgl_lahir;
        $this->no_ktp = $no_ktp;
        $this->no_telp = $no_telp;
        $this->id_dokter = $id_dokter;
        $this->db->insert($this->_table, $this);
    }

    public function update(string $id, $nama, $tgl_lahir, $no_ktp, $no_telp, $id_dokter) {
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