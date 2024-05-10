<?php

class DiskusiMateriModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_diskusi_materi($data) {
        $this->db->insert('diskusi_materi', $data);
    }

	public function get_diskusi_by_materi_id($materi_id) {
		$this->db->select('diskusi_materi.*, users_profile.*, users.*, IFNULL(dosen.nama_dosen, mahasiswa.nama_mahasiswa) AS nama_users, COALESCE(dosen.tanggal_lahir, mahasiswa.tanggal_lahir) AS password');
		$this->db->from('diskusi_materi');
		$this->db->join('users_profile', 'diskusi_materi.user_id = users_profile.user_id');
		$this->db->join('users', 'users_profile.user_id = users.user_id');
		$this->db->join('dosen', 'users_profile.dosen_id = dosen.dosen_id', 'left');
		$this->db->join('mahasiswa', 'users_profile.mahasiswa_id = mahasiswa.mahasiswa_id', 'left');
		$this->db->where('diskusi_materi.materi_id', $materi_id);
		$this->db->order_by('diskusi_materi.tanggal_posting', 'asc'); // Urutkan berdasarkan tanggal_posting secara ascending (ASC)
		return $this->db->get()->result();
	}
	
	
	
    public function delete_diskusi_materi($diskusi_materi_id) {
        $this->db->delete('diskusi_materi', array('diskusi_materi_id' => $diskusi_materi_id));
    }

}
