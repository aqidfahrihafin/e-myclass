<?php
class ProdiModel extends CI_Model
{
 	public function get_data_prodi(){
		$this->db->select('prodi.*,fakultas.nama_fakultas');
		$this->db->from('prodi');
		$this->db->join('fakultas', 'fakultas.fakultas_id = prodi.fakultas_id');
		return $this->db->get()->result();
	}
	
	public function get_prodi_by_kode($kode_prodi){
        $this->db->where('kode_prodi', $kode_prodi);
        $query = $this->db->get('prodi');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function get_all_prodi(){
		return $this->db->get('prodi')->result();
	}

	public function countDataProdi(){
		return $this->db->count_all('prodi');
	}

	 public function get_prodi($prodi_id){
        $query = $this->db->get_where('prodi', array('prodi_id' => $prodi_id));
        return $query->row_array();
    }
	 public function insert_prodi($data){
        return $this->db->insert('prodi', $data);
    }

    public function update_prodi($prodi_id, $data){
        $this->db->where('prodi_id', $prodi_id);
        return $this->db->update('prodi', $data);
    }

    public function delete_prodi($prodi_id){
        $this->db->where('prodi_id', $prodi_id);
        return $this->db->delete('prodi');
    }

	public function check_active_relations($prodi_id) {
        // Lakukan pengecekan relasi aktif
        $this->db->where('prodi_id', $prodi_id);
        $this->db->from('dosen');
        $dosen_count = $this->db->count_all_results();

        $this->db->where('prodi_id', $prodi_id);
        $this->db->from('mahasiswa');
        $mahasiswa_count = $this->db->count_all_results();

        // Jika terdapat relasi aktif dengan dosen atau mahasiswa, kembalikan true
        return ($dosen_count > 0 || $mahasiswa_count > 0);
    }

}?>
