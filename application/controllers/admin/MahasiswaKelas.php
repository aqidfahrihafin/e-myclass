<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaKelas extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('DosenModel');
		$this->load->model('ProdiModel');
        $this->load->model('AuthModel');
        $this->load->model('UsersModel');
        $this->load->model('MahasiswaKelasModel');
        $this->load->model('KelasModel');
			if (!$this->session->userdata('user_id')) {
				$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Maaf anda belum login !</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('login');
			}
		$user_id = $this->session->userdata('user_id');
		// $user_data = 'admin'; untuk add user manual
		$user_data = $this->UsersModel->get_user_data_by_user_id($user_id);
		$this->data['user_data'] = $user_data;
    }


	public function simpan() {
		$kode_kelas = $this->input->post('kode_kelas');
		$mahasiswa_id = $this->session->userdata('user_id');
		$mahasiswa_kelas_id = md5(date('YmdHis') . rand(1000, 9999));

		// Cek apakah mahasiswa sudah terdaftar pada kelas tertentu
		$isAlreadyEnrolled = $this->MahasiswaKelasModel->isMahasiswaEnrolled($mahasiswa_id, $kode_kelas);

		if (!$isAlreadyEnrolled) {
			$isValid = $this->MahasiswaKelasModel->cekKodeKelas($kode_kelas);

			if ($isValid) {
				$kelas_id = $this->KelasModel->getKelasIDByKode($kode_kelas);

				$data = array(
					'mahasiswa_kelas_id' => $mahasiswa_kelas_id,
					'mahasiswa_id' => $mahasiswa_id,
					'kelas_id' => $kelas_id,
					'status' => 'aktif',
				);

				$result = $this->MahasiswaKelasModel->insert_mahasiswa_kelas($data);
				if ($result) {
					$this->session->set_flashdata('alert', '<div class="alert  alert-success">anda berhasil bergabung kedalam kelas!</div>');
					$this->session->set_flashdata('alert_timeout', 9000);
					redirect('kelas');
				} else {
					echo "Gagal menambahkan mahasiswa ke kelas.";
				}
			} else {
				$this->session->set_flashdata('alert', '<div class="alert  alert-danger">kode kelas tidak valid!</div>');
				$this->session->set_flashdata('alert_timeout', 9000);
				redirect('kelas');
			}
		} else {
			$this->session->set_flashdata('alert', '<div class="alert  alert-danger">anda sudah terdaftar pada kelas tersebut!</div>');
			$this->session->set_flashdata('alert_timeout', 9000);
			redirect('kelas');
		}
	}

	public function delete($mahasiswa_kelas_id) {
        $this->MahasiswaKelasModel->delete_mahasiswa_kelas($mahasiswa_kelas_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('kelas');
    }
	
	
}
