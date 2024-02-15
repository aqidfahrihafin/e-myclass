<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('GuruModel');
        $this->load->model('KelasModel');
        $this->load->model('MapelModel');
		$this->load->model('PenilaianModel');
		$this->load->model('UsersModel');

			if (!$this->session->userdata('user_id')) {
				$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Maaf anda belum login !</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('login');
			}
		$user_id = $this->session->userdata('user_id');
		$user_data = $this->UsersModel->get_user_data_by_user_id($user_id);
		$this->data['user_data'] = $user_data;
    }

	public function index() {
		$data['title'] = 'Penilaian';
		$data_ajar_id = $this->input->post('data_ajar_id');
			if ($data_ajar_id) {
				$data['data_ajar'] = $this->PenilaianModel->get_all_data_ajar($data_ajar_id);
			} else {
				$data['data_ajar'] = array();
			}

        $data['content_view'] = 'admin/penilaian/index';
        $this->load->view('templates/content', $data);
	}

	public function cetak($data_ajar_id) {
		$data['title'] = 'Cetak Data Ajar';
	
		$data['data_ajar'] = $this->PenilaianModel->get_all_data_ajar($data_ajar_id);
	
		$this->load->view('admin/dataajar/cetak', $data);
	}

	public function get_kelas_by_mapel() {
        $mapel_id = $this->input->post('mapel_id');
        $kelas = $this->PenilaianModel->get_kelas_by_mapel($mapel_id);
        echo json_encode($kelas);
    }
	

}
