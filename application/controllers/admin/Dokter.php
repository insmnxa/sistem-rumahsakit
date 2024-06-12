<?php

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->load->model(['dokter_model', 'spesialisasi_model']);
        $dokter = $this->dokter_model->get_dokter();


        $data = [
            'dokters' => $dokter,

        ];

        $this->slice->view('pages.admin.dokter.index', ['data' => $data]);
    }

    public function create() {
        if ($this->input->method() === 'post' ) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', ['required', 'trim', 'max_length[128]']);
            $this->form_validation->set_rules('nip', 'NIP', ['required', 'trim', 'max_length[18]']);
            $this->form_validation->set_rules('alamat', 'Alamat', ['required', 'trim']);
            $this->form_validation->set_rules('no_telp', 'No Telepon', ['required', 'trim', 'max_length[20]']);
            $this->form_validation->set_rules('id_spesialisasi', 'Spesialisasi', ['required', 'trim', 'max_length[17]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.dokter.create');
            } else {
                $this->load->model('dokter_model');

                $nama = $this->input->post('nama');
                $nip = $this->input->post('nip');
                $alamat = $this->input->post('alamat');
                $no_telp = $this->input->post('no_telp');
                $id_spesialisasi = $this->input->post('id_spesialisasi');

                $this->dokter_model->store($nama, $nip, $alamat, $no_telp, $id_spesialisasi);
                redirect(base_url('index.php/admin/dokter'));
            }
        }

        if ($this->input->method() === 'get' ) {
            $this->load->model('spesialisasi_model');
            $spesialisasi = $this->spesialisasi_model->get_spesialisasi();
            
            $data = [
                'spesialisasi' => $spesialisasi
            ];

            $this->slice->view('pages.admin.dokter.create', $data);
        }
    }

    public function edit(string $id) {

        if ($this->input->method() === 'post' ) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', ['required', 'trim', 'max_length[128]']);
            $this->form_validation->set_rules('nip', 'NIP', ['required', 'trim', 'max_length[18]']);
            $this->form_validation->set_rules('alamat', 'Alamat', ['required', 'trim']);
            $this->form_validation->set_rules('no_telp', 'No Telepon', ['required', 'trim', 'max_length[20]']);
            $this->form_validation->set_rules('id_spesialisasi', 'Spesialisasi', ['required', 'trim', 'max_length[17]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.dokter.edit');
            } else {
                $this->load->model('dokter_model');

                $nama = $this->input->post('nama');
                $nip = $this->input->post('nip');
                $alamat = $this->input->post('alamat');
                $no_telp = $this->input->post('no_telp');
                $id_spesialisasi = $this->input->post('id_spesialisasi');

                $this->dokter_model->update($id, $nama, $nip, $alamat, $no_telp, $id_spesialisasi);
                redirect(base_url('index.php/admin/dokter'));
            }
        }

        if ($this->input->method() === 'get' ) {
            $this->load->model('dokter_model');
            $dokter = $this->dokter_model->get_dokter($id);

            $data = [
                'dokter' => $dokter,
            ];

            $this->slice->view('pages.admin.dokter.edit', $data);
        }
    }

    public function delete(string $id) {
        $this->load->model('dokter_model');
        $this->dokter_model->destroy($id);
        redirect(base_url('index.php/admin/dokter'));
    }
}