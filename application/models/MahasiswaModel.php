<?php
class MahasiswaModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_mahasiswa() {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }
	
	public function count_all_mahasiswa() {
        return $this->db->count_all('mahasiswa');
    }

	public function get_all_data_mahasiswa() {
		$this->db->select('mahasiswa.*, tahun_ajaran.*, tahun_ajaran.nama_tahun, mahasiswa.status AS status_mahasiswa, prodi.nama_prodi, fakultas.nama_fakultas');
		$this->db->from('mahasiswa');
		$this->db->join('tahun_ajaran', 'mahasiswa.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
		$this->db->join('prodi', 'mahasiswa.prodi_id = prodi.prodi_id', 'left');
		$this->db->join('fakultas', 'prodi.fakultas_id = fakultas.fakultas_id', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_mahasiswa_by_id($mahasiswa_id) {
		$this->db->select('mahasiswa.*, tahun_ajaran.*, tahun_ajaran.nama_tahun, mahasiswa.status AS status_mahasiswa, prodi.nama_prodi, fakultas.nama_fakultas');
		$this->db->from('mahasiswa');
		$this->db->join('tahun_ajaran', 'mahasiswa.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
		$this->db->join('prodi', 'mahasiswa.prodi_id = prodi.prodi_id', 'left');
		$this->db->join('fakultas', 'prodi.fakultas_id = fakultas.fakultas_id', 'left');
		$this->db->where('mahasiswa.mahasiswa_id', $mahasiswa_id);
		return $this->db->get()->row();
	}	

	public function get_prestasi_by_mahasiswa_id($mahasiswa_id) {
		$this->db->where('mahasiswa_id', $mahasiswa_id);
		return $this->db->get('prestasi')->result();
	}

	public function get_beasiswa_by_mahasiswa_id($mahasiswa_id) {
		$this->db->where('mahasiswa_id', $mahasiswa_id);
		return $this->db->get('beasiswa')->result();
	}

	public function insert_mahasiswa($data) {
        $this->db->insert('mahasiswa', $data);
    }

    public function cek_nim_exist($nim) {
        $this->db->where('nim', $nim);
        $query = $this->db->get('mahasiswa');
        return $query->num_rows() > 0;
    }

    public function cek_nik_exist($nik) {
        $this->db->where('nik', $nik);
        $query = $this->db->get('mahasiswa');
        return $query->num_rows() > 0;
    }
	
	public function get_photo_filename($mahasiswa_id) {
        $this->db->select('photo');
        $this->db->where('mahasiswa_id', $mahasiswa_id);
        $query = $this->db->get('mahasiswa');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->photo;
        }
        return null;
    }

    public function update_mahasiswa($mahasiswa_id, $data) {
        $this->db->where('mahasiswa_id', $mahasiswa_id);
        $this->db->update('mahasiswa', $data);
    }

	public function update_status($mahasiswa_id, $data_mahasiswa) {
        $this->db->where('mahasiswa_id', $mahasiswa_id);
        $this->db->update('mahasiswa', $data_mahasiswa);
    }

	public function delete_mahasiswa($mahasiswa_id) {
        $this->db->delete('mahasiswa', array('mahasiswa_id' => $mahasiswa_id));
    }

	public function import_data($importmahasiswa) {
		if (empty($importmahasiswa)) {
			return false; 
		}
		$this->db->trans_start();
		foreach ($importmahasiswa as $data) {
			$this->db->replace('mahasiswa', $data);
		}
		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function isNikExists($nik) {
		$this->db->where('nik', $nik);
		$query = $this->db->get('mahasiswa');
		return $query->num_rows() > 0;
	}


	public function getmahasiswaByActivationCode($mahasiswa_id) {
        $this->db->where('mahasiswa_id', $mahasiswa_id);
        $query = $this->db->get('mahasiswa');
        return $query->row_array();
    }

}?>
