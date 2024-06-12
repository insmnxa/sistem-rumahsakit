<?php 

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('pasien_model');
        $pasien = $this->pasien_model->get_pasien();

        $data = [
            'pasien' => $pasien
        ];

        $this->slice->view('pages.admin.pasien.index', ['data' => $data]);
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', ['required', 'trim', 'max_length[128]']);
            $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', ['required', 'trim']);
            $this->form_validation->set_rules('no_ktp', 'No KTP', ['required', 'trim', 'max_length[16]']);
            $this->form_validation->set_rules('no_telp', 'No Telepon', ['required', 'trim', 'max_length[20]']);
            $this->form_validation->set_rules('id_dokter', 'Dokter', ['required', 'trim', 'max_length[17]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.pasien.create');
            } else {
                $this->load->model('pasien_model');

                $nama = $this->input->post('nama');
                $tgl_lahir = $this->input->post('tgl_lahir');
                $no_ktp = $this->input->post('no_ktp');
                $no_telp = $this->input->post('no_telp');
                $id_dokter = $this->input->post('id_dokter');
                $id_user = $this->session->userdata('user_id');

                $this->pasien_model->store($nama, $tgl_lahir, $no_ktp, $no_telp, $id_dokter, $id_user);
                redirect(base_url('index.php/admin/pasien'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->load->model('dokter_model');
            $dokter = $this->dokter_model->get_dokter();

            $data = [
                'dokter' => $dokter,
            ];

            $this->slice->view('pages.admin.pasien.create', ['data' => $data]);
        }
    }

    public function edit(string $id)
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', ['required', 'trim', 'max_length[128]']);
            $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', ['required', 'trim']);
            $this->form_validation->set_rules('no_ktp', 'No KTP', ['required', 'trim', 'max_length[16]']);
            $this->form_validation->set_rules('no_telp', 'No Telepon', ['required', 'trim', 'max_length[20]']);
            $this->form_validation->set_rules('id_dokter', 'Dokter', ['required', 'trim', 'max_length[17]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.pasien.edit');
            } else {
                $this->load->model('pasien_model');

                $nama = $this->input->post('nama');
                $tgl_lahir = $this->input->post('tgl_lahir');
                $no_ktp = $this->input->post('no_ktp');
                $no_telp = $this->input->post('no_telp');
                $id_dokter = $this->input->post('id_dokter');

                $this->pasien_model->update($id, $nama, $tgl_lahir, $no_ktp, $no_telp, $id_dokter);
                redirect(base_url('index.php/admin/pasien'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->load->model('pasien_model');
            $pasien = $this->pasien_model->get_pasien($id);

            $data = [
                'pasien' => $pasien
            ];

            $this->slice->view('pages.admin.pasien.edit', ['data' => $data]);
        }
    }

    public function delete(string $id)
    {

    }
}