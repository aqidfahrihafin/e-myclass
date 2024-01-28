<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function index() {
		$data['title'] = 'Data Pelajaran';

        $data['content_view'] = 'admin/mapel/index';
        $this->load->view('templates/content', $data);
	}
}
