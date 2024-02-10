<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'third_party/qrlib/qrlib.php';

function generate_qr_code_with_logo($data, $filename, $logo_path, $size = '150x150') {
    $errorCorrectionLevel = 'H';
    $matrixPointSize = 4;

    $qrCodePath = FCPATH . 'upload/qrcode/' . $filename . '.png';

    // Generate QR code
    QRcode::png($data, $qrCodePath, $errorCorrectionLevel, $matrixPointSize, 2);

    // Load QR code image
    $qrCodeImage = imagecreatefrompng($qrCodePath);

    // Load logo image
    $logoImage = imagecreatefrompng($logo_path);

    // Get QR code image dimensions
    $qrCodeWidth = imagesx($qrCodeImage);
    $qrCodeHeight = imagesy($qrCodeImage);

    // Get logo image dimensions
    $logoWidth = imagesx($logoImage);
    $logoHeight = imagesy($logoImage);

    // Calculate logo position in the center of the QR code
    $logoX = ($qrCodeWidth - $logoWidth) / 2;
    $logoY = ($qrCodeHeight - $logoHeight) / 2;

    // Merge logo with QR code
    imagecopy($qrCodeImage, $logoImage, $logoX, $logoY, 0, 0, $logoWidth, $logoHeight);

    // Save the final QR code with logo
    $qrCodeFileName = $filename . '.png'; // Hanya menyimpan nama file QR code tanpa path
    imagepng($qrCodeImage, FCPATH . 'upload/qrcode/' . $qrCodeFileName);

    return $qrCodeFileName;
}


