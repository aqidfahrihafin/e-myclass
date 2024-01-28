<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesantren extends CI_Controller {

	public function index() {
		$data['title'] = 'Pesantren';

        $data['content_view'] = 'admin/profilpesantren/index';
        $this->load->view('templates/content', $data);
	}
}
