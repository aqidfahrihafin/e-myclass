<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->model('LembagaModel');

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
		$this->data['title'] = 'Data Users';

		$this->data['users_profiles'] = $this->UsersModel->get_all_users();
        $this->data['content_view'] = 'admin/users/index';
        $this->load->view('templates/content', $this->data);
	}

	public function card() {
		$this->data['title'] = 'Card Reward';

		$user_id = $this->session->userdata('user_id');
  		$this->data['user_data'] = $this->UsersModel->get_user_data_by_user_id($user_id);
		$this->data['lembaga'] = $this->LembagaModel->get_lembaga();
		$this->data['content_view'] = 'admin/card/index';
		$this->load->view('templates/content', $this->data);
	}
	public function cetakcard() {
		$this->data['title'] = 'Card Reward';

		$user_id = $this->session->userdata('user_id');
  		$this->data['user_data'] = $this->UsersModel->get_user_data_by_user_id($user_id);
		$this->data['lembaga'] = $this->LembagaModel->get_lembaga();
		$this->load->view('admin/card/cetak', $this->data);
	}

    public function update() {
        $user_id = $this->input->post('user_id');
        $this->data = array(
            'role' => $this->input->post('role'),
        );

        $this->UsersModel->update_user($user_id, $this->data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('users');
    }

	public function cetak() {
		$this->data['title'] = 'Data Matapelajaran';

		$this->load->model('LembagaModel');
		$this->data['lembaga'] = $this->LembagaModel->get_lembaga();
		$this->data['users_profiles'] = $this->UsersModel->get_all_users();
		$this->load->view('admin/users/cetak', $this->data);
	}
}
