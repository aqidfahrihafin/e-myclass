<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

	public function get_all_users() {
		$this->db->select('users_profile.*, users.*, IFNULL(guru.nama_guru, santri.nama_ayah) AS nama_guru, COALESCE(guru.tanggal_lahir, santri.tanggal_lahir) AS password');
		$this->db->from('users_profile');
		$this->db->join('users', 'users_profile.user_id = users.user_id');
		$this->db->join('guru', 'users_profile.guru_id = guru.guru_id', 'left');
		$this->db->join('santri', 'users_profile.santri_id = santri.santri_id', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_user_data_by_user_id($user_id) {	

		$user_role = $this->session->userdata('role');
		if ($user_role === 'wali') {
			$this->db->select('users_profile.*, users.*, santri.*, santri.nama_ayah AS nama_users');
			$this->db->from('users_profile');
			$this->db->join('users', 'users_profile.user_id = users.user_id');
			$this->db->join('santri', 'users_profile.santri_id = santri.santri_id', 'left');
		} else {
			$this->db->select('users_profile.*, users.*, guru.*, guru.nama_guru AS nama_users');
			$this->db->from('users_profile');
			$this->db->join('users', 'users_profile.user_id = users.user_id');
			$this->db->join('guru', 'users_profile.guru_id = guru.guru_id', 'left');
		}

		$this->db->where('users_profile.user_id', $user_id);
		$query = $this->db->get();	
		$user_data = $query->row();
		$user_data->user_type = ($user_role === 'wali') ? 'santri' : 'guru';
		return $user_data;
	}


	public function update_user($user_id, $data) {
        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
    }

	public function get_file($guru_id) {
        $query = $this->db->get_where('guru', array('guru_id' => $guru_id));
        return $query->row_array();
    }

	public function update_profil($guru_id, $update_data) {
        $this->db->where('guru_id', $guru_id);
        $this->db->update('guru', $update_data);
    }

}
