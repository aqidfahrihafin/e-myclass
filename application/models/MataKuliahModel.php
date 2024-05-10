<?php

class MataKuliahModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_matakuliah($data) {
        $this->db->insert('matakuliah', $data);
    }

    public function insert_materi($data) {
        $this->db->insert('materi', $data);
    }
	
	public function get_all_matakuliah() {
		$this->db->select('matakuliah.*, kelas.nama_kelas, COUNT(materi.materi_id) as jumlah_materi, dosen.nama_dosen');
		$this->db->from('matakuliah');
		$this->db->join('kelas', 'matakuliah.kelas_id = kelas.kelas_id', 'left');
		$this->db->join('materi', 'matakuliah.matakuliah_id = materi.matakuliah_id', 'left');
		$this->db->join('dosen', 'matakuliah.dosen_id = dosen.dosen_id', 'left'); // Join dengan tabel dosen melalui tabel matakuliah
		$this->db->group_by('matakuliah.matakuliah_id'); // Group hasil berdasarkan matakuliah_id
		$query = $this->db->get();
		return $query->result();
	}	

	public function get_matakuliah_by_dosen($dosen_id) {
		$this->db->select('matakuliah.*, kelas.nama_kelas, COUNT(materi.materi_id) as jumlah_materi, dosen.nama_dosen');
		$this->db->from('matakuliah');
		$this->db->join('kelas', 'matakuliah.kelas_id = kelas.kelas_id', 'left');
		$this->db->join('materi', 'matakuliah.matakuliah_id = materi.matakuliah_id', 'left');
		$this->db->join('dosen', 'matakuliah.dosen_id = dosen.dosen_id', 'left'); // Join dengan tabel dosen melalui tabel matakuliah
		$this->db->where('matakuliah.dosen_id', $dosen_id); // Filter berdasarkan ID dosen
		$this->db->group_by('matakuliah.matakuliah_id'); // Group hasil berdasarkan matakuliah_id
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_matakuliah_by_kelas($kelas_id) {
		$this->db->select('matakuliah.*, kelas.nama_kelas, COUNT(materi.materi_id) as jumlah_materi, dosen.nama_dosen');
		$this->db->from('matakuliah');
		$this->db->join('kelas', 'matakuliah.kelas_id = kelas.kelas_id', 'left');
		$this->db->join('materi', 'matakuliah.matakuliah_id = materi.matakuliah_id', 'left');
		$this->db->join('dosen', 'matakuliah.dosen_id = dosen.dosen_id', 'left');
		$this->db->where('matakuliah.kelas_id', $kelas_id); // Filter berdasarkan ID kelas
		$this->db->group_by('matakuliah.matakuliah_id');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getKelasByMahasiswa($mahasiswa_id) {
		$this->db->select('kelas.*, prodi.nama_prodi, fakultas.nama_fakultas, tahun_ajaran.semester');
		$this->db->from('mahasiswa_kelas');
		$this->db->join('kelas', 'mahasiswa_kelas.kelas_id = kelas.kelas_id');
		$this->db->join('prodi', 'kelas.prodi_id = prodi.prodi_id');
		$this->db->join('fakultas', 'prodi.fakultas_id = fakultas.fakultas_id');
		$this->db->join('tahun_ajaran', 'kelas.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id');
		$this->db->where('mahasiswa_kelas.mahasiswa_id', $mahasiswa_id);
		$query = $this->db->get();
		return $query->result();
	}
	

    public function update_matakuliah($matakuliah_id, $data) {
        $this->db->where('matakuliah_id', $matakuliah_id);
        $this->db->update('matakuliah', $data);
    }

    public function delete_matakuliah($matakuliah_id) {
		// Ambil semua materi terkait dengan matakuliah yang akan dihapus
		$this->db->where('matakuliah_id', $matakuliah_id);
		$query = $this->db->get('materi');
		$materi_list = $query->result();
	
		// Hapus file dokumen untuk setiap materi terkait
		foreach ($materi_list as $materi) {
			$file_path = './upload/dokumen/'.$materi->dokumen;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
		// Hapus semua materi terkait dengan matakuliah
		$this->db->where('matakuliah_id', $matakuliah_id);
		$this->db->delete('materi');
		// Terakhir, hapus record matakuliah itu sendiri
		$this->db->where('matakuliah_id', $matakuliah_id);
		$this->db->delete('matakuliah');
	}
	
}
