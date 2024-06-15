<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		if ($this->input->method() === 'post') {
			$this->load->model('auth_model');

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($this->auth_model->login($username, $password)) {
				redirect(base_url('index.php/admin/dashboard'));
			} else {
				$this->session->set_flashdata('login_error', 'Username atau password salah!');
				redirect(base_url('index.php/auth/login'));
			}
		}

		if ($this->input->method() === 'get') {
			$this->slice->view('pages.auth.login');
		}
	}

	public function register()
	{
		if ($this->input->method() === 'post') {
			$this->load->model('auth_model');

			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->auth_model->register($nama, $username, $password);
			redirect(base_url('index.php/auth/login'));
		}

		if ($this->input->method() === 'get') {
			$this->slice->view('pages.auth.register');
		}
	}

	public function logout()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect(base_url('index.php/auth/login'));
	}
}
