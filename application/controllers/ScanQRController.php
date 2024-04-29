<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ScanQRController extends CI_Controller {

    public function index() {
        $this->load->view('scan_qr');
    }

    // Method untuk menerima data QR code dari klien
    public function terimaDataQRCode() {
        $qrData = $this->input->post('qr_data');

        // Panggil method untuk memproses data QR code
        $guruData = $this->prosesDataQRCode($qrData);

        if ($guruData) {
            // Data guru ditemukan, kirim respons JSON dengan data guru
            $response = array('status' => 'success', 'guru' => $guruData);
        } else {
            // Data guru tidak ditemukan, kirim respons JSON error
            $response = array('status' => 'error', 'message' => 'Data guru tidak ditemukan.');
        }

        // Set output sebagai JSON
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    // Method untuk memproses data QR code dan mengembalikan data guru berdasarkan QR code
    private function prosesDataQRCode($qrData) {
        // Contoh implementasi proses data QR code
        // Anda dapat mengganti ini dengan logika yang sesuai untuk aplikasi Anda
        $this->load->model('GuruModel'); // Load model GuruModel
        $guruData = $this->GuruModel->get_guru_by_qr_data($qrData); // Panggil method untuk mendapatkan data guru berdasarkan QR code

        return $guruData; // Kembalikan data guru yang ditemukan
    }
}
