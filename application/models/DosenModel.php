<?php
class DosenModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function get_all_dosen() {
		$this->db->select('dosen.*, prodi.nama_prodi, fakultas.nama_fakultas');
		$this->db->from('dosen');
		$this->db->join('prodi', 'dosen.prodi_id = prodi.prodi_id', 'left');
		$this->db->join('fakultas', 'prodi.fakultas_id = fakultas.fakultas_id', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}		

	public function count_all_dosen() {
        return $this->db->count_all('dosen');
    }

	// get dengan left joint
	public function get_all_data_dosen($tahun_ajaran_id) {
		$this->db->select('dosen.*, kelas.*, tahun_ajaran.nama_tahun');
		$this->db->from('dosen');
		$this->db->join('kelas', 'dosen.dosen_id = kelas.dosen_id', 'inner');
		$this->db->join('tahun_ajaran', 'kelas.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
		
		//  kondisi WHERE untuk memfilter berdasarkan tahun ajaran
		$this->db->where('kelas.tahun_ajaran_id', $tahun_ajaran_id);

		$query = $this->db->get();
		return $query->result();
	}

	public function insert_dosen($data) {
        $this->db->insert('dosen', $data);
    }

    public function cek_nidn_exist($nidn) {
        $this->db->where('nidn', $nidn);
        $query = $this->db->get('dosen');
        return $query->num_rows() > 0;
    }

    public function cek_nik_exist($nik) {
        $this->db->where('nik', $nik);
        $query = $this->db->get('dosen');
        return $query->num_rows() > 0;
    }
	
	public function get_photo_filename($dosen_id) {
        $this->db->select('photo');
        $this->db->where('dosen_id', $dosen_id);
        $query = $this->db->get('dosen');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->photo;
        }
        return null;
    }

    public function update_dosen($dosen_id, $data) {
        $this->db->where('dosen_id', $dosen_id);
        $this->db->update('dosen', $data);
    }

	public function update_status($dosen_id, $data_dosen) {
        $this->db->where('dosen_id', $dosen_id);
        $this->db->update('dosen', $data_dosen);
    }

	public function delete_dosen($dosen_id) {
        $this->db->delete('dosen', array('dosen_id' => $dosen_id));
    }

	public function check_active_relations($dosen_id) {
		$tables_to_check = ['lembaga','users_profile']; // Tabel-tabel yang ingin diperiksa
	
		foreach ($tables_to_check as $table) {
			$this->db->where('dosen_id', $dosen_id);
			$this->db->from($table);
			$count = $this->db->count_all_results();
	
			if ($count > 0) {
				return true; 
			}
		}
		return false; 
	}

	public function import_data($importdosen) {
		if (empty($importdosen)) {
			return false; 
		}
		$this->db->trans_start();
		foreach ($importdosen as $data) {
			$this->db->replace('dosen', $data);
		}
		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function isNikExists($nik) {
		$this->db->where('nik', $nik);
		$query = $this->db->get('dosen');
		return $query->num_rows() > 0;
	}


	public function get_dosen_by_qr_data($qrData) {
        // Contoh implementasi: Ambil data dosen dari database berdasarkan QR code
        // Ganti ini dengan logika sesuai struktur tabel dan data dosen Anda
        $query = $this->db->get_where('dosen', array('qr_code' => $qrData));
        return $query->row_array();
    }

	public function getDosenByActivationCode($dosen_id) {
        $this->db->where('dosen_id', $dosen_id);
        $query = $this->db->get('dosen');
        return $query->row_array();
    }

}?>
