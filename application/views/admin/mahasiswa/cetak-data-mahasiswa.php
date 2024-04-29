<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Guru</title>
    <style>
        @media print {
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
    <img src="<?php echo base_url('upload/kop/uahitam.png'); ?>" width="200px">
    
	<h4 align="center">DATA MAHASISWA</h4>
  

	 <div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th >No</th>
					<th>Nama</th>
					<th>NIS</th>
					<th>Jenis Kelamin</th>
					<th>TTL</th>
					<th>Prodi</th>
					<th>Fakultas</th>
					<th>Tgl Registrasi</th>
					<th>Angkatan</th>
					<th>Status Akun</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($mahasiswa as $result) {
					if ($result->status_mahasiswa !== "keluar") { ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $result->nama_mahasiswa; ?></td>
							<td><?php echo $result->nim;?></td>
							<td><?php echo $result->jenis_kelamin; ?></td>
							<td><?php echo $result->tempat_lahir; ?>, <?php echo $result->tanggal_lahir; ?></td>
							<td><?php echo $result->nama_prodi; ?></td>
							<td><?php echo $result->nama_fakultas; ?></td>
							<td>
								<?php echo ($result->tahun_ajaran_id === null || $result->tahun_ajaran_id === '') ? 'Belum Registrasi' : $result->tanggal_masuk; ?>
							</td>
							<td><?php echo ($result->tahun_ajaran_id === null || $result->tahun_ajaran_id === '') ? 'Belum Registrasi' : $result->nama_tahun; ?></td>

							<td align="center">
								<?php echo $result->status_mahasiswa; ?>
							</td>
						</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>

    <br>
     
	<?php foreach ($lembaga as $result): ?>
		<div class="ttd">
			<p><?php echo $result->kabupaten; ?>, <?php echo date('d F Y'); ?></p>
			<img src="<?php echo base_url('upload/qrcode/'.$result->qrcode); ?>" alt="Tanda Tangan" width="75px">
			<p><b><?php echo $result->nama_dosen; ?></b></p>
		</div>
	<?php endforeach; ?>


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
