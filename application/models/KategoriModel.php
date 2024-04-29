<?php

class KategoriModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_kategori($data) {
        $this->db->insert('kategori', $data);
    }

	public function get_all_kategori() {
		$this->db->order_by('create_at', 'desc');
		$result = $this->db->get('kategori')->result();
		return $result;
    }

    public function update_kategori($kategori_id, $data) {
        $this->db->where('kategori_id', $kategori_id);
        $this->db->update('kategori', $data);
    }

    public function delete_kategori($kategori_id) {
        $this->db->delete('kategori', array('kategori_id' => $kategori_id));
    }
}
