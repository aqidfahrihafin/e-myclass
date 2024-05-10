<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct() {
        parent::__construct();
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
		$this->data['title'] = 'Data Profile';

		$user_id = $this->session->userdata('user_id');
  		$this->data['user_data'] = $this->UsersModel->get_user_data_by_user_id($user_id);
		$this->data['users_profiles'] = $this->UsersModel->get_all_users();
        $this->data['content_view'] = 'admin/users/profil';
        $this->load->view('templates/content', $this->data);
	}

	public function is_default_photo($file_name){
		$default_photo = 'user.jpg';
		return $file_name === $default_photo;
	}

	public function update_photo_with_qr_code($dosen_id) {
		$config['upload_path'] = './upload/photo/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 5000;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('photo')) {
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$old_file = $this->UsersModel->get_file($dosen_id);
			if (!$this->is_default_photo($old_file['photo'])) {
				unlink('./upload/photo/' . $old_file['photo']);
			}

			$this->form_validation->set_rules('nama_dosen');
			$this->form_validation->set_rules('nidn');
		
			$dosen_id = $dosen_id; 
			$nama_dosen = $this->input->post('nama_dosen'); 
			$nidn = $this->input->post('nidn'); 
			$data = $nidn;
			// $data = 'E-Reward_' .$niy.'_'.$nama_dosen;
			$filename = 'qrcode_dosen_' . $dosen_id;
			$size = '250x250'; 
			$logoPath = FCPATH . './upload/qrcode/logo.png'; 

			$this->load->helper('qrcode');
			// Memeriksa apakah QR code sudah ada sebelumnya
			if (!empty($old_file['qrcode'])) {
				$qrCodePath = generate_qr_code_with_logo($data, $filename, $logoPath, $size, $old_file['qrcode']);
			} else {
				$qrCodePath = generate_qr_code_with_logo($data, $filename, $logoPath, $size);
			}

			$qrCodeFileName = basename($qrCodePath);

			$file_data = array(
				'photo' => $file_name,
				'qrcode' => $qrCodeFileName,
			);

			$this->load->model('UsersModel');
			$this->UsersModel->update_profil($dosen_id, $file_data);

			$this->session->set_flashdata('success', 'Foto dan QR code berhasil diupdate!');
			redirect('profil');
		} else {
			$this->session->set_flashdata('error', 'Foto gagal diupdate!');
			redirect('profil');
		}
	}

	public function update_photo_with_qr_code_mhs($mahasiswa_id) {
		$config['upload_path'] = './upload/photo/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 5000;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('photo')) {
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$old_file = $this->UsersModel->get_file_mhs($mahasiswa_id);
			if (!$this->is_default_photo($old_file['photo'])) {
				unlink('./upload/photo/' . $old_file['photo']);
			}

			$this->form_validation->set_rules('nama_mahasiswa');
			$this->form_validation->set_rules('nim');
		
			$mahasiswa_id = $mahasiswa_id; 
			$nama_mahasiswa = $this->input->post('nama_mahasiswa'); 
			$nim = $this->input->post('nim'); 
			// $data = $nim;
			$data = 'E-Reward_' .$nim.'_'.$nama_mahasiswa;
			$filename = 'qrcode_mahasiswa_' . $mahasiswa_id;
			$size = '250x250'; 
			$logoPath = FCPATH . './upload/qrcode/logo.png'; 

			$this->load->helper('qrcode');
			// Memeriksa apakah QR code sudah ada sebelumnya
			if (!empty($old_file['qrcode'])) {
				$qrCodePath = generate_qr_code_with_logo($data, $filename, $logoPath, $size, $old_file['qrcode']);
			} else {
				$qrCodePath = generate_qr_code_with_logo($data, $filename, $logoPath, $size);
			}

			$qrCodeFileName = basename($qrCodePath);

			$file_data = array(
				'photo' => $file_name,
				'qrcode' => $qrCodeFileName,
			);

			$this->load->model('UsersModel');
			$this->UsersModel->update_profil_mhs($mahasiswa_id, $file_data);

			$this->session->set_flashdata('success', 'Foto dan QR code berhasil diupdate!');
			redirect('profil');
		} else {
			$this->session->set_flashdata('error', 'Foto gagal diupdate!');
			redirect('profil');
		}
	}

}
