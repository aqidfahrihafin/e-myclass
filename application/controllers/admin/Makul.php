<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makul extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('MataKuliahModel');
        $this->load->model('UsersModel');
        $this->load->model('KelasModel');
        $this->load->model('MahasiswaKelasModel');
        $this->load->model('DosenModel');

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
		$user_role = $this->data['user_data']->role; 
	
		if ($user_role == 'admin') {
			$this->data['title'] = 'Mata Kuliah Admin';
			$this->data['kelas'] = $this->KelasModel->get_all_kelas();
			$this->data['dosen'] = $this->DosenModel->get_all_dosen();
			$this->data['matakuliah'] = $this->MataKuliahModel->get_all_matakuliah();
			$this->data['content_view'] = 'admin/matakuliah/index';
			$this->load->view('templates/content', $this->data);
		} elseif ($user_role == 'dosen') {
			$dosen_id = $this->session->userdata('user_id');
			$this->data['kelas'] = $this->KelasModel->get_all_kelas();
			$this->data['dosen'] = $this->DosenModel->get_all_dosen();
			$this->data['title'] = 'Mata Kuliah';
			$this->data['matakuliah'] = $this->MataKuliahModel->get_matakuliah_by_dosen($dosen_id);
			$this->data['content_view'] = 'admin/matakuliah/index';
			$this->load->view('templates/content', $this->data);
		} elseif ($user_role == 'mahasiswa') {

			$mahasiswa_id = $this->session->userdata('user_id');
			$this->data['kelas'] = $this->KelasModel->get_all_kelas();
			$this->data['dosen'] = $this->DosenModel->get_all_dosen();
			$this->data['title'] = 'Mata Kuliah';
			$kelas_mahasiswa = $this->MahasiswaKelasModel->getKelasByMahasiswa($mahasiswa_id);
			if ($kelas_mahasiswa) {
				$this->data['matakuliah'] = $this->MataKuliahModel->get_matakuliah_by_kelas($kelas_mahasiswa[0]->kelas_id);
			} else {
				$this->data['matakuliah'] = [];
				$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Anda belum terdaftar dalam kelas. Silakan hubungi administrator.</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('makul'); 
			}
			$this->data['content_view'] = 'admin/matakuliah/index';
			$this->load->view('templates/content', $this->data);
		} else {
			// Handle jika user_data tidak valid
			redirect('login'); // Redirect ke halaman login jika user_data tidak valid
		}
	}
	
	

	public function simpan() {
        $data = array(
            'matakuliah_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'nama_matakuliah' => $this->input->post('nama_matakuliah'),
            'kelas_id' => $this->input->post('kelas_id'),
            'dosen_id' => $this->input->post('dosen_id'),
            'deskripsi' => $this->input->post('deskripsi'),
            'jumlah_sks' => $this->input->post('jumlah_sks'),
        );

        $this->MataKuliahModel->insert_matakuliah($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('makul');
    }


    public function update() {
        $matakuliah_id = $this->input->post('matakuliah_id');
        $data = array(
			'nama_matakuliah' => $this->input->post('nama_matakuliah'),
            'dosen_id' => $this->input->post('dosen_id'),
            'deskripsi' => $this->input->post('deskripsi'),
            'jumlah_sks' => $this->input->post('jumlah_sks'),
        );

        $this->MataKuliahModel->update_matakuliah($matakuliah_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('makul');
    }

    public function delete($matakuliah_id) {
        $this->MataKuliahModel->delete_matakuliah($matakuliah_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('makul');
    }

}
