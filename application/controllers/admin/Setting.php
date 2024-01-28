<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function index() {
		$data['title'] = 'Sanah Dirasah';

        $data['content_view'] = 'admin/setting/index';
        $this->load->view('templates/content', $data);
	}
}
