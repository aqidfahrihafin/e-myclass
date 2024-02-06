<!-- application/views/admin/pembimbing/cetak.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pembimbing</title>
    <style>
        /* Tambahkan gaya cetak di sini */
        @media print {
            /* Contoh gaya, sesuaikan sesuai kebutuhan */
            body {
                font-size: 12;
                margin: 0; /* Hapus margin default body */
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th {
                border: 1px solid #ddd;
                text-align: center;
                padding: 10px;
            }
            td {
                border: 1px solid #ddd;
                padding: 5px;
            }
            .ttd {
                text-align: right;
            }
            .ttd p {
                margin: 0; /* Menghilangkan margin default dari tag <p> */
            }
            /* Letakkan footer di paling bawah halaman */
            #footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: #fff; /* Ganti warna sesuai kebutuhan */
                text-align: center;
            }
        }
    </style>
</head>
<body> 
    <img src="<?php echo base_url('upload/kop/header.jpg'); ?>"  width="600px">
    
	<?php $isCetakButtonDisplayed = false; 
		foreach ($guru as $result) { if ($result->tahun_ajaran_id && !$isCetakButtonDisplayed) {	?>
			<h4 align="center">DATA GURU PEMBIMBING  <?php echo $result->nama_tahun; ?></h4>
	<?php 	$isCetakButtonDisplayed = true; }}?>
  
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th width="10px">No</th>
                    <th>Kode Kelas</th>
                    <th>Nama Kelas</th>
                    <th width="40px">Target Kelas/Semester</th>
                    <th>Sanah Dirasah</th>
                    <th>Pembimbing</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($guru as $result) { ?>                            
                    <tr>
                        <td align="center"><?php echo $no++; ?>.</td>
                        <td align="center"><?php echo $result->kode_kelas; ?></td>
                        <td align="center"><?php echo $result->kelas; ?>-<?php echo $result->jenis_kelas; ?></td>
                        <td align="center">
                                <?php echo $result->target_kelas; ?>
                        </td>
                        <td align="center">
                                <?php echo $result->nama_tahun; ?>
                        </td>
                        <td><?php echo $result->nama_guru; ?></td>                                      
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <br>
    <div class="ttd">
        <p>Sumenep, <?php echo date('d F Y'); ?></p>
        <!-- Ganti dengan gambar tanda tangan yang sesuai -->
        <img src="<?php echo base_url('upload/qrcode/signature_dosen_23.png'); ?>" alt="Tanda Tangan" width="75px">
        <p><b>Aqid Fahri Hafin, S. Kom</b></p>
    </div>
    <!-- Footer -->
    <div id="footer">
        <img src="<?php echo base_url('upload/kop/footer.jpg'); ?>" width="100%">
    </div>
    <script>
        // Jalankan fungsi cetak secara otomatis saat halaman dimuat
        window.onload = function () {
            window.print();
            // Setelah mencetak, kembali ke halaman sebelumnya
            window.onafterprint = function () {
                window.history.back();
            };
        };
    </script>
</body>
</html>
