<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index() {
		$data['title'] = 'Dashboard';

        $data['content_view'] = 'admin/dashboard/index';
        $this->load->view('templates/content', $data);
	}
}
