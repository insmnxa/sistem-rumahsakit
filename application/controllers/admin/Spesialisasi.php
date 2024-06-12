<?php

class Spesialisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->load->model('spesialisasi_model');
        $spesialisasi = $this->spesialisasi_model->get_spesialisasi();

        $data = [
            'spesialisasi' => $spesialisasi,
        ];

        $this->slice->view('pages.admin.spesialisasi.index', ['data' => $data]);
    }

    public function create() {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Spesialisasi', ['required', 'trim', 'max_length[128]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.spesialisasi.create');
            } else {
                $this->load->model('spesialisasi_model');

                $nama = $this->input->post('nama');

                $this->spesialisasi_model->store($nama);
                redirect(base_url('index.php/admin/spesialisasi'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->slice->view('pages.admin.spesialisasi.create');
        }
    }

    public function edit(string $id) {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Spesialisasi', ['required', 'trim', 'max_length[128]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.spesialisasi.create');
            } else {
                $this->load->model('spesialisasi_model');

                $nama = $this->input->post('nama');

                $this->spesialisasi_model->update($id, $nama);
                redirect(base_url('index.php/admin/spesialisasi'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->load->model('spesialisasi_model');
            $spesialisasi = $this->spesialisasi_model->get_spesialisasi($id);

            $data = [
                'spesialisasi' => $spesialisasi
            ];

            $this->slice->view('pages.admin.spesialisasi.edit',  ['data' => $data]);
        }
    }

    public function delete(string $id) {
        $this->load->model('spesialisasi_model');
        $this->spesialisasi_model->destroy($id);
        redirect(base_url('index.php/admin/spesialisasi'));
    }
}