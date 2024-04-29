<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peringkatpublikasi extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('PeringkatPublikasiModel');

		$this->load->model('UsersModel');
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
		$this->data['title'] = 'Data Peringkat';

		$this->data['perpub'] = $this->PeringkatPublikasiModel->get_all_perpub();
        $this->data['content_view'] = 'admin/perpub/index';
        $this->load->view('templates/content', $this->data);
	}

	public function simpan() {
		$nama_peringkat = $this->input->post('nama_peringkat');
		$slug = url_title($nama_peringkat, 'dash', TRUE); 
		$angka_dan_huruf = 'e-reward-'; 
		$slug_url = $angka_dan_huruf . $slug ;

        $data = array(
            'peringkat_publikasi_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'slug_url' => $slug_url,
            'nama_kategori' => $this->input->post('nama_kategori'),
            'nama_peringkat' => $this->input->post('nama_peringkat'),
        );

        $this->PeringkatPublikasiModel->insert_perpub($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('perpub');
    }

    public function update() {
        $peringkat_publikasi_id = $this->input->post('peringkat_publikasi_id');
		$nama_peringkat = $this->input->post('nama_peringkat');
		$slug = url_title($nama_peringkat, 'dash', TRUE); 
		$angka_dan_huruf = 'e-reward-'; 
		$slug_url = $angka_dan_huruf . $slug ;

        $data = array(
			'slug_url' => $slug_url,
			'nama_kategori' => $this->input->post('nama_kategori'),
            'nama_peringkat' => $this->input->post('nama_peringkat'),
        );

        $this->PeringkatPublikasiModel->update_perpub($peringkat_publikasi_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('perpub');
    }

    public function delete() {
		$peringkat_publikasi_id = $this->input->post('peringkat_publikasi_id');
        $this->PeringkatPublikasiModel->delete_perpub($peringkat_publikasi_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('perpub');
    }

	public function cetak() {
		$data['title'] = 'Data peringkatpublikasi';

		$this->load->model('LembagaModel');
		$data['lembaga'] = $this->LembagaModel->get_lembaga();
		$data['perpub'] = $this->PeringkatPublikasiModel->get_all_perpub();
		$this->load->view('admin/peringkatpublikasi/cetak', $data);
	}
}
