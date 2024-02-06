<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamengajar extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('GuruModel');
        $this->load->model('TahunAjaranModel');
    }

	public function index() {
		$data['title'] = 'Pembimbing';

		$data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
		 
		$tahun_ajaran_id = $this->input->post('tahun_ajaran_id');
			if ($tahun_ajaran_id) {
				$data['guru'] = $this->GuruModel->get_all_data_guru($tahun_ajaran_id);
			} else {
				$data['guru'] = array();
			}

        $data['content_view'] = 'admin/pembimbing/index';
        $this->load->view('templates/content', $data);
	}

	public function cetak($tahun_ajaran_id) {
		$data['title'] = 'Cetak Pembimbing';
	
		$data['tahunajaran'] = $this->TahunAjaranModel->get_tahun_ajaran_by_id($tahun_ajaran_id);
		$data['guru'] = $this->GuruModel->get_all_data_guru($tahun_ajaran_id);
	
		$this->load->view('admin/pembimbing/cetak', $data);
	}
	

}
