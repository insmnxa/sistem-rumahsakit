<?php

class Auth_model extends CI_Model
{
	public $id;
	public $nama;
	public $username;
	public $password;
	public $is_active;

	private $_table = 'users';
	const SESSION_KEY = 'user_id';

	public function login(string $username, $password)
	{
		$query = $this->db->get_where($this->_table, ['username' => $username]);
		$user = $query->row();

		// 1. Check is a valid user
		if (!$user) {
			return FALSE;
		}

		// 2. Check if user is active
		if ($user->is_active == 0) {
			return FALSE;
		}

		// 3. Check is provided password is correct based on username
		if (!password_verify($password, $user->password)) {
			return FALSE;
		}

		// 4. If username and password correct then set session
		$this->session->set_userdata(self::SESSION_KEY, $user->id);

		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function register(string $nama, $username, $password)
	{
		// Initialize data to store into database
		$this->id = uniqid('USR-');
		$this->nama = $nama;
		$this->username = $username;
		$this->password = password_hash($password, PASSWORD_DEFAULT);
		$this->is_active = 0;

		// Create new user
		$this->db->insert($this->_table, $this);
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}
}
