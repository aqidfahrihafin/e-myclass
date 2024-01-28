<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function index() {
		$data['title'] = 'Data Santri';

        $data['content_view'] = 'admin/santri/index';
        $this->load->view('templates/content', $data);
	}
}
