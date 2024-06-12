<?php

class Kategori_obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('kategori_obat_model');
        $kategori_obats = $this->kategori_obat_model->get_kategori_obat();

        $data = [
            'kategori_obats' => $kategori_obats
        ];

        $this->slice->view('pages.admin.kategori_obat.index', ['data' => $data]);
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', ['required', 'trim', 'max_length[128]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.kategori_obat.create');
            } else {
                $this->load->model('kategori_obat_model');

                $nama = $this->input->post('nama');

                $this->kategori_obat_model->store($nama);
                redirect(base_url('index.php/admin/kategori_obat'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->slice->view('pages.admin.kategori_obat.create');
        }
    }

    public function edit(string $id)
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', ['required', 'trim', 'max_length[128]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.kategori_obat.edit');
            } else {
                $this->load->model('kategori_obat_model');

                $nama = $this->input->post('nama');

                $this->kategori_obat_model->update($id, $nama);
                redirect(base_url('index.php/admin/kategori_obat'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->load->model('kategori_obat_model');
            $kategori_obat = $this->kategori_obat_model->get_kategori_obat($id);

            $data = [
                'kategori_obat' => $kategori_obat,
            ];

            $this->slice->view('pages.admin.kategori_obat.edit', ['data' => $data]);
        }
    }

    public function delete(string $id)
    {
        $this->load->model('kategori_obat_model');
        $this->kategori_obat_model->destroy($id);
        
        redirect(base_url('index.php/admin/kategori_obat'));
    }
}