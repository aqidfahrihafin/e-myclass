<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('GuruModel');
    }

	public function index() {
		$data['title'] = 'Data Guru';

		$data['guru'] = $this->GuruModel->get_all_guru();
        $data['content_view'] = 'admin/guru/index';
        $this->load->view('templates/content', $data);
	}

  public function simpan() {

		$niy = $this->input->post('niy');
		$nik = $this->input->post('nik');

		$niy_exists = $this->GuruModel->cek_niy_exist($niy);
			if ($niy_exists) {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">NIY sudah terdaftar dalam database!</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('guru');
				return; 
			}

		$nik_exists = $this->GuruModel->cek_nik_exist($nik);
			if ($nik_exists) {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">NIK sudah terdaftar dalam database!</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('guru');
				return; 
			}

		$data = array(
			'guru_id' => md5(date('YmdHis') . rand(1000, 9999)),
			'niy' => $niy,
			'nik' => $nik,
			'nama_guru' => $this->input->post('nama_guru'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat_guru' => $this->input->post('alamat_guru'),
			'telp_guru'  => $this->input->post('telp_guru'),
			'pendidikan'  => $this->input->post('pendidikan'),
			'photo'  => 'default.png',
			'status' => $this->input->post('status'),
		);

		$this->GuruModel->insert_guru($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('guru');
	}


    public function update() {
        $guru_id = $this->input->post('guru_id');
        $data = array(
            'niy' => $this->input->post('niy'),
            'nik' => $this->input->post('nik'),
            'nama_guru' => $this->input->post('nama_guru'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_guru' => $this->input->post('alamat_guru'),
            'telp_guru' => $this->input->post('telp_guru'),
			'pendidikan'  => $this->input->post('pendidikan'),
            'status' => $this->input->post('status'),
        );

        $this->GuruModel->update_guru($guru_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('guru');
    }

    public function delete($guru_id) {
        $this->GuruModel->delete_guru($guru_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('guru');
    }

	public function cetak() {
		$data['title'] = 'Cetak Data Guru';

		$data['guru'] = $this->GuruModel->get_all_guru();
		$this->load->view('admin/guru/cetak', $data);
	}
}
