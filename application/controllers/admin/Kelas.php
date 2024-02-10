<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('KelasModel');
		$this->load->model('GuruModel');
		$this->load->model('TahunAjaranModel');
		if (!$this->session->userdata('user_id')) {
			$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Maaf anda belum login !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('login');
		}
    }

	public function index() {
		$data['title'] = 'Data Kelas';

		$data['kelas'] = $this->KelasModel->get_all_kelas();
		$data['guru'] = $this->GuruModel->get_all_guru();
		$data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $data['content_view'] = 'admin/kelas/index';
        $this->load->view('templates/content', $data);
	}

    public function simpan() {
        $data = array(
            'kelas_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'kode_kelas' => 'KL-0'.(date('y') . rand(1000, 99)),
            'kelas' => $this->input->post('kelas'),
            'jenis_kelas' => $this->input->post('jenis_kelas'),
            'target_kelas' => $this->input->post('target_kelas'),
            'guru_id' => $this->input->post('guru_id'),
            'tahun_ajaran_id' => $this->input->post('tahun_ajaran_id'),
        );

        $this->KelasModel->insert_kelas($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('kelas');
    }

    public function update() {
        $kelas_id = $this->input->post('kelas_id');
        $data = array(
            'kelas' => $this->input->post('kelas'),
            'jenis_kelas' => $this->input->post('jenis_kelas'),
            'target_kelas' => $this->input->post('target_kelas'),
			'guru_id' => $this->input->post('guru_id'),
            'tahun_ajaran_id' => $this->input->post('tahun_ajaran_id'),
        );

        $this->KelasModel->update_kelas($kelas_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('kelas');
    }

    public function delete($kelas_id) {
        $this->KelasModel->delete_kelas($kelas_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('kelas');
    }
	
}
