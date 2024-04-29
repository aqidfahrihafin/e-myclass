<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Guru dan Kamera</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        #kamera-container {
            text-align: center;
            margin-bottom: 20px;
        }
        #qr-video {
            width: 100%;
            max-width: 400px;
            height: auto;
        }
        #info-guru {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="kamera-container">
            <h1>Kamera</h1>
            <video id="qr-video" autoplay></video>
        </div>
        <div id="info-guru">
            <h1>Informasi Guru</h1>
            <!-- Informasi guru akan ditampilkan oleh JavaScript -->
        </div>
    </div>

    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript untuk membuka kamera, membaca QR code, dan menampilkan informasi guru -->
    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.min.js"></script>
    <script>
        $(document).ready(function() {
            // Akses kamera dan tampilkan video
            const video = document.getElementById('qr-video');
            navigator.mediaDevices.getUserMedia({ video: true })
                .then((stream) => {
                    video.srcObject = stream;

                    video.addEventListener('loadedmetadata', () => {
                        const canvas = document.createElement('canvas');
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        const context = canvas.getContext('2d');

                        setInterval(() => {
                            context.drawImage(video, 0, 0, canvas.width, canvas.height);
                            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                            const code = jsQR(imageData.data, imageData.width, imageData.height);
                            if (code) {
                                console.log('QR Code detected:', code.data);
                                // Kirim data QR code ke server menggunakan AJAX
                                kirimDataQRCode(code.data);
                            }
                        }, 1000);
                    });
                })
                .catch((error) => {
                    console.error('Error accessing camera:', error);
                });

            // Kirim data QR code ke server menggunakan AJAX
            function kirimDataQRCode(qrData) {
                $.ajax({
                    url: '<?php echo site_url("ScanQRController/terimaDataQRCode"); ?>',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ qr_data: qrData }),
                    success: function(response) {
                        if (response.status === 'success') {
                            // Tampilkan informasi guru yang diterima dari server
                            const guruData = response.guru;
                            const infoGuru = `
                                <h2>${guruData.nama}</h2>
                                <p>NIP: ${guruData.nip}</p>
                                <p>Alamat: ${guruData.alamat}</p>
                                <p>Email: ${guruData.email}</p>
                            `;
                            $('#info-guru').html(infoGuru);
                        } else {
                            // Tampilkan pesan error jika data guru tidak ditemukan
                            const errorMessage = `<div class="alert alert-danger">${response.message}</div>`;
                            $('#info-guru').html(errorMessage);
                            // Tampilkan alert jika data guru tidak ditemukan
                            alert('Data guru tidak ditemukan.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // Tampilkan pesan error jika terjadi kesalahan saat mengambil data dari server
                        const errorMessage = `<div class="alert alert-danger">Terjadi kesalahan saat mengambil data.</div>`;
                        $('#info-guru').html(errorMessage);
                    }
                });
            }
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Guru dan Kamera</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        #kamera-container {
            text-align: center;
            margin-bottom: 20px;
        }
        #qr-video {
            width: 100%;
            max-width: 400px;
            height: auto;
        }
        #info-guru {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="kamera-container">
            <h1>Kamera</h1>
            <video id="qr-video" autoplay></video>
        </div>
        <div id="info-guru">
            <h1>Informasi Guru</h1>
            <!-- Informasi guru akan ditampilkan oleh JavaScript -->
        </div>
    </div>

    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript untuk membuka kamera, membaca QR code, dan menampilkan informasi guru -->
    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.min.js"></script>
    <script>
        $(document).ready(function() {
            // Akses kamera dan tampilkan video
            const video = document.getElementById('qr-video');
            navigator.mediaDevices.getUserMedia({ video: true })
                .then((stream) => {
                    video.srcObject = stream;

                    video.addEventListener('loadedmetadata', () => {
                        const canvas = document.createElement('canvas');
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        const context = canvas.getContext('2d');

                        setInterval(() => {
                            context.drawImage(video, 0, 0, canvas.width, canvas.height);
                            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                            const code = jsQR(imageData.data, imageData.width, imageData.height);
                            if (code) {
                                console.log('QR Code detected:', code.data);
                                // Kirim data QR code ke server menggunakan AJAX
                                kirimDataQRCode(code.data);
                            }
                        }, 1000);
                    });
                })
                .catch((error) => {
                    console.error('Error accessing camera:', error);
                });

            // Kirim data QR code ke server menggunakan AJAX
            function kirimDataQRCode(qrData) {
                $.ajax({
                    url: '<?php echo site_url("ScanQRController/terimaDataQRCode"); ?>',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ qr_data: qrData }),
                    success: function(response) {
                        if (response.status === 'success') {
                            // Tampilkan informasi guru yang diterima dari server
                            const guruData = response.guru;
                            const infoGuru = `
                                <h2>${guruData.nama}</h2>
                                <p>NIP: ${guruData.nip}</p>
                                <p>Alamat: ${guruData.alamat}</p>
                                <p>Email: ${guruData.email}</p>
                            `;
                            $('#info-guru').html(infoGuru);
                        } else {
                            // Tampilkan pesan error jika data guru tidak ditemukan
                            const errorMessage = `<div class="alert alert-danger">${response.message}</div>`;
                            $('#info-guru').html(errorMessage);
                            // Tampilkan alert jika data guru tidak ditemukan
                            alert('Data guru tidak ditemukan.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // Tampilkan pesan error jika terjadi kesalahan saat mengambil data dari server
                        const errorMessage = `<div class="alert alert-danger">Terjadi kesalahan saat mengambil data.</div>`;
                        $('#info-guru').html(errorMessage);
                    }
                });
            }
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Guru dan Kamera</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        #kamera-container {
            text-align: center;
            margin-bottom: 20px;
        }
        #qr-video {
            width: 100%;
            max-width: 400px;
            height: auto;
        }
        #info-guru {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="kamera-container">
            <h1>Kamera</h1>
            <video id="qr-video" autoplay></video>
        </div>
        <div id="info-guru">
            <h1>Informasi Guru</h1>
            <!-- Informasi guru akan ditampilkan oleh JavaScript -->
        </div>
    </div>

    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript untuk membuka kamera, membaca QR code, dan menampilkan informasi guru -->
    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.min.js"></script>
    <script>
        $(document).ready(function() {
            // Akses kamera dan tampilkan video
            const video = document.getElementById('qr-video');
            navigator.mediaDevices.getUserMedia({ video: true })
                .then((stream) => {
                    video.srcObject = stream;

                    video.addEventListener('loadedmetadata', () => {
                        const canvas = document.createElement('canvas');
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        const context = canvas.getContext('2d');

                        setInterval(() => {
                            context.drawImage(video, 0, 0, canvas.width, canvas.height);
                            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                            const code = jsQR(imageData.data, imageData.width, imageData.height);
                            if (code) {
                                console.log('QR Code detected:', code.data);
                                // Kirim data QR code ke server menggunakan AJAX
                                kirimDataQRCode(code.data);
                            }
                        }, 1000);
                    });
                })
                .catch((error) => {
                    console.error('Error accessing camera:', error);
                });

            // Kirim data QR code ke server menggunakan AJAX
           // Kirim data QR code ke server menggunakan AJAX
function kirimDataQRCode(qrData) {
    $.ajax({
        url: '<?php echo site_url("ScanQRController/terimaDataQRCode"); ?>',
        type: 'POST',
        data: { nik: qrData }, // Menggunakan properti yang sesuai dengan data yang ingin dikirimkan
        success: function(response) {
            if (response.status === 'success') {
                // Tampilkan informasi guru yang diterima dari server
                const guruData = response.guru;
                const infoGuru = `
                    <h2>${guruData.nama}</h2>
                    <p>NIP: ${guruData.ni}</p>
                    <p>Alamat: ${guruData.alamat}</p>
                    <p>Email: ${guruData.email}</p>
                `;
                $('#info-guru').html(infoGuru);
            } else {
                // Tampilkan pesan error jika data guru tidak ditemukan
                const errorMessage = `<div class="alert alert-danger">${response.message}</div>`;
                $('#info-guru').html(errorMessage);
                // Tampilkan alert jika data guru tidak ditemukan
                alert('Data guru tidak ditemukan.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            // Tampilkan pesan error jika terjadi kesalahan saat mengambil data dari server
            const errorMessage = `<div class="alert alert-danger">Terjadi kesalahan saat mengambil data.</div>`;
            $('#info-guru').html(errorMessage);
        }
    });
}

        });
    </script>
</body>
</html>
