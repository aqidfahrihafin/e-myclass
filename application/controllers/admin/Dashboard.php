<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('UsersModel');
        $this->load->model('MahasiswaModel');
        $this->load->model('DosenModel');
		
        if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('alert', '<div class="alert  alert-danger">Maaf anda belum login !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $user_data = $this->UsersModel->get_user_data_by_user_id($user_id);
        $this->data['user_data'] = $user_data;
    }

    public function index() {
        $this->data['title'] = 'Dashboard';
        
        $user_role = $this->data['user_data']->role; 
		$this->data['count_mahasiswa']= $this->MahasiswaModel->count_all_mahasiswa();
		$this->data['count_dosen']= $this->DosenModel->count_all_dosen();
        $this->data['content_view'] = 'admin/dashboard/'.$user_role ; 
        $this->load->view('templates/content', $this->data);
    }

}
