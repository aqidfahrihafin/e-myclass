<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesantren extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('PesantrenModel');
    }

	public function index() {
		$data['title'] = 'Pesantren';

		$data['pesantren'] = $this->PesantrenModel->get_pesantren();
        $data['content_view'] = 'admin/profilpesantren/index';
        $this->load->view('templates/content', $data);
	}
}
