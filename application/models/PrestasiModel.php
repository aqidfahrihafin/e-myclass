<?php

class PrestasiModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_prestasi($data) {
        $this->db->insert('prestasi', $data);
    }

	public function get_all_prestasi() {
		$this->db->select('santri.*, COUNT(prestasi.prestasi_id) AS jumlah_prestasi');
		$this->db->from('santri');
		$this->db->join('prestasi', 'santri.santri_id = prestasi.santri_id', 'left');
		$this->db->group_by('santri.santri_id'); // Group hasil berdasarkan ID santri untuk menghitung jumlah prestasi per santri
		$query = $this->db->get();

		return $query->result();
	}



    public function update_prestasi($prestasi_id, $data) {
        $this->db->where('prestasi_id', $prestasi_id);
        $this->db->update('prestasi', $data);
    }

    public function delete_prestasi($prestasi_id) {
        $this->db->delete('prestasi', array('prestasi_id' => $prestasi_id));
    }
}
