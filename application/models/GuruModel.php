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
	public function get_all_data_guru($tahun_ajaran_id) {
		$this->db->select('guru.*, kelas.*, tahun_ajaran.nama_tahun');
		$this->db->from('guru');
		$this->db->join('kelas', 'guru.guru_id = kelas.guru_id', 'inner');
		$this->db->join('tahun_ajaran', 'kelas.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
		
		// Tambahkan kondisi WHERE untuk memfilter berdasarkan tahun ajaran
		$this->db->where('kelas.tahun_ajaran_id', $tahun_ajaran_id);

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

	public function update_status($guru_id, $data_guru) {
        $this->db->where('guru_id', $guru_id);
        $this->db->update('guru', $data_guru);
    }

	public function delete_guru($guru_id) {
        $this->db->delete('guru', array('guru_id' => $guru_id));
    }

	public function import_data($importguru) {
		if (empty($importguru)) {
			return false; 
		}
		$this->db->trans_start();
		foreach ($importguru as $data) {
			$this->db->replace('guru', $data);
		}
		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function isNikExists($nik) {
		$this->db->where('nik', $nik);
		$query = $this->db->get('guru');
		return $query->num_rows() > 0;
	}



}?>
