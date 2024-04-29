<?php

class TahunAjaranModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_tahun_ajaran($data) {
        $this->db->insert('tahun_ajaran', $data);
    }

    public function get_all_tahun_ajaran() {
        return $this->db->get('tahun_ajaran')->result();
    }

    public function update_tahun_ajaran($tahun_ajaran_id, $data) {
        $this->db->where('tahun_ajaran_id', $tahun_ajaran_id);
        $this->db->update('tahun_ajaran', $data);
    }

    public function delete_tahun_ajaran($tahun_ajaran_id) {
        $this->db->delete('tahun_ajaran', array('tahun_ajaran_id' => $tahun_ajaran_id));
    }

	public function check_active_relations($tahun_ajaran_id) {
		$tables_to_check = ['mahasiswa']; // Tabel-tabel yang ingin diperiksa
	
		foreach ($tables_to_check as $table) {
			$this->db->where('tahun_ajaran_id', $tahun_ajaran_id);
			$this->db->from($table);
			$count = $this->db->count_all_results();
	
			if ($count > 0) {
				return true; 
			}
		}
		return false; 
	}	

	public function get_tahun_ajaran_by_id($tahun_ajaran_id) {
        $this->db->select('*');
        $this->db->from('tahun_ajaran');
        $this->db->where('tahun_ajaran_id', $tahun_ajaran_id);
        $query = $this->db->get();
        return $query->row();
    }
}
