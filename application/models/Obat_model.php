<?php 

class Obat_model extends CI_Model 
{
    public $id;
    public $merk;
    public $harga;
    public $stok;
    public $id_kategori;

    private $_table = 'obat';

    public function get_obat(string $id = '')
    {
        if (!empty($id)) {
            $query = $this->db->get_where($this->_table, ['id' => $id]);
            $obat = $query->row();
            return $obat;
        }

        $query = $this->db->get($this->_table);
        $obats = $query->result();
        return $obats;
    }

    public function store(string $merk, $id_kategori, int $stok, float $harga)
    {
        $this->id = uniqid('OBT-');
        $this->merk = $merk;
        $this->id_kategori = $id_kategori;
        $this->stok = $stok;
        $this->harga = $harga;

        $this->db->insert($this->_table, $this);
    }

    public function update(string $id, $merk, $id_kategori, int $stok, float $harga)
    {
        $data = [
            'merk' => $merk,
            'stok' => $stok,
            'harga' => $harga,
            'id_kategori' => $id_kategori
        ];

        $this->db->update($this->_table, $data, ['id' => $id]);
    }

    public function destroy(string $id)
    {
        $this->db->delete($this->_table, ['id' => $id]);
    }
}