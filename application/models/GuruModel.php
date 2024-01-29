<?php
class GuruModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_guru() {
        $query = $this->db->get('guru');
        return $query->result_array();
    }

	public function get_photo_filename($guru_id) {
        $this->db->select('photo');
        $this->db->where('guru_id', $guru_id);
        $query = $this->db->get('guru');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->photo;
        }
        return null;
    }

    public function update_guru($guru_id, $data) {
        $this->db->where('guru_id', $guru_id);
        $this->db->update('guru', $data);
    }

}?>
