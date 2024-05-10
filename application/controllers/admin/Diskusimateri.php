<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusimateri extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('MateriModel');
        $this->load->model('DiskusiMateriModel');
        $this->load->model('UsersModel');
        $this->load->model('KelasModel');

		if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('alert', '<div class="alert  alert-danger">Maaf anda belum login !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->UsersModel->get_user_data_by_user_id($user_id);
        $this->data['user_data'] = $user_data;
    }


	public function simpan() {
		$materi_id = $this->session->userdata('materi_id');
        $data = array(
            'diskusi_materi_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'materi_id' => $this->input->post('materi_id'),
            'user_id' => $this->input->post('user_id'),
            'isi_diskusi' => $this->input->post('isi_diskusi'),
			'tanggal_posting' => date('Y-m-d H:i:s'),
        );

        $this->DiskusiMateriModel->insert_diskusi_materi($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Komentar berhasil di tambahkan !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('detailmateri/'.$materi_id);
    }


}
