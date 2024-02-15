<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datamengajar extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('GuruModel');
        $this->load->model('KelasModel');
		$this->load->model('DataAjarModel');
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
		$data['title'] = 'Data Ajar';
		$users_id = $this->session->userdata('user_id');
        $data['mata_pelajaran'] = $this->DataAjarModel->get_mata_pelajaran_by_guru_id($users_id);

		$data['kelas'] = $this->KelasModel->get_all_kelas();
		$data_ajar_id = $this->input->post('data_ajar_id');
			if ($data_ajar_id) {
				$data['data_ajar'] = $this->DataAjarModel->get_all_data_ajar($data_ajar_id);
			} else {
				$data['data_ajar'] = array();
			}

        $data['content_view'] = 'admin/dataajar/index';
        $this->load->view('templates/content', $data);
	}

	public function cetak($data_ajar_id) {
		$data['title'] = 'Cetak Data Ajar';
	
		$data['data_ajar'] = $this->DataAjarModel->get_all_data_ajar($data_ajar_id);
	
		$this->load->view('admin/dataajar/cetak', $data);
	}
	

}
