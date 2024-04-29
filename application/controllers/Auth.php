<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('UsersModel');
		$this->load->model('LembagaModel');
		$this->load->model('ProdiModel');
		$this->load->model('DosenModel');
		$this->load->model('MahasiswaModel');
		$this->load->model('TahunAjaranModel');
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->data['lembaga'] = $this->LembagaModel->get_lembaga();
    }


	public function reg_mahasiswa() {
    $nim = $this->input->post('nim');
	$nim_exists = $this->MahasiswaModel->cek_nim_exist($nim);
	if ($nim_exists) {
		$this->session->set_flashdata('alert', '<div class="alert alert-danger">nim sudah terdaftar dalam database!</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('register');
		return; 
 	}

    $this->form_validation->set_rules('email', '"Email"', 'required|trim|is_unique[mahasiswa.email]', [
        'is_unique' => 'Email ini sudah terdaftar!!'
    ]);

    if ($this->form_validation->run() === FALSE) {
        $this->session->set_flashdata('gagal', '<div class="alert alert-danger font-weight-bold" align="justify"> Registration failed, please re-register.!  </div>');
        redirect('register');
    } else {
       
		$data = array(
			'mahasiswa_id' => md5(date('YmdHis') . rand(1000, 9999)),
			'no_card' => rand(1000, 9999),
			'nim' => $nim,
			'prodi_id' => $this->input->post('prodi_id'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat_mahasiswa' => $this->input->post('alamat_mahasiswa'),
			'telp_mahasiswa'  => $this->input->post('telp_mahasiswa'),
			'email'  => $this->input->post('email'),
			'photo'  => 'user.jpg',
			'tahun_ajaran_id'  => $this->input->post('tahun_ajaran_id'),
			'tanggal_masuk'  => date('Y-m-d'),
			'status'  => 'non-aktif',
		);

		$this->MahasiswaModel->insert_mahasiswa($data);

        // Kirim email aktivasi
        $EmailDataMahasiswa = array(
			'email' => $data['email'],
			'nama_mahasiswa' => $data['nama_mahasiswa'],
			'tanggal_lahir' => $data['tanggal_lahir'],
			'nim' => $data['nim'],
			'tempat_lahir' => $data['tempat_lahir'],
			'jenis_kelamin' => $data['jenis_kelamin'],
			'telp_mahasiswa' => $data['telp_mahasiswa'],
			'mahasiswa_id' => $data['mahasiswa_id']
		);	
		// Kirim email aktivasi
		$this->sendActivationEmailMahasiswa($EmailDataMahasiswa);
        // Tampilkan pesan sukses
        $this->session->set_flashdata('alert', '<div class="alert  alert-info">Registration successful. Please check your email to activate your account.! !</div>');
        $this->session->set_flashdata('alert_timeout', 8000);
        redirect('login');
    }
}

private function sendActivationEmailMahasiswa($EmailDataMahasiswa) {
	$email = $EmailDataMahasiswa['email'];
    $mahasiswa_id = $EmailDataMahasiswa['mahasiswa_id'];
    // Konfigurasi email
    $config = array(
        'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 587,
        'smtp_user' => 'info@ua.sikma.yaswar.sch.id',
        'smtp_pass' => 'Subhanallah123',
        'mailtype'  => 'html', 
        'charset'   => 'utf-8'
    );

    $this->load->library('email', $config);
    
    $this->email->set_mailtype("html");
    $this->email->set_newline("\r\n");
    $this->email->from('info@ua.sikma.yaswar.sch.id', 'Apins Digial');
    $this->email->to($email);
    $this->email->subject('Account Activation');

	$message = $this->load->view('auth/email_activation_mahasiswa', $EmailDataMahasiswa, true);
    $this->email->message($message);

    if ($this->email->send()) {
        echo "Email berhasil dikirim.";
    } else {
        echo "Email gagal dikirim.";
        echo $this->email->print_debugger(); // Untuk menampilkan pesan error jika ada
    }
}

public function activate_mahasiswa($mahasiswa_id) {
    // Cari data mahasiswa berdasarkan mahasiswa_id
    $mahasiswa_activation = $this->MahasiswaModel->getmahasiswaByActivationCode($mahasiswa_id);

    if ($mahasiswa_activation) {
        // Aktifkan akun
        $data = array('status' => 'aktif');
        $this->MahasiswaModel->update_status($mahasiswa_id, $data);

        // Set username menggunakan nim
        $username = $mahasiswa_activation['nim'];
        $role = 'mahasiswa';
        $tanggal_lahir = date('Ymd', strtotime($mahasiswa_activation['tanggal_lahir']));
        $password = password_hash($tanggal_lahir, PASSWORD_DEFAULT);

        // Cek apakah username sudah ada di tabel users
        $username_exists = $this->UsersModel->checkUsernameExists($username);
        if ($username_exists) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger" style="text-align: justify;">Aktifasi akun gagal, akun sudah terdaftar, silahkan register ulang dengan akun lain!</div>');
            $this->session->set_flashdata('alert_timeout', 10000);
			redirect('login');
        } else {
            // Simpan data ke tabel users
            $data_users = array(
                'user_id' => $mahasiswa_id,
                'username' => $username,
                'password' => $password,
                'role' => $role
            );
            $this->AuthModel->register($data_users);
            // Simpan data ke tabel users_profile
            $data_profile = array(
                'users_profile_id' => md5(date('YmdHis') . rand(1000, 9999)),
                'user_id' => $mahasiswa_id,
                'mahasiswa_id' => $mahasiswa_id,
            );
            $this->AuthModel->insert_user_profile($data_profile);

            // Tampilkan halaman aktivasi berhasil
            $this->session->set_flashdata('alert', '<div class="alert alert-info">Aktifasi akun berhasil, silahkan login!</div>');
            $this->session->set_flashdata('alert_timeout', 8000);
            redirect('login');
        }
    } else {
        // Tampilkan halaman aktivasi gagal karena data tidak ditemukan
        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Aktifasi akun gagal, data tidak ditemukan!</div>');
        $this->session->set_flashdata('alert_timeout', 8000);
        $this->load->view('login');
    }
}

}
