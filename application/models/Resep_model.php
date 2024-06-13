<?php

class Resep_model extends CI_Model
{
    public $id;
    public $qty;
    public $sub_total;
    public $satuan;
    public $id_resep;
    public $id_obat;

    private $_table = 'detail_resep';

    public function store(array $kode_obat, $satuan, $qty, $sub_total)
    {
        $data = [];

        $this->id = uniqid('RSP-');

        foreach ($kode_obat as $key => $value) {
            $data[] = [
                'id' => uniqid('DRP-'),
                'id_obat' => $value,
                'id_resep' => $this->id,
                'qty' => $qty[$key],
                'satuan' => $satuan[$key],
                'sub_total' => $sub_total[$key],
            ];
        }

        $this->db->insert_batch($this->_table, $data);
    }
}
