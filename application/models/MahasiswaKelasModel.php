<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaKelasModel extends CI_Model {

	
    public function cekKodeKelas($kode_kelas) {
        $this->db->where('kode_kelas', $kode_kelas);
        $query = $this->db->get('kelas');
        return $query->num_rows() > 0; // Mengembalikan true jika kode kelas valid
    }

	public function isMahasiswaEnrolled($mahasiswa_id, $kode_kelas) {
		$kelas_id = $this->KelasModel->getKelasIDByKode($kode_kelas);
		$this->db->where('mahasiswa_id', $mahasiswa_id);
		$this->db->where('kelas_id', $kelas_id);
		$query = $this->db->get('mahasiswa_kelas');	
		return $query->num_rows() > 0;
	}

	public function getKelasByMahasiswa($mahasiswa_id) {
		$this->db->select('kelas.*, prodi.nama_prodi, fakultas.nama_fakultas');
		$this->db->from('mahasiswa_kelas');
		$this->db->join('kelas', 'mahasiswa_kelas.kelas_id = kelas.kelas_id');
		$this->db->join('prodi', 'kelas.prodi_id = prodi.prodi_id');
		$this->db->join('fakultas', 'prodi.fakultas_id = fakultas.fakultas_id');
		$this->db->join('tahun_ajaran', 'kelas.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id');
		$this->db->where('mahasiswa_kelas.mahasiswa_id', $mahasiswa_id);
		$query = $this->db->get();
		return $query->result();
	}
	
    public function insert_mahasiswa_kelas($data) {
        return $this->db->insert('mahasiswa_kelas', $data);
    }

	public function delete_mahasiswa_kelas($mahasiswa_kelas_id){
        $this->db->where('mahasiswa_kelas_id', $mahasiswa_kelas_id);
        return $this->db->delete('mahasiswa_kelas');
    }

}


