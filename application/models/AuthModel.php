<?php

class AuthModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function register($data_users) {
        $this->db->insert('users', $data_users);
    }

	public function insert_user_profile($data_profile) {
        $this->db->insert('users_profile', $data_profile);
    }

    public function login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $user = $query->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

	public function get_user_by_dosen_id($dosen_id) {
        return $this->db->get_where('users_profile', array('dosen_id' => $dosen_id))->row();
    }
	
	public function delete_user($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->delete('users');
    }

    public function delete_user_profile($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->delete('users_profile');
    }

}
