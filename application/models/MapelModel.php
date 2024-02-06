<?php

class MapelModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_mapel($data) {
        $this->db->insert('mapel', $data);
    }

	public function get_all_mapel() {
		return $this->db->get('mapel')->result();
    }

    public function update_mapel($mapel_id, $data) {
        $this->db->where('mapel_id', $mapel_id);
        $this->db->update('mapel', $data);
    }

    public function delete_mapel($mapel_id) {
        $this->db->delete('mapel', array('mapel_id' => $mapel_id));
    }
}
