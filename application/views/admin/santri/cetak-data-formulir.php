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
    <img src="<?php echo base_url('upload/kop/header.jpg'); ?>" width="600px">
    <br>
	<h4 align="center">BIODATA SANTRI</h4>
	<h4 align="center">LEMBAGA PENGEMBANGAN TAHFIDZ AL-QUR'AN (LPTQ)</h4>
	<h4 align="center">PONDOK PESANTREN MATSARATUL HUDA</h4>
	<h4 align="center">PANEMPAN PAMEKASAN</h4>
  

	<p><b>A. Identitas Diri</b></p>
	 <div class="table-responsive">
				<table>
					<?php if ($santri) : ?>
						<table class="table table-striped table-bordered">
						<tbody>
							<tr>
								<td width="25%">No. Induk</td> 
								<td colspan="3">: <?php echo $santri->no_induk; ?></td> 
								<td rowspan="7" width="100px" style="padding: 0; text-align: center;">
									<img src="<?php echo base_url('upload/photo/photo.png'); ?>" alt="Tanda Tangan" width="110px" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); border: 4px solid #fff;">
								</td>
							</tr>
							<tr>
								<td width="25%">NIK</td> 
								<td colspan="3">: <?php echo $santri->nik; ?></td> 
							</tr>
							<tr>
								<td width="25%">No KK</td> 
								<td colspan="3">: <?php echo $santri->no_kk; ?></td> 
							</tr>
							<tr>
								<td width="25%">Nama Lengkap</td> 
								<td colspan="3">: <?php echo $santri->nama_santri; ?></td> 
							</tr>
							<tr>
								<td width="25%">Tempat Tanggal Lahir</td> 
								<td colspan="3">: <?php echo $santri->tempat_lahir; ?>, <?php echo $santri->tanggal_lahir; ?></td> 
							</tr>
							<tr>
								<td width="25%">Alamat Lengkap</td> 
								<td colspan="3">: <?php echo $santri->alamat_santri; ?></td> 
							</tr>
							<tr>
								<td width="25%">Telp/WA</td> 
								<td colspan="3">: <?php echo $santri->telp_santri; ?></td> 
							</tr>
							<tr>
								<td width="25%">Email</td> 
								<td colspan="3">: <?php echo $santri->email; ?></td> 
							</tr>
						</tbody>
				</table>
				<!-- tabel orang tua -->
				<p><b>B. Identitas Orang Tua/Wali</b></p>
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td width="25%">Nama Lengkap Ayah</td> 
							<td colspan="3">: <?php echo $santri->nama_ayah; ?></td> 
						</tr>
						<tr>
							<td width="25%">Alamat Lengkap</td> 
							<td colspan="3">: <?php echo $santri->alamat_ayah; ?></td> 
						</tr>
						<tr>
							<td width="25%">Pendidikan Terakhir</td> 
							<td colspan="3">: <?php echo $santri->pendidikan_ayah; ?></td> 
						</tr>
						<tr>
							<td width="25%">Pekerjaan</td> 
							<td colspan="3">: <?php echo $santri->pekerjaan_ayah; ?></td> 
						</tr>
						<tr>
							<td width="25%">Telp/WA</td> 
							<td colspan="3">: <?php echo $santri->telp_ayah; ?></td> 
						</tr>
						<tr>
							<td width="25%">Nama Lengkap Ibu</td> 
							<td colspan="3">: <?php echo $santri->nama_ibu; ?></td> 
						</tr>
						<tr>
							<td width="25%">Alamat Lengkap</td> 
							<td colspan="3">: <?php echo $santri->alamat_ibu; ?></td> 
						</tr>
						<tr>
							<td width="25%">Pendidikan Terakhir</td> 
							<td colspan="3">: <?php echo $santri->pendidikan_ibu; ?></td> 
						</tr>
						<tr>
							<td width="25%">Pekerjaan</td> 
							<td colspan="3">: <?php echo $santri->pekerjaan_ibu; ?></td> 
						</tr>
						<tr>
							<td width="25%">Telp/WA</td> 
							<td colspan="3">: <?php echo $santri->telp_ibu; ?></td> 
						</tr>
					</tbody>
				</table>
				<p><b>C. Registrasi Santri</b></p>
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td width="25%">Angkatan</td> 
							<td colspan="3">: <?php echo $santri->nama_tahun; ?></td> 
						</tr>
						<tr>
							<td width="25%">Tanggal Masuk</td> 
							<td colspan="3">: <?php echo $santri->tanggal_masuk; ?></td> 
						</tr>
						<tr>
							<td width="25%">Tanggal Keluar</td> 
							<td colspan="3">: <?php echo $santri->tanggal_keluar; ?>-</td> 
						</tr>
						<tr>
							<td width="25%">Alasan Keluar</td> 
							<td colspan="3">: <?php echo $santri->alasan_keluar; ?>-</td> 
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
						<?php if (empty($prestasi)) { ?>
							<tr>
								<td colspan="7" align="center">Belum memiliki prestasi</td>
							</tr>
						<?php } else { ?>
							<?php foreach ($prestasi as $index => $result) { ?>
								<tr>
									<td><?php echo $index + 1; ?></td>
									<td><?php echo $result->nama_prestasi; ?></td>
									<td><?php echo $result->nama_prestasi; ?></td>
									<td><?php echo $result->tingkat_prestasi; ?></td>
									<td><?php echo $result->tahun_prestasi; ?></td>
									<td><?php echo $result->penyelenggara; ?></td>
									<td><?php echo $result->peringkat; ?></td>
								</tr>
							<?php } ?>
						<?php } ?>
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
						<?php if (!empty($beasiswa)) { ?>
							<?php foreach ($beasiswa as $index => $result) { ?>
								<tr>
									<td><?php echo $index + 1; ?></td>
									<td><?php echo $result->jenis_beasiswa; ?></td>
									<td><?php echo $result->perguruan_tinggi; ?></td>
									<td><?php echo $result->negara_tujuan; ?></td>
									<td><?php echo $result->skala; ?></td>
									<td><?php echo $result->tahun_mulai; ?></td>
									<td><?php echo $result->tahun_selesai; ?></td>
								</tr>
								<?php } ?>
							<?php } else { ?>
							<tr>
								<td colspan="7">Belum menerima beasiswa</td>
							</tr>
       				  <?php } ?>
					</tbody>
				</table>
				
			<?php else : ?>
				<p>Data santri tidak ditemukan.</p>
			<?php endif; ?>
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
