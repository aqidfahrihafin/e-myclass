<!-- application/views/admin/pembimbing/cetak.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pengguna</title>
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
	<img src="<?php echo base_url('upload/kop/uahitam.png'); ?>" width="200px">		
    
	<h4 align="center">DATA USERS E-RAPORT </h4>
  
    <div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th width="10px">No</th>
					<th>Nama Guru</th>
					<th>Username</th>
					<th>Password</th>
					<th>Role</th>
					<th>Tanggal Dibuat</th>
				</tr>
			</thead>
			<tbody>
			<?php $no = 1; foreach ($users_profiles as $result): ?>
				<?php if ($result->role !== 'admin' && $result->role !== 'wali'): ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $result->nama_users; ?></td>
						<td><?php echo $result->username; ?></td>
						<td><?php echo str_replace('-', '', $result->password); ?></td>
						<td><?php echo $result->role; ?></td>
						<td><?php echo $result->create_at; ?></td>
					</tr>
				<?php endif; ?>
			<?php endforeach; ?>
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
