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

	public function update_pesantren() {
        // Ambil data dari form
        $pesantren_id = $this->input->post('pesantren_id');
        $nama_lembaga = $this->input->post('nama_lembaga');
        $nsm = $this->input->post('nsm');
        $npsm = $this->input->post('npsm');
        $alamat = $this->input->post('alamat');
        $kecamatan = $this->input->post('kecamatan');
        $kabupaten = $this->input->post('kabupaten');
        $provinsi = $this->input->post('provinsi');
        $pimpinan = $this->input->post('pimpinan');
        $nip = $this->input->post('nip');

        // Proses upload logo baru
        $logo_path = $this->upload_logo();

        // Simpan data ke dalam array
        $data = array(
            'nama_lembaga' => $nama_lembaga,
            'nsm' => $nsm,
            'npsm' => $npsm,
            'alamat' => $alamat,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi,
            'logo' => $logo_path,
            'pimpinan' => $pimpinan,
            'nip' => $nip
        );

        // Panggil model untuk melakukan update
        $this->Pesantren_model->update_pesantren($pesantren_id, $data);

        // Redirect atau tampilkan pesan sukses
        redirect('pesantren');
    }

    private function upload_logo() {
        // Konfigurasi upload
        $config['upload_path']   = './upload/logo/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = 2048; // 2 MB
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            // Jika upload berhasil, return path logo yang diupload
            return 'upload/logo/' . $this->upload->data('file_name');
        } else {
            // Jika upload gagal, tampilkan pesan error
            return $this->upload->display_errors();
        }
    }
}
