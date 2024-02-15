<?php

class PenilaianModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

     public function get_kelas_by_mapel($mapel_id) {
        $this->db->select('kelas_id, kelas');
        $this->db->from('data_ajar');
        $this->db->join('kelas', 'kelas.kelas_id = data_ajar.kelas_id');
        $this->db->where('data_ajar.mapel_id', $mapel_id);
        $this->db->group_by('kelas.kelas_id');
        $query = $this->db->get();
        return $query->result();
    }

}
