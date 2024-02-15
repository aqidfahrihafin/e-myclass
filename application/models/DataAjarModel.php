<?php

class DataAjarModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_data_ajar($data) {
        $this->db->insert('data_ajar', $data);
    }

	public function get_all_data_ajar_guru() {
		$this->db->select('data_ajar.*, kelas.*, guru.*, mapel.* ');
		$this->db->from('data_ajar');
		$this->db->join('kelas', 'data_ajar.kelas_id = kelas.kelas_id', 'left');
		$this->db->join('guru', 'data_ajar.guru_id = guru.guru_id', 'left');
		$this->db->join('mapel', 'data_ajar.mapel_id = mapel.mapel_id', 'left');

		$query = $this->db->get();
		return $query->result();
	}
	public function get_all_data_ajar($data_ajar_id) {
		$this->db->select('data_ajar.*, kelas.*, guru.*, mapel.* ');
		$this->db->from('data_ajar');
		$this->db->join('kelas', 'data_ajar.kelas_id = kelas.kelas_id', 'left');
		$this->db->join('guru', 'data_ajar.guru_id = guru.guru_id', 'left');
		$this->db->join('mapel', 'data_ajar.mapel_id = mapel.mapel_id', 'left');

		$this->db->where('data_ajar.kelas_id', $data_ajar_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_mata_pelajaran_by_guru_id($guru_id) {
        $this->db->where('guru_id', $guru_id);
        return $this->db->get('data_ajar')->result();
		$this->db->select('data_ajar.*, kelas.*, guru.*, mapel.* ');
		$this->db->from('data_ajar');
		$this->db->join('kelas', 'data_ajar.kelas_id = kelas.kelas_id', 'left');
		$this->db->join('guru', 'data_ajar.guru_id = guru.guru_id', 'left');
		$this->db->join('mapel', 'data_ajar.mapel_id = mapel.mapel_id', 'left');

		$this->db->where('data_ajar.kelas_id', $data_ajar_id);
		$query = $this->db->get();
		return $query->result();
    }

    public function update_data_ajar($data_ajar_id, $data) {
        $this->db->where('data_ajar_id', $data_ajar_id);
        $this->db->update('data_ajar', $data);
    }

    public function delete_data_ajar($data_ajar_id) {
        $this->db->delete('data_ajar', array('data_ajar_id' => $data_ajar_id));
    }

	public function get_data_ajar_by_id($data_ajar_id) {
        $this->db->select('*');
        $this->db->from('data_ajar');
        $this->db->where('data_ajar_id', $data_ajar_id);
        $query = $this->db->get();
        return $query->row();
    }
}
