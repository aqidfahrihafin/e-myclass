<?php
class PesantrenModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_pesantren() {
        $query = $this->db->get('pesantren');
        return $query->result_array();
    }

	public function get_logo_filename($pesantren_id) {
        $this->db->select('logo');
        $this->db->where('pesantren_id', $pesantren_id);
        $query = $this->db->get('pesantren');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->logo;
        }
        return null;
    }

    public function update_pesantren($pesantren_id, $data) {
        $this->db->where('pesantren_id', $pesantren_id);
        $this->db->update('pesantren', $data);
    }

}?>
