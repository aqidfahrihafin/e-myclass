<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga extends CI_Controller {

	public function __construct() {
        parent::__construct();
	
		$this->load->model('UsersModel');
		$this->load->model('DosenModel');
		$this->load->model('LembagaModel');

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
		$this->data['title'] = 'Lembaga';
		$this->data['dosen'] = $this->DosenModel->get_all_dosen();
		$this->data['lembaga'] = $this->LembagaModel->get_lembaga();
        $this->data['content_view'] = 'admin/profillembaga/index';
        $this->load->view('templates/content', $this->data);
	}

    public function update_lembaga() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lembaga_id = $this->input->post('lembaga_id');
            $data = array(
                'nama_lembaga' => $this->input->post('nama_lembaga'),
                'nsm' => $this->input->post('nsm'),
                'npsm' => $this->input->post('npsm'),
                'alamat' => $this->input->post('alamat'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kabupaten' => $this->input->post('kabupaten'),
                'provinsi' => $this->input->post('provinsi'),
                'dosen_id' => $this->input->post('dosen_id'),
            );

            if (!empty($_FILES['logo']['name'])) {
                $this->load->library('upload');

                $config['upload_path']   = './upload/logo/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']      = 2048; // 2 MB
                $config['encrypt_name']  = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('logo')) {
                    $data['logo'] = $this->upload->data('file_name');
                    $old_logo_filename = $this->LembagaModel->get_logo_filename($lembaga_id);
                    $old_logo_path = './upload/logo/' . $old_logo_filename;

                    if (file_exists($old_logo_path)) {
                        unlink($old_logo_path);
                    }
                } else {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">Data gagal update!</div>');
                    $this->session->set_flashdata('alert_timeout', 4000);
                    redirect('lembaga');
                }
            } else {
                $data['logo'] = $this->LembagaModel->get_logo_filename($lembaga_id);
            }

            $this->LembagaModel->update_lembaga($lembaga_id, $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil update!</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
            redirect('lembaga');
        }
    }

}
