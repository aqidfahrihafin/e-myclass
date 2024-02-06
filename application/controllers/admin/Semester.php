<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('SemesterModel');
    }

    public function simpan() {
        $data = array(
            'semester_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'semester' => $this->input->post('semester'),
            'tahun_ajaran_id' => $this->input->post('tahun_ajaran_id'),
        );

        $this->SemesterModel->insert_semester($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('tahunajaran');
    }

    public function update() {
        $semester_id = $this->input->post('semester_id');
        $data = array(
            'semester' => $this->input->post('semester'),
            'tahun_ajaran_id' => $this->input->post('tahun_ajaran_id'),
        );

        $this->SemesterModel->update_semester($semester_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('tahunajaran');
    }

    public function delete($semester_id) {
        $this->SemesterModel->delete_semester($semester_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('tahunajaran');
    }
	
}
