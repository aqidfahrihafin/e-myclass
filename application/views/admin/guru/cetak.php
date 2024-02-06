<!-- application/views/admin/pembimbing/cetak.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Guru</title>
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
    <img src="<?php echo base_url('upload/kop/header.jpg'); ?>" width="600px">
    
	<h4 align="center">DATA GURU</h4>
  

	 <div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th width="10px">No</th>
					<th>Nama</th>
					<th>NIK</th>
					<th>NIY</th>
					<th>L/P</th>
					<th>TTL</th>
					<th>Pendidikan</th>
					<th>Telp/WA</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($guru as $result) {?>							
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $result['nama_guru']; ?></td>
						<td><?php echo $result['nik']; ?></td>
						<td><?php echo $result['niy']; ?></td>
						<td><?php echo $result['jenis_kelamin']; ?></td>
						<td><?php echo $result['tempat_lahir']; ?>, <?php $tanggal_lahir = $result['tanggal_lahir']; $tanggal_lahir_format = date('d-m-Y', strtotime($tanggal_lahir)); echo $tanggal_lahir_format;?></td>
						<td><?php echo $result['pendidikan']; ?></td>
						<td><?php echo $result['telp_guru']; ?></td>
						<td align="center">
							<?php echo ($result['status'] == 'aktif') ? 'success' : 'danger'; ?>"><?php echo $result['status']; ?>
						</td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>

    <br>
    <div class="ttd">
        <p>Sumenep, <?php echo date('d F Y'); ?></p>
        <img src="<?php echo base_url('upload/qrcode/signature_dosen_23.png'); ?>" alt="Tanda Tangan" width="75px">
        <p><b>Aqid Fahri Hafin, S. Kom</b></p>
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
