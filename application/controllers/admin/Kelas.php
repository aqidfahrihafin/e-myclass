<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('KelasModel');
		$this->load->model('UsersModel');
		$this->load->model('DosenModel');
		$this->load->model('SemesterModel');
		$this->load->model('ProdiModel');
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
		$this->data['title'] = 'Data Kelas';
        $user_role = $this->data['user_data']->role; 
		$mahasiswa_id = $this->session->userdata('user_id');
        
		$semester = $this->SemesterModel->get_all_semester();
		if ($semester) {
				$this->data['semester'] = $semester;
			} else {
				$this->data['semester'] = null;
		}

		$this->data['kelas'] = $this->KelasModel->get_all_kelas();
		$this->data['dosen'] = $this->DosenModel->get_all_dosen();
		$this->data['prodi'] = $this->ProdiModel->get_data_prodi();
		$this->data['kelas_mahasiswa'] = $this->KelasModel->getKelasByMahasiswa($mahasiswa_id);
		$this->data['tahunajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->data['content_view'] = 'admin/kelas/'.$user_role;
        $this->load->view('templates/content', $this->data);
	}

    public function simpan() {

		$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < 8; $i++) {
				$randomString .= $letters[rand(0, strlen($letters) - 1)];
		}
        $data = array(
            'kelas_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'kode_kelas' => $randomString,
            'nama_kelas' => $this->input->post('nama_kelas'),
            'prodi_id' => $this->input->post('prodi_id'),
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
            'nama_kelas' => $this->input->post('nama_kelas'),
            'prodi_id' => $this->input->post('prodi_id'),
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
