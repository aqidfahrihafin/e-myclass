<?php

class PeringkatPublikasiModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_perpub($data) {
        $this->db->insert('peringkat_publikasi', $data);
    }

	public function get_all_perpub() {
		return $this->db->get('peringkat_publikasi')->result();
    }

    public function update_perpub($peringkat_publikasi_id, $data) {
        $this->db->where('peringkat_publikasi_id', $peringkat_publikasi_id);
        $this->db->update('peringkat_publikasi', $data);
    }

    public function delete_perpub($peringkat_publikasi_id) {
        $this->db->delete('peringkat_publikasi', array('peringkat_publikasi_id' => $peringkat_publikasi_id));
    }
}
