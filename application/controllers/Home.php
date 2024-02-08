<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('AuthModel');
    }

	public function index() {
		$data['title'] = 'Home Page';

        $this->load->view('auth/home', $data);
	}

	public function lupapw() {
		$data['title'] = 'Halaman Lupa Password';

        $this->load->view('auth/lupa-pw', $data);
	}


	public function login() {
		$data['title'] = 'Halaman Login';

        $this->load->view('auth/login', $data);
	}

	public function proses_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('AuthModel');
        $user = $this->AuthModel->login($username, $password);
        if ($user) {
            $this->session->set_userdata('user_id', $user->user_id);
            redirect('dashboard');
        } else {
            $data['error'] = 'Invalid username or password';
            $this->load->view('login', $data);
        }
    }

	public function proses_registrasi() {

		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[users.username]', [
            'is_unique' => '<div class="alert alert-danger font-weight-bold"  align="justify"> Registrasi gagal username anda sudah terdaftar! </div>'
        ]);

        if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('username', form_error('username'));
			$this->session->set_flashdata('alert_timeout', 4000);
			redirect('register');
        } else {
			
            $username = $this->input->post('username');
            $role = $this->input->post('role');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data = array(
                'username' => $username,
                'password' => $password,
                'role' => $role
            );

            $this->AuthModel->register($data);

            $this->session->set_flashdata('sukses', 'Registrasi berhasil, silahkan login !');
       		$this->session->set_flashdata('alert_timeout', 4000);
            redirect('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
