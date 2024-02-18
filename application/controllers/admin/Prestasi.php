<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('PrestasiModel');
		$this->load->model('SantriModel');
		$this->load->model('TahunAjaranModel');
		if (!$this->session->userdata('user_id')) {
			$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Maaf anda belum login !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('login');
		}
    }

	public function index() {
		$data['title'] = 'Data prestasi';

		$data['santri'] = $this->PrestasiModel->get_all_prestasi();
        $data['content_view'] = 'admin/prestasi/index';
        $this->load->view('templates/content', $data);
	}

	public function simpan() { 

        $this->form_validation->set_rules('santri_id', 'Santri', 'required');
        $this->form_validation->set_rules('tingkat_prestasi', 'Tingkat', 'required');
        $this->form_validation->set_rules('jenis_prestasi', 'Jenis Prestasi', 'required');
        $this->form_validation->set_rules('nama_prestasi', 'Nama Prestasi', 'required');
        $this->form_validation->set_rules('tahun_prestasi', 'Tahun', 'required|numeric|exact_length[4]');
        $this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'required');
        $this->form_validation->set_rules('peringkat', 'Peringkat', 'required');

        if ($this->form_validation->run() === FALSE) {
         	$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
            redirect('prestasi');
        } else {
            $data = array(
				'prestasi_id' => md5(date('YmdHis') . rand(1000, 9999)),
                'santri_id' => $this->input->post('santri_id'),
                'tingkat_prestasi' => $this->input->post('tingkat_prestasi'),
                'jenis_prestasi' => $this->input->post('jenis_prestasi'),
                'nama_prestasi' => $this->input->post('nama_prestasi'),
                'tahun_prestasi' => $this->input->post('tahun_prestasi'),
                'penyelenggara' => $this->input->post('penyelenggara'),
                'peringkat' => $this->input->post('peringkat')
            );

            $this->PrestasiModel->insert_prestasi($data);
			$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
            redirect('prestasi');
        }
    }

    public function update() {
        $prestasi_id = $this->input->post('prestasi_id');
        $data = array(
            'prestasi' => $this->input->post('prestasi'),
            'jenis_prestasi' => $this->input->post('jenis_prestasi'),
            'target_prestasi' => $this->input->post('target_prestasi'),
			'santri_id' => $this->input->post('santri_id'),
            'tahun_ajaran_id' => $this->input->post('tahun_ajaran_id'),
        );

        $this->PrestasiModel->update_prestasi($prestasi_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('prestasi');
    }

    public function delete($prestasi_id) {
        $this->PrestasiModel->delete_prestasi($prestasi_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('prestasi');
    }
	
}
