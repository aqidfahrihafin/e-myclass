<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Profil</title>
    <style>
        @media print {
            body {
                font-size: 12;
                margin: 0; /* Hapus margin default body */
            }
			 h4 {
				margin-top: 0;
				margin-bottom: 0;
			}
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th {
                text-align: center;
                padding: 10px;
            }
            td {
                text-align: left;
                padding: 3px;
            }
            .ttd {
                text-align: right;
            }
            .ttd p {
                margin: 0; /* Menghilangkan margin default dari tag <p> */
            }
			 .styled-table {
				border-collapse: collapse;
				width: 100%;
			}

			.styled-table th,
			.styled-table td {
				text-align: center;
				border: 1px solid #ddd;
				padding: 3px;
			}
			
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
    <br><br>
	<h4 align="center">BIODATA MAHASISWA</h4>
	<h4 align="center">LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</h4>
	<h4 align="center">UNIVERSITAS ANNUQAYAH GULUK-GULUK SUMENEP</h4>
	<br>

	<p><b>A. Identitas Diri</b></p>
	 <div class="table-responsive">
				<table>
					<?php if ($mahasiswa) : ?>
						<table class="table table-striped table-bordered">
						<tbody>
							<tr>
								<td width="25%">NIM</td> 
								<td colspan="3">: <?php echo $mahasiswa->nim; ?></td> 
								<td rowspan="7" width="100px" style="padding: 0; text-align: center;">
									<img src="<?php echo base_url('upload/photo/'.$mahasiswa->photo); ?>" alt="Tanda Tangan" width="110px" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); border: 4px solid #fff;">
								</td>
							</tr>
							<tr>
								<td width="25%">NIK</td> 
								<td colspan="3">: <?php echo $mahasiswa->nik; ?></td> 
							</tr>
							<tr>
								<td width="25%">No KK</td> 
								<td colspan="3">: <?php echo $mahasiswa->no_kk; ?></td> 
							</tr>
							<tr>
								<td width="25%">Nama Lengkap</td> 
								<td colspan="3">: <?php echo $mahasiswa->nama_mahasiswa; ?></td> 
							</tr>
							<tr>
								<td width="25%">Tempat Tanggal Lahir</td> 
								<td colspan="3">: <?php echo $mahasiswa->tempat_lahir; ?>, <?php echo $mahasiswa->tanggal_lahir; ?></td> 
							</tr>
							<tr>
								<td width="25%">Alamat Lengkap</td> 
								<td colspan="3">: <?php echo $mahasiswa->alamat_mahasiswa; ?></td> 
							</tr>
							<tr>
								<td width="25%">Telp/WA</td> 
								<td colspan="3">: <?php echo $mahasiswa->telp_mahasiswa; ?></td> 
							</tr>
							<tr>
								<td width="25%">Email</td> 
								<td colspan="3">: <?php echo $mahasiswa->email; ?></td> 
							</tr>
						</tbody>
				</table>
				<p><b>B. Data Prodi</b></p>
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td width="25%">Angkatan</td> 
							<td colspan="3">: <?php echo $mahasiswa->nama_tahun; ?></td> 
						</tr>
						<tr>
							<td width="25%">Prodi</td> 
							<td colspan="3">: <?php echo $mahasiswa->nama_prodi; ?></td> 
						</tr>
						<tr>
							<td width="25%">Fakultas</td> 
							<td colspan="3">: <?php echo $mahasiswa->nama_fakultas; ?></td> 
						</tr>
						<tr>
							<td width="25%">Tanggal Registrasi Akun</td> 
							<td colspan="3">: <?php echo $mahasiswa->tanggal_masuk; ?></td> 
						</tr>
						<tr>
							<td width="25%">Tanggal Keluar</td> 
							<td colspan="3">: <?php echo $mahasiswa->tanggal_keluar; ?>-</td> 
						</tr>
						<tr>
							<td width="25%">Alasan Keluar</td> 
							<td colspan="3">: <?php echo $mahasiswa->alasan_keluar; ?>-</td> 
						</tr>
					</tbody>
				</table>

				<p><b>D. Prestasi</b></p>
				<table class="styled-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Jenis</th>
							<th>Tingkat</th>
							<th>Nama Prestasi</th>
							<th>Tahun</th>
							<th>penyelenggara</th>
							<th>Peringkat</th>
						</tr>
					</thead>
					<tbody>

					<?php $no = 1; $foundPrestasi = false; foreach ($prestasi as $result)  { ?>
								<?php $foundPrestasi = true; ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $result->jenis_prestasi; ?></td>
									<td align="center"><?php echo $result->nama_prestasi; ?></td>
									<td align="center"><?php echo $result->tingkat_prestasi;?></td>
									<td align="center"><?php echo $result->tahun_prestasi;?></td>
									<td align="center"><?php echo $result->penyelenggara;?></td>
									<td align="center"><?php echo $result->peringkat;?></td>
								</tr>
							<?php  }  
							if (!$foundPrestasi) {
								echo "<tr align='center'><td colspan='8'>" . $mahasiswaItem->nama_mahasiswa . " belum memiliki data prestasi</td></tr>";
						}?>
						
					</tbody>
				</table>
				
				<p><b>E. Beasiswa</b></p>
				<table class="styled-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Jenis Beasiswa</th>
							<th>Perguruan Tinggi</th>
							<th>PT/Negara Tujuan</th>
							<th>Skala</th>
							<th>Tahun Mulai</th>
							<th>Tahun Selesai</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
				
			<?php else : ?>
				<p>Data mahasiswa tidak ditemukan.</p>
			<?php endif; ?>
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
