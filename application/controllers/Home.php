<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('AuthModel');
		$this->load->model('PesantrenModel');
		$this->data['pesantren'] = $this->PesantrenModel->get_pesantren();
    }

	public function index() {
		$this->data['title'] = 'Home Page';
        $this->load->view('auth/home', $this->data);
	}

	public function lupapw() {
		$this->data['title'] = 'Halaman Lupa Password';

        $this->load->view('auth/lupa-pw', $this->data);
	}


	public function login() {
		$this->data['title'] = 'Halaman Login';

        $this->load->view('auth/login', $this->data);
	}

	public function proses_login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('AuthModel');
		$user = $this->AuthModel->login($username, $password);
		if ($user) {
			// Set user_id dan role di sesi
			$this->session->set_userdata('user_id', $user->user_id);
			$this->session->set_userdata('role', $user->role);

			$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
       		$this->session->set_flashdata('alert_timeout', 4000);
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Username atau password salah !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('login');
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

            $this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
       		$this->session->set_flashdata('alert_timeout', 4000);
            redirect('login');
        }
    }

    public function logout() {
		
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Anda berhasil logout !</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
        $this->session->sess_destroy();
        redirect('login?alert=logout');
    }
}
