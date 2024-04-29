<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('FakultasModel');

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
		$this->data['title'] = 'Data Fakultas';

		$this->data['fakultas'] = $this->FakultasModel->get_all_fakultas();
        $this->data['content_view'] = 'admin/fakultas/index';
        $this->load->view('templates/content', $this->data);
	}

	public function simpan() {
        $data = array(
            'fakultas_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'kode_fakultas' => $this->input->post('kode_fakultas'),
            'nama_fakultas' => $this->input->post('nama_fakultas'),
        );

        $this->FakultasModel->insert_fakultas($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('fakultas');
    }

    public function update() {
        $fakultas_id = $this->input->post('fakultas_id');
        $data = array(
            'nama_fakultas' => $this->input->post('nama_fakultas'),
        );

        $this->FakultasModel->update_fakultas($fakultas_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('fakultas');
    }

    public function delete() {
		
		$fakultas_id = $this->input->post('fakultas_id');
		$has_relations = $this->FakultasModel->check_active_relations($fakultas_id);
	
		if ($has_relations) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">Tidak dapat menghapus <b>Fakultas</b> karena ada relasi yang <b>Aktif</b>!</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
		} else {
			$this->FakultasModel->delete_fakultas($fakultas_id);
			$this->session->set_flashdata('alert', '<div class="alert alert-info">Data fakultas berhasil dihapus!</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
		}
        redirect('fakultas');
    }

	public function cetak() {
		$data['title'] = 'Data Fakultas';

		$this->load->model('LembagaModel');
		$data['lembaga'] = $this->LembagaModel->get_lembaga();
		$data['fakultas'] = $this->FakultasModel->get_all_fakultas();
		$this->load->view('admin/fakultas/cetak', $data);
	}
}
