<?php

class KelasSantriModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function get_kelas() {
        $query = $this->db->get('kelas_santri');
        return $query->result_array();
    }

	public function get_kelas_santri() {
		$this->db->select('kelas_santri.*, kelas.*, tahun_ajaran.*, guru.*, COUNT(santri.santri_id) as total_santri');
		$this->db->from('kelas');
		$this->db->join('kelas_santri', 'kelas.kelas_id = kelas_santri.kelas_id', 'left');
		$this->db->join('santri', 'santri.santri_id = kelas_santri.santri_id', 'left');
		$this->db->join('tahun_ajaran', 'kelas.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');     
		$this->db->join('guru', 'kelas.guru_id = guru.guru_id', 'left');   
		$this->db->group_by('kelas_santri.kelas_id');
		$query = $this->db->get();
		return $query->result_array();
	}
	

	public function get_santri_by_kelas_id($kelas_id) {
		$this->db->select('santri.*, kelas.*, tahun_ajaran.*, guru.*, COUNT(santri.santri_id) as total_santri');
		$this->db->from('kelas_santri');
		$this->db->join('santri', 'santri.santri_id = kelas_santri.santri_id');
		$this->db->join('kelas', 'kelas.kelas_id = kelas_santri.kelas_id');
		$this->db->join('tahun_ajaran', 'kelas.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id');
		$this->db->join('guru', 'kelas.guru_id = guru.guru_id');
		$this->db->where('kelas_santri.kelas_id', $kelas_id);
		$this->db->group_by('santri.santri_id'); // Group by santri_id to get correct count per santri
		$query = $this->db->get();
		
		return $query->result_array();
	}
		

	public function insert_kelas_santri($kelas_id, $santri_id) {
        $data = array(
			'kelas_santri_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'kelas_id' => $kelas_id,
            'santri_id' => $santri_id
        );
        $this->db->insert('kelas_santri', $data);
    }


	public function delete($kelas_santri_id) {
        $this->db->delete('kelas_santri', array('kelas_santri_id' => $kelas_santri_id));
    }
	
}
