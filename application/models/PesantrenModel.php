<?php
class PesantrenModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Mengambil semua data pesantren
    public function get_pesantren() {
        $query = $this->db->get('pesantren');
        return $query->result_array();
    }

    // Mengupdate data pesantren
    public function update_pesantren($data, $id) {
        $this->db->where('id', $id);
        return $this->db->update('pesantren', $data);
    }

}?>
