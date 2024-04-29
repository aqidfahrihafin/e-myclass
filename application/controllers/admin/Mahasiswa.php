<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct() {
        parent::__construct();
			$this->load->model('MahasiswaModel');
			$this->load->model('ProdiModel');
			$this->load->model('AuthModel');
			$this->load->model('UsersModel');
			$this->load->model('LembagaModel');
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
		$this->data['title'] = 'Data Mahasiswa';

		$this->data['mahasiswa'] = $this->MahasiswaModel->get_all_data_mahasiswa();
		$this->data['prodi'] = $this->ProdiModel->get_data_prodi();
		$this->data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->data['content_view'] = 'admin/mahasiswa/index';
        $this->load->view('templates/content', $this->data);
	}

	public function formulir($mahasiswa_id) {
		$data['title'] = 'Formulir mahasiswa';
		$data['lembaga'] = $this->LembagaModel->get_lembaga();
        $data['mahasiswa'] = $this->MahasiswaModel->get_mahasiswa_by_id($mahasiswa_id);
		$data['prestasi'] = $this->MahasiswaModel->get_prestasi_by_mahasiswa_id($mahasiswa_id);
        $this->load->view('admin/mahasiswa/cetak-data-formulir', $data);
    }

	public function cetak() {
		$this->data['title'] = 'Cetak Data mahasiswa';

		$this->data['lembaga'] = $this->LembagaModel->get_lembaga();
		$this->data['mahasiswa'] = $this->MahasiswaModel->get_all_data_mahasiswa();
		$this->data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->load->view('admin/mahasiswa/cetak-data-mahasiswa', $this->data);
	}

	public function alumni() {
		$this->data['title'] = 'Data Alumni';
		$this->data['mahasiswa'] = $this->MahasiswaModel->get_all_data_mahasiswa();
		$this->data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->data['content_view'] = 'admin/mahasiswa/alumni';
        $this->load->view('templates/content', $this->data);
	}

	public function cetak_alumni() {
		$this->data['title'] = 'Cetak Data Alumni Mahasiswa';
		$this->data['lembaga'] = $this->LembagaModel->get_lembaga();
		$this->data['mahasiswa'] = $this->MahasiswaModel->get_all_data_mahasiswa();
		$this->data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->load->view('admin/mahasiswa/cetak-data-alumni', $this->data);
	}

	 public function simpan() {

		$nim = $this->input->post('nim');
		$nik = $this->input->post('nik');
		$nim_exists = $this->MahasiswaModel->cek_nim_exist($nim);
			if ($nim_exists) {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">no induk sudah terdaftar dalam database!</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('mahasiswa');
				return; 
		 }
		$nik_exists = $this->MahasiswaModel->cek_nik_exist($nik);
			if ($nik_exists) {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">NIK sudah terdaftar dalam database!</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('mahasiswa');
				return; 
			}

		$data = array(
			'mahasiswa_id' => md5(date('YmdHis') . rand(1000, 9999)),
			'no_card' => rand(1000, 9999),
			'nim' => $nim,
			'nik' => $nik,
			'prodi_id' => $this->input->post('prodi_id'),
			'no_kk' => $this->input->post('no_kk'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat_mahasiswa' => $this->input->post('alamat_mahasiswa'),
			'telp_mahasiswa'  => $this->input->post('telp_mahasiswa'),
			'email'  => $this->input->post('email'),
			'photo'  => 'user.jpg',
			'tahun_ajaran_id'  => $this->input->post('tahun_ajaran_id'),
			'tanggal_masuk'  => date('Y-m-d'),
			'status'  => 'non-aktif',
		);

		$this->MahasiswaModel->insert_mahasiswa($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('mahasiswa');
	}

	public function update() {
		$mahasiswa_id = $this->input->post('mahasiswa_id');
		$data = array(
			'nim' => $this->input->post('nim'),
			'nik' => $this->input->post('nik'),
			'prodi_id' => $this->input->post('prodi_id'),
			'no_kk' => $this->input->post('no_kk'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat_mahasiswa' => $this->input->post('alamat_mahasiswa'),
			'telp_mahasiswa'  => $this->input->post('telp_mahasiswa'),
			'email'  => $this->input->post('email'),
			'status'  => $this->input->post('status'),
		);

		$this->MahasiswaModel->update_mahasiswa($mahasiswa_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil diperbarui!</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('mahasiswa');
	}

	public function reg_user() {

		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[users.username]');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Gagal aktifkan user, Username sudah aktif !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('mahasiswa');
		} else {
			
			$mahasiswa_id = $this->input->post('mahasiswa_id');
			$username = $this->input->post('username');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data_users = array(
				'user_id' => $mahasiswa_id,
				'username' => $username,
				'password' => $password,
				'role' => 'mahasiswa'
			);
			$this->AuthModel->register($data_users);

			$mahasiswa_id = $this->input->post('mahasiswa_id');
			if ($mahasiswa_id) {
				$data_mahasiswa = array(
					'status' => 'aktif'
				);
				$this->MahasiswaModel->update_status($mahasiswa_id, $data_mahasiswa);
			}

			$data_profile = array(
				'users_profile_id' => uniqid('', true),
				'user_id' => $mahasiswa_id,
				'mahasiswa_id' => $mahasiswa_id,
			);

			$this->AuthModel->insert_user_profile($data_profile);
			$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data users berhasil di aktifkan !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('mahasiswa');
		}
	}


	public function delete($mahasiswa_id) {		
		$this->MahasiswaModel->delete_mahasiswa($mahasiswa_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil dihapus!</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('mahasiswa');
	}
}
