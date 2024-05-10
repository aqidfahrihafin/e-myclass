<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('MateriModel');
        $this->load->model('DiskusiMateriModel');
        $this->load->model('MataKuliahModel');
        $this->load->model('LembagaModel');
        $this->load->model('UsersModel');
        $this->load->model('KelasModel');
		$this->data['lembaga'] = $this->LembagaModel->get_lembaga();

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
		$this->data['title'] = 'Mata Kuliah';

		$this->data['kelas'] = $this->KelasModel->get_all_kelas();
		$this->data['materi'] = $this->MateriModel->get_all_materi();
        $this->data['content_view'] = 'admin/materi/index';
        $this->load->view('templates/content', $this->data);
	}

	public function listmateri($matakuliah_id) {
		$this->data['title'] = 'List Materi';
		$this->session->set_userdata('matakuliah_id', $matakuliah_id);
        $this->data['materi'] = $this->MateriModel->get_materi_by_matakuliah($matakuliah_id);
        $this->data['content_view'] = 'admin/materi/listmateri';
        $this->load->view('templates/content', $this->data);
    }
	
	public function detailmateri($materi_id) {
		$this->data['title'] = 'Detail Materi';
		$this->session->set_userdata('materi_id', $materi_id);
		$this->data['logged_in_user_id']= $this->session->userdata('user_id');
		$this->data['diskusi'] = $this->DiskusiMateriModel->get_diskusi_by_materi_id($materi_id);
        $this->data['materi'] = $this->MateriModel->get_materi_by_id($materi_id);
        $this->data['content_view'] = 'admin/materi/detailmateri';
        $this->load->view('templates/content', $this->data);
    }

	public function viewmateri($materi_id) {
		$this->data['title'] = 'Detail Materi';
		$this->session->set_userdata('materi_id', $materi_id);
		$this->data['materi'] = $this->MateriModel->view_materi_by_id($materi_id);
		
		if ($this->data['materi']) {
			$this->data['pdf_url'] = base_url('upload/dokumen/' . $this->data['materi']->dokumen);
		} else {
			$this->data['pdf_url'] = '';
		}
	
		$this->load->view('admin/materi/viewmateri', $this->data);
	}
	

	public function view_pdf() {
		$this->load->view('pdf_viewer', ['pdf_url' => $pdf_url]);
	}
	

	public function addmateri() {
		// Konfigurasi upload file
		$config['upload_path'] = './upload/dokumen/';
		$config['allowed_types'] = 'pdf|doc|docx'; // Jenis file yang diperbolehkan
		$config['max_size'] = 10240; // Maksimal ukuran file dalam KB (10MB)
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload('dokumen')) {
			// Upload gagal, tampilkan pesan error
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$error.'</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
			redirect('makul');
		} else {
			// Upload berhasil, ambil data dari form
			$upload_data = $this->upload->data();
			$data = array(
				'materi_id' => md5(date('YmdHis') . rand(1000, 9999)),
				'matakuliah_id' => $this->input->post('matakuliah_id'),
				'kelas_id' => $this->input->post('kelas_id'),
				'judul_materi' => $this->input->post('judul_materi'),
				'dokumen' => $upload_data['file_name'],
				'isi_materi' => $this->input->post('isi_materi'),
				'tanggal_upload' => date('Y-m-d H:i:s'),
			);
	
			// Panggil model untuk menyimpan data materi
			$this->MateriModel->insert_materi($data);
			$this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil ditambahkan!</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
			redirect('makul');
		}
	}
	

	public function update() {
		$matakuliah_id = $this->session->userdata('matakuliah_id');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $materi_id = $this->input->post('materi_id');
            $data = array(
                'judul_materi' => $this->input->post('judul_materi'),
				'isi_materi' => $this->input->post('isi_materi'),
				'dokumen' => $this->input->post('dokumen'),
            );

            if (!empty($_FILES['dokumen']['name'])) {
                $this->load->library('upload');

                $config['upload_path']   = './upload/dokumen/';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['max_size']      = 2048; // 2 MB
                $config['encrypt_name']  = TRUE;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('dokumen')) {
                    $data['dokumen'] = $this->upload->data('file_name');
                    $old_dokumen_filename = $this->MateriModel->get_dokumen_filename($materi_id);
                    $old_dokumen_path = './upload/dokumen/' . $old_dokumen_filename;

                    if (file_exists($old_dokumen_path)) {
                        unlink($old_dokumen_path);
                    }
                } else {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">Data gagal update!</div>');
                    $this->session->set_flashdata('alert_timeout', 4000);
                    redirect('listmateri/'.$matakuliah_id);
                }
            } else {
                $data['dokumen'] = $this->MateriModel->get_dokumen_filename($materi_id);
            }

            $this->MateriModel->update_materi($materi_id, $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil update!</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
            redirect('listmateri/'.$matakuliah_id);
        }
    }


	public function delete() {

		$matakuliah_id = $this->session->userdata('matakuliah_id');
		$materi_id = $this->input->post('materi_id');
		$materi = $this->MateriModel->materi_by_id($materi_id);	
		if ($materi) {
			$file_path = './upload/dokumen/' . $materi->dokumen;
			if (is_file($file_path)) {
				if (unlink($file_path)) {
					$this->MateriModel->delete_materi($materi_id);
					$this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus!</div>');
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger">Gagal menghapus file!</div>');
				}
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">File tidak ditemukan!</div>');
			}
		} else {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">Data tidak ditemukan!</div>');
		}
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('listmateri/' . $matakuliah_id);
	}
		
}
