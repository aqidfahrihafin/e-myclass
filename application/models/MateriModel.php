<?php

class MateriModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_materi($data) {
        $this->db->insert('materi', $data);
    }

	public function get_materi_by_matakuliah($matakuliah_id) {
        $this->db->select('materi.*,matakuliah.*, kelas.*, dosen.*');
        $this->db->from('materi');
        $this->db->join('kelas', 'materi.kelas_id = kelas.kelas_id', 'left');
		$this->db->join('matakuliah', 'materi.matakuliah_id = matakuliah.matakuliah_id', 'left');
		$this->db->join('dosen', 'matakuliah.dosen_id = dosen.dosen_id', 'left');
        $this->db->where('materi.matakuliah_id', $matakuliah_id);
        return $this->db->get()->result();
    }
	

	public function get_materi_by_id($materi_id) {
		$this->db->select('materi.*,matakuliah.*, kelas.*, dosen.*');
        $this->db->from('materi');
        $this->db->join('kelas', 'materi.kelas_id = kelas.kelas_id', 'left');
		$this->db->join('matakuliah', 'materi.matakuliah_id = matakuliah.matakuliah_id', 'left');
		$this->db->join('dosen', 'matakuliah.dosen_id = dosen.dosen_id', 'left');
		$this->db->where('materi.materi_id', $materi_id);
		return $this->db->get()->result();
	}

	
    public function update_materi($materi_id, $data) {
        $this->db->where('materi_id', $materi_id);
        $this->db->update('materi', $data);
    }

    public function delete_materi($materi_id) {
        $this->db->delete('materi', array('materi_id' => $materi_id));
    }

	// MateriModel.php

	public function view_materi_by_id($materi_id) {
		return $this->db->get_where('materi', array('materi_id' => $materi_id))->row();
	}

	
	public function materi_by_id($materi_id) {
        $query = $this->db->get_where('materi', array('materi_id' => $materi_id));
        return $query->row(); // Mengembalikan satu baris hasil query
    }

	public function get_dokumen_filename($materi_id) {
        $this->db->select('dokumen');
        $this->db->where('materi_id', $materi_id);
        $query = $this->db->get('materi');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->dokumen;
        }
        return null;
    }
}
