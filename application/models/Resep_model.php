<?php

class Resep_model extends CI_Model
{
    public $id;
    public $qty;
    public $sub_total;
    public $satuan;
    public $id_resep;
    public $id_obat;

    private $_table = 'resep';

    public function store(string $id_pasien, $id_dokter, int $total_harga, array $kode_obat, $satuan, $qty, $sub_total)
    {
        $data_resep = [
            'id' => uniqid('RSP-'),
            'total_harga' => $total_harga,
            'id_pasien' => $id_pasien,
            'id_dokter' => $id_dokter
        ];

        $data_detail_resep = [];

        foreach ($kode_obat as $key => $value) {
            $data_detail_resep[] = [
                'id' => uniqid('DRP-'),
                'id_obat' => $value,
                'id_resep' => $data_resep['id'],
                'qty' => $qty[$key],
                'satuan' => $satuan[$key],
                'sub_total' => $sub_total[$key],
            ];
        }

        $this->db->insert($this->_table, $data_resep);
        $this->db->insert_batch('detail_resep', $data_detail_resep);
        self::mark_receipt_as_made($id_pasien);
    }

    public function get_resep()
    {
        $this->db->select('resep.*, resep.id ri, pasien.id, pasien.nama pa, dokter.id, dokter.nama da');
        $this->db->from('resep');
        $this->db->join('pasien', 'resep.id_pasien = pasien.id');
        $this->db->join('dokter', 'resep.id_dokter = dokter.id');
        $this->db->group_by('resep.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_resep_with_details(string $id)
    {
        $this->db->select('resep.*, detail_resep.*');
        $this->db->from('resep');
        $this->db->join('detail_resep', 'resep.id = detail_resep.id_resep');
        $this->db->where('resep.id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    private function mark_receipt_as_made(string $resep_id)
    {
        $this->db->set('is_receipt_made', 1);
        $this->db->where('id', $resep_id);
        $this->db->update('pasien');
    }

    public function get_receipt_by_patient_name(string $nama)
    {
        $this->db->select('id');
        $this->db->from('resep');
        $this->db->where('resep.id');
    }
}
