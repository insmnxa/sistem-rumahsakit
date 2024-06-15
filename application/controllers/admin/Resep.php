<?php

use Mpdf\Mpdf;

class Resep extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('pasien_model');

        $pasiens = $this->pasien_model->get_pasien(0);

        $data = [
            'pasiens' => $pasiens
        ];

        $this->slice->view('pages.admin.resep.index', ['data' => $data]);
    }

    public function show()
    {
        $this->load->model('resep_model');
        $resep = $this->resep_model->get_resep();

        $data = [
            'resep' => $resep,
        ];

        $this->slice->view('pages.admin.resep.shows', ['data' => $data]);
    }

    public function create(string $id)
    {
        $this->load->model('pasien_model');

        $pasien = $this->pasien_model->get_pasien(false, $id);

        $data = [
            'pasien' => $pasien,
        ];

        $this->slice->view('pages.admin.resep.create', ['data' => $data]);
    }

    public function store(string $id)
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('kode[]', 'Kode Obat', ['required', 'trim', 'max_length[17]']);
            $this->form_validation->set_rules('satuan[]', 'Satuan', ['required', 'trim', 'in_list[pcs,kpl,tbl,btl]']);
            $this->form_validation->set_rules('qty[]', 'Jumlah', ['required', 'trim', 'numeric']);
            $this->form_validation->set_rules('sub_total[]', 'Sub Total', ['required', 'trim', 'numeric']);

            if ($this->form_validation->run() === FALSE) {
                $this->load->model('pasien_model');

                $pasien = $this->pasien_model->get_pasien($id);

                $data = [
                    'pasien' => $pasien
                ];

                $this->slice->view('pages.admin.resep.create', ['data' => $data]);
            } else {
                $this->load->model('resep_model');

                $arr_kode = $this->input->post('kode', true);
                $arr_satuan = $this->input->post('satuan', true);
                $arr_qty = $this->input->post('qty', true);
                $arr_sub_total = $this->input->post('sub_total', true);

                $id_pasien = $id;
                $id_dokter = $this->input->post('id_dokter');
                $total_harga = $this->input->post('total_harga');

                $this->resep_model->store($id_pasien, $id_dokter, $total_harga, $arr_kode, $arr_satuan, $arr_qty, $arr_sub_total);
                redirect(base_url('index.php/admin/resep'));
            }
        }
    }

    public function print()
    {
        $this->load->library('pdf');

        $this->data['title_pdf'] = 'Resep Pasien';

        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = "resep-obat.pdf";
        $this->pdf->load_view('pages/admin/resep/example');
    }

    public function edit()
    {
    }

    public function delete()
    {
    }
}
