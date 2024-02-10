<?php
class SantriModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_santri() {
        $query = $this->db->get('santri');
        return $query->result_array();
    }

	public function get_all_data_santri() {
		$this->db->select('santri.*, tahun_ajaran.*, tahun_ajaran.nama_tahun, santri.status AS status_santri');
		$this->db->from('santri');
		$this->db->join('tahun_ajaran', 'santri.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_santri_by_id($santri_id) {
		$this->db->select('santri.*, tahun_ajaran.*, tahun_ajaran.nama_tahun, santri.status AS status_santri');
		$this->db->from('santri');
		$this->db->join('tahun_ajaran', 'santri.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
		$this->db->where('santri_id', $santri_id);
		return $this->db->get()->row();
	}

	public function get_prestasi_by_santri_id($santri_id) {
		$this->db->where('santri_id', $santri_id);
		return $this->db->get('prestasi')->result();
	}

	public function get_beasiswa_by_santri_id($santri_id) {
		$this->db->where('santri_id', $santri_id);
		return $this->db->get('beasiswa')->result();
	}

	public function insert_santri($data) {
        $this->db->insert('santri', $data);
    }

    public function cek_no_induk_exist($no_induk) {
        $this->db->where('no_induk', $no_induk);
        $query = $this->db->get('santri');
        return $query->num_rows() > 0;
    }

    public function cek_nik_exist($nik) {
        $this->db->where('nik', $nik);
        $query = $this->db->get('santri');
        return $query->num_rows() > 0;
    }
	
	public function get_photo_filename($santri_id) {
        $this->db->select('photo');
        $this->db->where('santri_id', $santri_id);
        $query = $this->db->get('santri');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->photo;
        }
        return null;
    }

    public function update_santri($santri_id, $data) {
        $this->db->where('santri_id', $santri_id);
        $this->db->update('santri', $data);
    }

	public function update_status($santri_id, $data_santri) {
        $this->db->where('santri_id', $santri_id);
        $this->db->update('santri', $data_santri);
    }

	public function delete_santri($santri_id) {
        $this->db->delete('santri', array('santri_id' => $santri_id));
    }

	public function import_data($importsantri) {
		if (empty($importsantri)) {
			return false; 
		}
		$this->db->trans_start();
		foreach ($importsantri as $data) {
			$this->db->replace('santri', $data);
		}
		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function isNikExists($nik) {
		$this->db->where('nik', $nik);
		$query = $this->db->get('santri');
		return $query->num_rows() > 0;
	}



}?>
