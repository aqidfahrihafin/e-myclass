<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function __construct() {
        parent::__construct();
			$this->load->model('SantriModel');
			$this->load->model('AuthModel');
			$this->load->model('UsersModel');
			$this->load->model('TahunAjaranModel');
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
		$this->data['title'] = 'Data Santri';

		$this->data['santri'] = $this->SantriModel->get_all_data_santri();
		$this->data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->data['content_view'] = 'admin/santri/index';
        $this->load->view('templates/content', $this->data);
	}

	public function formulir($santri_id) {
		$data['title'] = 'Formulir Santri';
        $data['santri'] = $this->SantriModel->get_santri_by_id($santri_id);
		$data['prestasi'] = $this->SantriModel->get_prestasi_by_santri_id($santri_id);
		$data['beasiswa'] = $this->SantriModel->get_beasiswa_by_santri_id($santri_id);
        $this->load->view('admin/santri/cetak-data-formulir', $data);
    }

	public function cetak() {
		$this->data['title'] = 'Cetak Data Santri';

		$this->data['santri'] = $this->SantriModel->get_all_data_santri();
		$this->data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->load->view('admin/santri/cetak-data-santri', $this->data);
	}

	public function alumni() {
		$this->data['title'] = 'Data Alumni';
		$this->data['santri'] = $this->SantriModel->get_all_data_santri();
		$this->data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->data['content_view'] = 'admin/santri/alumni';
        $this->load->view('templates/content', $this->data);
	}

	public function cetak_alumni() {
		$this->data['title'] = 'Cetak Data Santri';
		$this->data['santri'] = $this->SantriModel->get_all_data_santri();
		$this->data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->load->view('admin/santri/cetak-data-alumni', $this->data);
	}

	 public function simpan() {

		$no_induk = $this->input->post('no_induk');
		$nik = $this->input->post('nik');
		$no_induk_exists = $this->SantriModel->cek_no_induk_exist($no_induk);
			if ($no_induk_exists) {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">no induk sudah terdaftar dalam database!</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('santri');
				return; 
		 }
		$nik_exists = $this->SantriModel->cek_nik_exist($nik);
			if ($nik_exists) {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">NIK sudah terdaftar dalam database!</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('santri');
				return; 
			}

		$data = array(
			'santri_id' => md5(date('YmdHis') . rand(1000, 9999)),
			'no_induk' => $no_induk,
			'nik' => $nik,
			'no_kk' => $this->input->post('no_kk'),
			'nama_santri' => $this->input->post('nama_santri'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat_santri' => $this->input->post('alamat_santri'),
			'telp_santri'  => $this->input->post('telp_santri'),
			'email'  => $this->input->post('email'),
			'photo'  => 'user.png',
			'nama_ayah'  => $this->input->post('nama_ayah'),
			'alamat_ayah'  => $this->input->post('alamat_ayah'),
			'pendidikan_ayah'  => $this->input->post('pendidikan_ayah'),
			'pekerjaan_ayah'  => $this->input->post('pekerjaan_ayah'),
			'telp_ayah'  => $this->input->post('telp_ayah'),
			'nama_ibu'  => $this->input->post('nama_ibu'),
			'alamat_ibu'  => $this->input->post('alamat_ibu'),
			'pendidikan_ibu'  => $this->input->post('pendidikan_ibu'),
			'pekerjaan_ibu'  => $this->input->post('pekerjaan_ibu'),
			'telp_ibu'  => $this->input->post('telp_ibu'),
			'tahun_ajaran_id'  => $this->input->post('tahun_ajaran_id'),
			'tanggal_masuk'  => $this->input->post('tanggal_masuk'),
			'status'  => 'non-aktif',
		);

		$this->SantriModel->insert_santri($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('santri');
	}

	public function update() {
		$santri_id = $this->input->post('santri_id');
		$data = array(
			'no_induk' => $this->input->post('no_induk'),
			'nik' => $this->input->post('nik'),
			'no_kk' => $this->input->post('no_kk'),
			'nama_santri' => $this->input->post('nama_santri'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat_santri' => $this->input->post('alamat_santri'),
			'telp_santri'  => $this->input->post('telp_santri'),
			'email'  => $this->input->post('email'),
			'nama_ayah'  => $this->input->post('nama_ayah'),
			'alamat_ayah'  => $this->input->post('alamat_ayah'),
			'pendidikan_ayah'  => $this->input->post('pendidikan_ayah'),
			'pekerjaan_ayah'  => $this->input->post('pekerjaan_ayah'),
			'telp_ayah'  => $this->input->post('telp_ayah'),
			'nama_ibu'  => $this->input->post('nama_ibu'),
			'alamat_ibu'  => $this->input->post('alamat_ibu'),
			'pendidikan_ibu'  => $this->input->post('pendidikan_ibu'),
			'pekerjaan_ibu'  => $this->input->post('pekerjaan_ibu'),
			'telp_ibu'  => $this->input->post('telp_ibu'),
			'tahun_ajaran_id'  => $this->input->post('tahun_ajaran_id'),
			'tanggal_masuk'  => $this->input->post('tanggal_masuk'),
			'status'  => $this->input->post('status'),
		);

		$this->SantriModel->update_santri($santri_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil diperbarui!</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('santri');
	}

	public function reg_user() {

		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[users.username]');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Gagal aktifkan user, Username sudah aktif !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('santri');
		} else {
			
			$santri_id = $this->input->post('santri_id');
			$username = $this->input->post('username');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data_users = array(
				'user_id' => $santri_id,
				'username' => $username,
				'password' => $password,
				'role' => 'wali'
			);
			$this->AuthModel->register($data_users);

			$santri_id = $this->input->post('santri_id');
			if ($santri_id) {
				$data_santri = array(
					'status' => 'aktif'
				);
				$this->SantriModel->update_status($santri_id, $data_santri);
			}

			$data_profile = array(
				'users_profile_id' => md5(date('YmdHis') . rand(1000, 9999)),
				'user_id' => $santri_id,
				'santri_id' => $santri_id,
			);

			$this->AuthModel->insert_user_profile($data_profile);
			$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data users berhasil di aktifkan !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('santri');
		}
	}


	public function delete($santri_id) {		
		$this->SantriModel->delete_santri($santri_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil dihapus!</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('santri');
	}
}
