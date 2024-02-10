<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Guru extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('GuruModel');
        $this->load->model('AuthModel');
        $this->load->model('UsersModel');
    }

	public function index() {
		$data['title'] = 'Data Guru';

		$data['guru'] = $this->GuruModel->get_all_guru();
        $data['content_view'] = 'admin/guru/index';
        $this->load->view('templates/content', $data);
	}

  public function simpan() {

		$niy = $this->input->post('niy');
		$nik = $this->input->post('nik');

		$niy_exists = $this->GuruModel->cek_niy_exist($niy);
			if ($niy_exists) {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">NIY sudah terdaftar dalam database!</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('guru');
				return; 
			}

		$nik_exists = $this->GuruModel->cek_nik_exist($nik);
			if ($nik_exists) {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">NIK sudah terdaftar dalam database!</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('guru');
				return; 
			}

		$data = array(
			'guru_id' => md5(date('YmdHis') . rand(1000, 9999)),
			'niy' => $niy,
			'nik' => $nik,
			'nama_guru' => $this->input->post('nama_guru'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat_guru' => $this->input->post('alamat_guru'),
			'telp_guru'  => $this->input->post('telp_guru'),
			'pendidikan'  => $this->input->post('pendidikan'),
			'photo'  => 'user.png',
			'status' => 'non-aktif',
		);

		$this->GuruModel->insert_guru($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan !</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('guru');
	}

	public function importguru() {
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
				$importguru = array();
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 1) {
						$tanggal_lahir = $row->getCellAtIndex(7)->getValue();
						if ($tanggal_lahir instanceof \DateTime) {
							$tanggal_lahir = $tanggal_lahir->format('Y-m-d');
						}

						$dataguru = array(
							'nik'  => $row->getCellAtIndex(1)->getValue(),
							'niy'  => $row->getCellAtIndex(2)->getValue(),
							'nama_guru'  => $row->getCellAtIndex(3)->getValue(),
							'jenis_kelamin'  => $row->getCellAtIndex(4)->getValue(),
							'pendidikan'  => $row->getCellAtIndex(5)->getValue(),
							'tempat_lahir'  => $row->getCellAtIndex(6)->getValue(),
							'tanggal_lahir'  => $tanggal_lahir,
							'telp_guru'  => $row->getCellAtIndex(8)->getValue(),
							'alamat_guru'  => $row->getCellAtIndex(9)->getValue(),
							'photo'  => 'user.png',
							'status' => 'non-aktif',
							'guru_id' => md5(uniqid(rand(), true)) 
						);
						$importguru[] = $dataguru;
					}
					$numRow++;
				}
				$reader->close();

				unlink('upload/import/' . $file['file_name']);
				// Validasi dan Import Data
				$importguru = $this->validasiAndFilterGuru($importguru);
				$this->GuruModel->import_data($importguru);

				$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data guru berhasil di import !</div>');
				$this->session->set_flashdata('alert_timeout', 4000);
				redirect('guru');
			}
		} else {
			echo "Error: " . $this->upload->display_errors();
		}
	}

	private function validasiAndFilterGuru($importguru){
		$filteredData = array();
		foreach ($importguru as $data) {
			$nik = $data['nik'];
			if (!$this->GuruModel->isNikExists($nik)) {
				$filteredData[] = $data;
			}
		}
		return $filteredData;
	}


    public function update() {
        $guru_id = $this->input->post('guru_id');
        $data = array(
            'niy' => $this->input->post('niy'),
            'nik' => $this->input->post('nik'),
            'nama_guru' => $this->input->post('nama_guru'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat_guru' => $this->input->post('alamat_guru'),
            'telp_guru' => $this->input->post('telp_guru'),
			'pendidikan'  => $this->input->post('pendidikan'),
        );

        $this->GuruModel->update_guru($guru_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('guru');
    }

    public function delete($guru_id) {		
		$this->GuruModel->delete_guru($guru_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil dihapus!</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('guru');
	}

	private function logout() {
		$this->session->sess_destroy();
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Anda berhasil logout!</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('login');
	}


	public function cetak() {
		$data['title'] = 'Cetak Data Guru';

		$data['guru'] = $this->GuruModel->get_all_guru();
		$this->load->view('admin/guru/cetak', $data);
	}

	public function reg_user() {

		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[users.username]');

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Gagal aktifkan user, Username sudah aktif !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('guru');
		} else {
			
			$guru_id = $this->input->post('guru_id');
			$username = $this->input->post('username');
			$role = $this->input->post('role');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data_users = array(
				'user_id' => $guru_id,
				'username' => $username,
				'password' => $password,
				'role' => $role
			);
			$this->AuthModel->register($data_users);

			$guru_id = $this->input->post('guru_id');
			if ($guru_id) {
				$data_guru = array(
					'status' => 'aktif'
				);
				$this->GuruModel->update_status($guru_id, $data_guru);
			}

			$data_profile = array(
				'users_profile_id' => md5(date('YmdHis') . rand(1000, 9999)),
				'user_id' => $guru_id,
				'guru_id' => $guru_id,
			);

			$this->AuthModel->insert_user_profile($data_profile);
			$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data users berhasil di aktifkan !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('guru');
		}
	}

	public function update_status() {
		
		$guru_id = $this->input->post('guru_id');
		$data_guru = array(
			'status' => 'non-aktif'
		);
		$this->GuruModel->update_status($guru_id, $data_guru);
		$user = $this->AuthModel->get_user_by_guru_id($guru_id);
		if ($user) {
			$this->AuthModel->delete_user($user->user_id);
			$this->AuthModel->delete_user_profile($user->user_id);

			$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data users berhasil di non-aktifkan !</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
			redirect('guru');
		}
	}


    
}
