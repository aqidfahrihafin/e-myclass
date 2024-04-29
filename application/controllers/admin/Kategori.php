<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('KategoriModel');

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
		$this->data['title'] = 'Data Kategori';

		$this->data['kategori'] = $this->KategoriModel->get_all_kategori();
        $this->data['content_view'] = 'admin/kategori/index';
        $this->load->view('templates/content', $this->data);
	}

	public function simpan() {
		$jenis_kategori_bpi = $this->input->post('jenis_kategori_bpi');
		$slug = url_title($jenis_kategori_bpi, 'dash', TRUE); 
		$angka_dan_huruf = 'e-reward-'; 
		$slug_url = $angka_dan_huruf . $slug ;

        $data = array(
            'kategori_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'slug_url' => $slug_url,
            'nama_kategori' => $this->input->post('nama_kategori'),
            'jenis_kategori_bpi' => $this->input->post('jenis_kategori_bpi'),
        );

        $this->KategoriModel->insert_kategori($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('kategori');
    }

    public function update() {
        $kategori_id = $this->input->post('kategori_id');
		$jenis_kategori_bpi = $this->input->post('jenis_kategori_bpi');
		$slug = url_title($jenis_kategori_bpi, 'dash', TRUE); 
		$angka_dan_huruf = 'e-reward-'; 
		$slug_url = $angka_dan_huruf . $slug ;
        $data = array(
            'slug_url' => $slug_url,
            'nama_kategori' => $this->input->post('nama_kategori'),
            'jenis_kategori_bpi' => $this->input->post('jenis_kategori_bpi'),
        );

        $this->KategoriModel->update_kategori($kategori_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('kategori');
    }

    public function delete() {
		$kategori_id = $this->input->post('kategori_id');
        $this->KategoriModel->delete_kategori($kategori_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('kategori');
    }

	public function cetak() {
		$data['title'] = 'Data kategori';

		$this->load->model('LembagaModel');
		$data['lembaga'] = $this->LembagaModel->get_lembaga();
		$data['kategori'] = $this->KategoriModel->get_all_kategori();
		$this->load->view('admin/kategori/cetak', $data);
	}
}
