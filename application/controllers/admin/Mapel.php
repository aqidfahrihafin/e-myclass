<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('MapelModel');
    }

	public function index() {
		$data['title'] = 'Data Pelajaran';

		$data['mapel'] = $this->MapelModel->get_all_mapel();
        $data['content_view'] = 'admin/mapel/index';
        $this->load->view('templates/content', $data);
	}

	public function simpan() {
        $data = array(
            'mapel_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'kode_mapel' => 'MP-0'.(date('y') . rand(1000, 99)),
            'nama_mapel' => $this->input->post('nama_mapel'),
        );

        $this->MapelModel->insert_mapel($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('mapel');
    }

    public function update() {
        $mapel_id = $this->input->post('mapel_id');
        $data = array(
            'nama_mapel' => $this->input->post('nama_mapel'),
        );

        $this->MapelModel->update_mapel($mapel_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('mapel');
    }

    public function delete($mapel_id) {
        $this->MapelModel->delete_mapel($mapel_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('mapel');
    }

	public function cetak() {
		$data['title'] = 'Data Matapelajaran';

		$data['mapel'] = $this->MapelModel->get_all_mapel();
		$this->load->view('admin/mapel/cetak', $data);
	}
}
