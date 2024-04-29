<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahunajaran extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('TahunAjaranModel');
        $this->load->model('SemesterModel');
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
		$this->data['title'] = 'Tahun Akademik';

		$semester = $this->SemesterModel->get_all_semester();
		if ($semester) {
				$this->data['semester'] = $semester;
			} else {
				$this->data['semester'] = null;
		}

		$this->data['tahun_ajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->data['content_view'] = 'admin/tahunajaran/index';
        $this->load->view('templates/content', $this->data);
	}

    public function simpan() {
        $data = array(
            'tahun_ajaran_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'kode_tahun' => 'TA-0'.(date('y') . rand(1000, 99)),
            'nama_tahun' => $this->input->post('nama_tahun'),
            'status' => $this->input->post('status'),
        );

        $this->TahunAjaranModel->insert_tahun_ajaran($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('tahunajaran');
    }

    public function update() {
        $tahun_ajaran_id = $this->input->post('tahun_ajaran_id');
        $data = array(
            'nama_tahun' => $this->input->post('nama_tahun'),
            'status' => $this->input->post('status'),
        );

        $this->TahunAjaranModel->update_tahun_ajaran($tahun_ajaran_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('tahunajaran');
    }

	public function delete() {

		$tahun_ajaran_id = $this->input->post('tahun_ajaran_id');
		$has_relations = $this->TahunAjaranModel->check_active_relations($tahun_ajaran_id);
	
		if ($has_relations) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">Tidak dapat menghapus <b>Prodi</b> karena ada relasi yang <b>Aktif</b>!</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
		} else {
			$this->TahunAjaranModel->delete_tahun_ajaran($tahun_ajaran_id);
			$this->session->set_flashdata('alert', '<div class="alert alert-info">Data prodi berhasil dihapus!</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
		}
		redirect('tahunajaran');
	}

}
