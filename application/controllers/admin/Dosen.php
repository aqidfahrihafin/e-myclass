<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Dosen extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('DosenModel');
		$this->load->model('ProdiModel');
        $this->load->model('AuthModel');
        $this->load->model('UsersModel');

			// if (!$this->session->userdata('user_id')) {
			// 	$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Maaf anda belum login !</div>');
			// 	$this->session->set_flashdata('alert_timeout', 4000);
			// 	redirect('login');
			// }
		$user_id = $this->session->userdata('user_id');
		// $user_data = 'admin'; untuk add user manual
		$user_data = $this->UsersModel->get_user_data_by_user_id($user_id);
		$this->data['user_data'] = $user_data;
    }

	public function index() {
		$this->data['title'] = 'Data Dosen';

		$this->data['dosen'] = $this->DosenModel->get_all_dosen();
		$this->data['prodi'] = $this->ProdiModel->get_data_prodi();
        $this->data['content_view'] = 'admin/dosen/index';
        $this->load->view('templates/content', $this->data);
	}

  public function simpan() {

		$nidn = $this->input->post('nidn');
		$nik = $this->input->post('nik');

		$nidn_exists = $this->DosenModel->cek_nidn_exist($nidn);
			if ($nidn_exists) {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">nidn sudah terdaftar dalam database!</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('dosen');
				return; 
			}

		$nik_exists = $this->DosenModel->cek_nik_exist($nik);
			if ($nik_exists) {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">NIK sudah terdaftar dalam database!</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('dosen');
				return; 
			}

		$data = array(
			'dosen_id' => md5(date('YmdHis') . rand(1000, 9999)),
			'no_card' => rand(1000, 9999),
			'nidn' => $nidn,
			'nik' => $nik,
			'prodi_id' => $this->input->post('prodi_id'),
			'nama_dosen' => $this->input->post('nama_dosen'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat_dosen' => $this->input->post('alamat_dosen'),
			'telp_dosen'  => $this->input->post('telp_dosen'),
			'pendidikan'  => $this->input->post('pendidikan'),
			'photo'  => 'user.jpg',
			'status' => 'non-aktif',
		);

		$this->DosenModel->insert_dosen($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('dosen');
	}

	public function importdosen() {
		$config['upload_path'] = './upload/import/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['file_name'] = 'doc' . time();
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('importexcel')) {
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::createXLSXReader();

			$reader->open('upload/import/' . $file['file_name']);
			foreach ($reader->getSheetIterator() as $sheet) {
				$numRow = 1;
				$importdosen = array();
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 1) {
						$tanggal_lahir = $row->getCellAtIndex(7)->getValue();
						if ($tanggal_lahir instanceof \DateTime) {
							$tanggal_lahir = $tanggal_lahir->format('Y-m-d');
						}

						$datadosen = array(
							'nik'  => $row->getCellAtIndex(1)->getValue(),
							'nidn'  => $row->getCellAtIndex(2)->getValue(),
							'nama_dosen'  => $row->getCellAtIndex(3)->getValue(),
							'jenis_kelamin'  => $row->getCellAtIndex(4)->getValue(),
							'pendidikan'  => $row->getCellAtIndex(5)->getValue(),
							'tempat_lahir'  => $row->getCellAtIndex(6)->getValue(),
							'tanggal_lahir'  => $tanggal_lahir,
							'telp_dosen'  => $row->getCellAtIndex(8)->getValue(),
							'alamat_dosen'  => $row->getCellAtIndex(9)->getValue(),
							'photo'  => 'user.jpg',
							'no_card' => rand(1000, 9999),
							'status' => 'non-aktif',
							'dosen_id' => md5(uniqid(rand(), true)) 
						);
						$importdosen[] = $datadosen;
					}
					$numRow++;
				}
				$reader->close();

				unlink('upload/import/' . $file['file_name']);
				// Validasi dan Import Data
				$importdosen = $this->validasiAndFilterdosen($importdosen);
				$this->DosenModel->import_data($importdosen);

				$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data dosen berhasil di import !</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('dosen');
			}
		} else {
			echo "Error: " . $this->upload->display_errors();
		}
	}

	private function validasiAndFilterdosen($importdosen){
		$filteredData = array();
		foreach ($importdosen as $data) {
			$nik = $data['nik'];
			if (!$this->DosenModel->isNikExists($nik)) {
				$filteredData[] = $data;
			}
		}
		return $filteredData;
	}


    public function update() {
        $dosen_id = $this->input->post('dosen_id');
        $data = array(
            'nidn' => $this->input->post('nidn'),
            'nik' => $this->input->post('nik'),
            'prodi_id' => $this->input->post('prodi_id'),
            'nama_dosen' => $this->input->post('nama_dosen'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_dosen' => $this->input->post('alamat_dosen'),
            'telp_dosen' => $this->input->post('telp_dosen'),
			'pendidikan'  => $this->input->post('pendidikan'),
        );

        $this->DosenModel->update_dosen($dosen_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('dosen');
    }

    public function delete($dosen_id) {		
		$has_relations = $this->DosenModel->check_active_relations($dosen_id);
	
		if ($has_relations) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger"><b>Perhatian !</b> Tidak dapat menghapus <b>dosen</b> karena ada relasi yang <b>Aktif</b>!</div>');
			$this->session->set_flashdata('alert_timeout', 6000);
		} else {
			$this->DosenModel->delete_dosen($dosen_id);
			$this->session->set_flashdata('alert', '<div class="alert alert-info">Data dosen berhasil dihapus!</div>');
			$this->session->set_flashdata('alert_timeout', 6000);
		}
		redirect('dosen');
	}

	private function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Anda berhasil logout!</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('login');
	}


	public function cetak() {
		$data['title'] = 'Cetak Data dosen';

		$this->load->model('LembagaModel');
		$data['lembaga'] = $this->LembagaModel->get_lembaga();
		$data['dosen'] = $this->DosenModel->get_all_dosen();
		$this->load->view('admin/dosen/cetak', $data);
	}

	public function reg_user() {

		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[users.username]');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Gagal aktifkan user, Username sudah aktif !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('dosen');
		} else {
			
			$dosen_id = $this->input->post('dosen_id');
			$username = $this->input->post('username');
			$role = $this->input->post('role');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data_users = array(
				'user_id' => $dosen_id,
				'username' => $username,
				'password' => $password,
				'role' => $role
			);
			$this->AuthModel->register($data_users);

			$dosen_id = $this->input->post('dosen_id');
			if ($dosen_id) {
				$data_dosen = array(
					'status' => 'aktif'
				);
				$this->DosenModel->update_status($dosen_id, $data_dosen);
			}

			$data_profile = array(
				'users_profile_id' => md5(date('YmdHis') . rand(1000, 9999)),
				'user_id' => $dosen_id,
				'dosen_id' => $dosen_id,
			);

			$this->AuthModel->insert_user_profile($data_profile);
			$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data users berhasil di aktifkan !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('dosen');
		}
	}

	public function update_status() {
		
		$dosen_id = $this->input->post('dosen_id');
		$data_dosen = array(
			'status' => 'non-aktif'
		);
		$this->DosenModel->update_status($dosen_id, $data_dosen);
		$user = $this->AuthModel->get_user_by_dosen_id($dosen_id);
		if ($user) {
			$this->AuthModel->delete_user($user->user_id);
			$this->AuthModel->delete_user_profile($user->user_id);

			$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data users berhasil di non-aktifkan !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('dosen');
		}
	}


    
}
