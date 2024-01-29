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
        $this->db->join('guru', 'kelas.guru_id = guru.guru_id', 'left');
        $this->db->join('tahun_ajaran', 'kelas.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
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
