<?php

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('obat_model');
        $obats = $this->obat_model->get_obat();

        $data = [
            'obats' => $obats
        ];

        $this->slice->view('pages.admin.obat.index', ['data' => $data]);
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('merk', 'Merk', ['required', 'trim']);
            $this->form_validation->set_rules('stok', 'Stok', ['required', 'trim', 'numeric']);
            $this->form_validation->set_rules('harga', 'Harga', ['required', 'trim', 'numeric']);
            $this->form_validation->set_rules('kategori', 'Kategori', ['required', 'trim', 'max_length[17]']);

            if ($this->form_validation->run() === FALSE) {
                $this->load->model('kategori_obat_model');
                $kategori_obats = $this->kategori_obat_model->get_kategori_obat();

                $data = ['kategori_obats' => $kategori_obats];

                $this->slice->view('pages.admin.obat.create', ['data' => $data]);
            } else {
                $this->load->model(['obat_model', 'kategori_obat_model']);

                $merk = $this->input->post('merk');
                $kategori = $this->input->post('kategori');
                $stok = $this->input->post('stok');
                $harga = $this->input->post('harga');

                $id_kategori = $this->kategori_obat_model->get_kategori_obat('', $kategori);

                $this->obat_model->store($merk, $id_kategori->id, $stok, $harga);
                redirect(base_url('index.php/admin/obat'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->load->model('kategori_obat_model');
            $kategori_obats = $this->kategori_obat_model->get_kategori_obat();

            $data = ['kategori_obats' => $kategori_obats];

            $this->slice->view('pages.admin.obat.create', ['data' => $data]);
        }
    }

    public function edit(string $id)
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('merk', 'Merk', ['required', 'trim']);
            $this->form_validation->set_rules('stok', 'Stok', ['required', 'trim', 'int']);
            $this->form_validation->set_rules('harga', 'Harga', ['required', 'trim', 'decimal']);
            $this->form_validation->set_rules('id_kategori', 'Kategori', ['required', 'trim', 'max_length[17]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.obat.edit');
            } else {
                $this->load->model('obat_model');

                $merk = $this->input->post('merk');
                $stok = $this->input->post('stok');
                $harga = $this->input->post('harga');
                $id_kategori = $this->input->post('id_kategori');

                $this->obat_model->update($id, $merk, $id_kategori, $stok, $harga);
                redirect(base_url('index.php/admin/obat'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->load->model('obat_model');
            $obat = $this->obat_model->get_obat($id);

            $data = [
                'obat' => $obat,
            ];

            $this->slice->view('pages.admin.obat.edit', ['data' => $data]);
        }
    }

    public function delete(string $id)
    {
        $this->load->model('obat_model');
        $this->obat_model->destroy($id);

        redirect(base_url('index.php/admin/obat'));
    }

    public function fetch_obat()
    {
        $this->load->model('obat_model');
        $obats = $this->obat_model->get_obat();

        $searchTerm = $this->input->post('search');

        $matches = [];
        foreach ($obats as $obat) {
            if (stripos($obat->merk, $searchTerm) === 0)
                $matches[] = $obat;
        }

        echo json_encode($matches);
    }

    public function fetch()
    {
        $this->load->model('kategori_obat_model');
        $kategori_obat = $this->kategori_obat_model->get_kategori_obat();

        $searchTerm = $this->input->post('search');

        $matches = [];
        foreach ($kategori_obat as $ko) {
            if (stripos($ko->nama, $searchTerm) === 0) {
                $matches[] = $ko;
            }
        }

        echo json_encode($matches);
    }
}
