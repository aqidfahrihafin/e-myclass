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
                text-align: center;
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
    
	<h4 align="center">DATA MATAPELAJAR </h4>
  
    <div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th width="10px">No</th>
					<th>Kode Mapel</th>
					<th>Nama Mapel</th>
				</tr>
			</thead>
			<tbody>
			<?php $no = 1; foreach ($mapel as $result) {?>		
				<tr>
					<td><?php echo $no++; ?>.</td>
					<td><?php echo $result->kode_mapel; ?></td>
					<td><?php echo $result->nama_mapel; ?></td>
				</tr>
			<?php }?>
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
        window.onload = function () {
            window.print();
            window.onafterprint = function () {
                window.history.back();
            };
        };
    </script>
</body>
</html>
