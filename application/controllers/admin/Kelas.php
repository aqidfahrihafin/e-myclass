<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('KelasModel');
    }

	public function index() {
		$data['title'] = 'Data Kelas';

		$data['kelas'] = $this->KelasModel->get_all_kelas();
        $data['content_view'] = 'admin/kelas/index';
        $this->load->view('templates/content', $data);
	}

    public function simpan() {
        $data = array(
            'kelas_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'kode_kelas' => 'KL-0'.(date('y') . rand(1000, 99)),
            'kelas' => $this->input->post('kelas'),
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
