<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
    }

	public function index() {
		$data['title'] = 'Data Users';

		$data['users_profiles'] = $this->UsersModel->get_all_users();
        $data['content_view'] = 'admin/users/index';
        $this->load->view('templates/content', $data);
	}

    public function update() {
        $user_id = $this->input->post('user_id');
        $data = array(
            'role' => $this->input->post('role'),
        );

        $this->UsersModel->update_user($user_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('users');
    }

	public function cetak() {
		$data['title'] = 'Data Matapelajaran';

		$data['users_profiles'] = $this->UsersModel->get_all_users();
		$this->load->view('admin/users/cetak', $data);
	}
}
