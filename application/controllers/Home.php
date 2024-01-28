<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$data['title'] = 'Home Page';

        $this->load->view('auth/home', $data);
	}

	public function login() {
		$data['title'] = 'Halaman Login';

        $this->load->view('auth/login', $data);
	}

	public function lupapw() {
		$data['title'] = 'Halaman Lupa Password';

        $this->load->view('auth/lupa-pw', $data);
	}
}
