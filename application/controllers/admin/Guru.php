<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function index() {
		$data['title'] = 'Data Guru';

        $data['content_view'] = 'admin/guru/index';
        $this->load->view('templates/content', $data);
	}
}
