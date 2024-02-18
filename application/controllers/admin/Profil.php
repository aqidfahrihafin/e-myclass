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
		$this->data['title'] = 'Data Profil';

		$user_id = $this->session->userdata('user_id');
  		$this->data['user_data'] = $this->UsersModel->get_user_data_by_user_id($user_id);
		$this->data['users_profiles'] = $this->UsersModel->get_all_users();
        $this->data['content_view'] = 'admin/users/profil';
        $this->load->view('templates/content', $this->data);
	}

	public function is_default_photo($file_name){
		$default_photo = 'user.png';
		return $file_name === $default_photo;
	}

	public function update_photo_with_qr_code($guru_id) {
		$config['upload_path'] = './upload/photo/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 5000;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('photo')) {
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$old_file = $this->UsersModel->get_file($guru_id);
			if (!$this->is_default_photo($old_file['photo'])) {
				unlink('./upload/photo/' . $old_file['photo']);
			}

			$this->form_validation->set_rules('nama_guru');
			$this->form_validation->set_rules('nik');
		
			$guru_id = $guru_id; 
			$nama_guru = $this->input->post('nama_guru'); 
			$nik = $this->input->post('nik'); 
			$data = 'e-raport_' .$nik.'_'.$nama_guru;
			$filename = 'qrcode_guru_' . $guru_id;
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
			$this->UsersModel->update_profil($guru_id, $file_data);

			$this->session->set_flashdata('success', 'Foto dan QR code berhasil diupdate!');
			redirect('profil');
		} else {
			$this->session->set_flashdata('error', 'Foto gagal diupdate!');
			redirect('profil');
		}
	}

}
