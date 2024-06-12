<?php

class User_model extends CI_Model
{
    public $nama;
    public $username;
    public $password;
    public $is_active;

    private $_table = 'users';

    public function get_users(string $id = null)
    {
        if ($id) {
            $query = $this->db->get_where($this->_table, ['id' => $id]);
            $user = $query->row();
            return $user;
        }

        $query = $this->db->select('id, nama, username, is_active')->get($this->_table);
        $users = $query->result();
        return $users;
    }

    // public function update(string $id, $nama, $username, $is_active, $password = null)
    public function update(string $id, $nama, $username, $password = null)
    {
        $data = [];

        // If password provided user want to change their password
        if (!$password) {
            $data = [
                'nama' => $nama,
                'username' => $username,
                // 'is_active' => $is_active,
            ];
        }

        // If password not provided, user didn't want to change their password
        if ($password) {
            $data = [
                'nama' => $nama,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                // 'is_active' => $is_active,
            ];
        }

        $this->db->update($this->_table, $data, ['id' => $id]);
    }

    public function destroy(string $id)
    {
        $this->db->delete($this->_table, ['id' => $id]); 
    }
}