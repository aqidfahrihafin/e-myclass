<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

	public function get_all_users() {
		$this->db->select('users_profile.*, users.*, IFNULL(dosen.nama_dosen, mahasiswa.nama_mahasiswa) AS nama_users, COALESCE(dosen.tanggal_lahir, mahasiswa.tanggal_lahir) AS password');
		$this->db->from('users_profile');
		$this->db->join('users', 'users_profile.user_id = users.user_id');
		$this->db->join('dosen', 'users_profile.dosen_id = dosen.dosen_id', 'left');
		$this->db->join('mahasiswa', 'users_profile.mahasiswa_id = mahasiswa.mahasiswa_id', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_user_data_by_user_id($user_id) {	

		$user_role = $this->session->userdata('role');
		if ($user_role === 'mahasiswa') {
			$this->db->select('users_profile.*, users.*, mahasiswa.*, tahun_ajaran.nama_tahun, mahasiswa.nama_mahasiswa AS nama_users, prodi.nama_prodi, fakultas.nama_fakultas');
			$this->db->from('users_profile');
			$this->db->join('users', 'users_profile.user_id = users.user_id');
			$this->db->join('mahasiswa', 'users_profile.mahasiswa_id = mahasiswa.mahasiswa_id', 'left');
			$this->db->join('tahun_ajaran', 'mahasiswa.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
			$this->db->join('prodi', 'mahasiswa.prodi_id = prodi.prodi_id', 'left');
			$this->db->join('fakultas', 'prodi.fakultas_id = fakultas.fakultas_id', 'left');

		} else {
			$this->db->select('users_profile.*, users.*, dosen.*, dosen.nama_dosen AS nama_users, prodi.nama_prodi, fakultas.nama_fakultas');
			$this->db->from('users_profile');
			$this->db->join('users', 'users_profile.user_id = users.user_id');
			$this->db->join('dosen', 'users_profile.dosen_id = dosen.dosen_id', 'left');
			$this->db->join('prodi', 'dosen.prodi_id = prodi.prodi_id', 'left');
			$this->db->join('fakultas', 'prodi.fakultas_id = fakultas.fakultas_id', 'left');

		}

		$this->db->where('users_profile.user_id', $user_id);
		$query = $this->db->get();	
		$user_data = $query->row();
		$user_data->user_type = ($user_role === 'mahasiswa') ? 'mahasiswa' : 'dosen';
		return $user_data;
	}

	public function checkUsernameExists($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }

	public function update_user($user_id, $data) {
        $this->db->where('user_id', $user_id);
        $this->db->update('users', $data);
    }

	public function get_file($dosen_id) {
        $query = $this->db->get_where('dosen', array('dosen_id' => $dosen_id));
        return $query->row_array();
    }
	

	public function update_profil($dosen_id, $update_data) {
        $this->db->where('dosen_id', $dosen_id);
        $this->db->update('dosen', $update_data);
    }
	
	public function update_profil_mhs($mahasiswa_id, $update_data) {
        $this->db->where('mahasiswa_id', $mahasiswa_id);
        $this->db->update('mahasiswa', $update_data);
    }


	public function get_file_mhs($mahasiswa_id) {
        $query = $this->db->get_where('mahasiswa', array('mahasiswa_id' => $mahasiswa_id));
        return $query->row_array();
    }

}
