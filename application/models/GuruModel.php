<?php
class GuruModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_guru() {
        $query = $this->db->get('guru');
        return $query->result_array();
    }

	// get dengan left joint
	public function get_all_data_guru() {
		$this->db->select('guru.*, kelas.kode_kelas, kelas.kelas');
		$this->db->from('guru');
		$this->db->join('kelas', 'guru.guru_id = kelas.guru_id', 'left');
		$query = $this->db->get();

		return $query->result();
	}

	public function insert_guru($data) {
        $this->db->insert('guru', $data);
    }

    public function cek_niy_exist($niy) {
        $this->db->where('niy', $niy);
        $query = $this->db->get('guru');
        return $query->num_rows() > 0;
    }

    public function cek_nik_exist($nik) {
        $this->db->where('nik', $nik);
        $query = $this->db->get('guru');
        return $query->num_rows() > 0;
    }
	
	public function get_photo_filename($guru_id) {
        $this->db->select('photo');
        $this->db->where('guru_id', $guru_id);
        $query = $this->db->get('guru');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->photo;
        }
        return null;
    }

    public function update_guru($guru_id, $data) {
        $this->db->where('guru_id', $guru_id);
        $this->db->update('guru', $data);
    }

	public function delete_guru($guru_id) {
        $this->db->delete('guru', array('guru_id' => $guru_id));
    }

}?>
