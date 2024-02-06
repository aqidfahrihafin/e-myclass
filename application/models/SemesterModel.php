<?php

class SemesterModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_semester($data) {
        $this->db->insert('semester', $data);
    }

	public function get_all_semester() {
		$this->db->select('semester.*, tahun_ajaran.nama_tahun'); // Memilih kolom dari kedua tabel
		$this->db->from('semester');
		$this->db->join('tahun_ajaran', 'semester.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left'); // Melakukan join dengan tabel 'tahun_ajaran'
		$this->db->order_by('semester.semester_id', 'DESC');
		$this->db->limit(1); 
		return $this->db->get()->row(); // Mengembalikan satu baris hasil join
	}



    public function update_semester($semester_id, $data) {
        $this->db->where('semester_id', $semester_id);
        $this->db->update('semester', $data);
    }

    public function delete_semester($semester_id) {
        $this->db->delete('semester', array('semester_id' => $semester_id));
    }
}
