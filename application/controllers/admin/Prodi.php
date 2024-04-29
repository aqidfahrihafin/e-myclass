<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('ProdiModel');
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

    public function index(){

        $this->data['title'] = "Data Prodi";
        $this->data['prodi_list'] = $this->ProdiModel->get_all_prodi();
        $this->data['prodi'] = $this->ProdiModel->get_data_prodi();
		$this->data['fakultas'] = $this->FakultasModel->get_all_fakultas();
        $this->data['jumlah'] = $this->db->count_all('prodi');

		$this->data['content_view'] = 'admin/prodi/index';
        $this->load->view('templates/content', $this->data);
    }

    public function simpan(){

	$this->form_validation->set_rules('kode_prodi', 'kode_prodi', 'required|trim|is_unique[prodi.kode_prodi]');
	$this->form_validation->set_rules('nama_prodi', 'Nama prodi', 'required');
	$this->form_validation->set_rules('fakultas_id', 'fakultas_id', 'required');

        if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Data gagal di tambahkan !</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
            redirect('prodi');
        } else {
            $data = array(
				'prodi_id' => md5(date('YmdHis') . rand(1000, 9999)),
                'kode_prodi' => $this->input->post('kode_prodi'),
                'nama_prodi' => $this->input->post('nama_prodi'),
                'fakultas_id' => $this->input->post('fakultas_id'),
            );
            $this->ProdiModel->insert_prodi($data);
            $this->session->set_flashdata('alert', '<div class="alert  alert-info">Data prodi berhasil di tambahkan !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
            redirect('prodi');
        }
    }

	public function delete($prodi_id){

		 
	
		redirect('prodi');
	}	

    public function update(){ 
		$prodi_id = $this->input->post('prodi_id');
        $data = array(
            'kode_prodi' => $this->input->post('kode_prodi'),
            'nama_prodi' => $this->input->post('nama_prodi'),
            'fakultas_id' => $this->input->post('fakultas_id'),
        );

        $this->ProdiModel->update_prodi($prodi_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('prodi');
 }

}
