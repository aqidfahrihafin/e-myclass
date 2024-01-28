<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function index() {
		$data['title'] = 'Data Kelas';

        $data['content_view'] = 'admin/kelas/index';
        $this->load->view('templates/content', $data);
	}
}
