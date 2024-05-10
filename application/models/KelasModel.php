<?php

class KelasModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_kelas($data) {
        $this->db->insert('kelas', $data);
    }

	 public function get_all_kelas() {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('prodi', 'kelas.prodi_id = prodi.prodi_id', 'left');
        $this->db->join('tahun_ajaran', 'kelas.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

	public function getKelasIDByKode($kode_kelas) {
        $this->db->select('kelas_id');
        $this->db->from('kelas');
        $this->db->where('kode_kelas', $kode_kelas);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->kelas_id;
        } else {
            return false;
        }
    }

	public function getKelasByMahasiswa($mahasiswa_id) {
		$this->db->select('*');
		$this->db->from('mahasiswa_kelas');
		$this->db->join('kelas', 'mahasiswa_kelas.kelas_id = kelas.kelas_id');
		$this->db->join('prodi', 'kelas.prodi_id = prodi.prodi_id');
		$this->db->join('fakultas', 'prodi.fakultas_id = fakultas.fakultas_id');
		$this->db->join('tahun_ajaran', 'kelas.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id');
		$this->db->where('mahasiswa_kelas.mahasiswa_id', $mahasiswa_id);
		$query = $this->db->get();
		return $query->result();
	}
	

    public function update_kelas($kelas_id, $data) {
        $this->db->where('kelas_id', $kelas_id);
        $this->db->update('kelas', $data);
    }

    public function delete_kelas($kelas_id) {
        $this->db->delete('kelas', array('kelas_id' => $kelas_id));
    }
}
