<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('user_model');
        $users = $this->user_model->get_users();
        
        $data = [
            'users' => $users,
        ];

        $this->slice->view('pages.admin.user.index', ['data' => $data]);
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', ['required', 'trim', 'max_length[128]']);
            $this->form_validation->set_rules('username', 'Username', ['required', 'trim', 'max_length[128]']);
            $this->form_validation->set_rules('password', 'Password', ['required', 'trim', 'min_length[8]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.user.create');
            } else {
                $this->load->model('auth_model');

                $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $this->auth_model->register($nama, $username, $password);
                redirect(base_url('index.php/admin/user'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->slice->view('pages.admin.user.create');
        }
    }

    public function edit(string $id) 
    {
        if ($this->input->method() === 'post') {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', ['required', 'trim', 'max_length[128]']);
            $this->form_validation->set_rules('username', 'Username', ['required', 'trim', 'max_length[128]']);
            $this->form_validation->set_rules('password', 'Password', ['trim', 'min_length[8]']);
            // $this->form_validation->set_rules('is_active', 'Status', ['required', 'integer', 'in_list[0, 1]']);

            if ($this->form_validation->run() === FALSE) {
                $this->slice->view('pages.admin.user.edit');
            } else {
                $this->load->model('user_model');

                $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                // $is_active = $this->input->post('is_active');

                // $this->user_model->update($id, $nama, $username, $is_active, $password);
                $this->user_model->update($id, $nama, $username, $password);
                redirect(base_url('index.php/admin/user'));
            }
        }

        if ($this->input->method() === 'get') {
            $this->load->model('user_model');
            $user = $this->user_model->get_users($id);

            $data = [ 'user' => $user ];

            $this->slice->view('pages.admin.user.edit', ['data' => $data]);
        }
    }

    public function delete(string $id) 
    {
        $this->load->model('user_model');
        $user = $this->user_model->get_users($id);

        if (empty($user)) {
            show_404();
        }

        $this->user_model->destroy($id);
        redirect(base_url('index.php/admin/user'));
    }
}