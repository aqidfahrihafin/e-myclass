<?php

class FakultasModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_fakultas($data) {
        $this->db->insert('fakultas', $data);
    }

	public function get_all_fakultas() {
		return $this->db->get('fakultas')->result();
    }

    public function update_fakultas($fakultas_id, $data) {
        $this->db->where('fakultas_id', $fakultas_id);
        $this->db->update('fakultas', $data);
    }

    public function delete_fakultas($fakultas_id) {
        $this->db->delete('fakultas', array('fakultas_id' => $fakultas_id));
    }

	public function check_active_relations($fakultas_id) {
		$this->db->where('fakultas_id', $fakultas_id);
		$this->db->from('prodi');
		$prodi_count = $this->db->count_all_results();
		// Jika terdapat prodi aktif, kembalikan true
		return ($prodi_count > 0);
	}
	
}
