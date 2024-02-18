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
		foreach ($data_ajar as $result) { if ($result->kelas_id && !$isCetakButtonDisplayed) {	?>
			<h3 align="center">Jadwal Kelas <?php echo $result->kelas; ?>  <?php echo $result->jenis_kelas; ?></h3>
	<?php 	$isCetakButtonDisplayed = true; }}?>
  
    <div class="table-responsive">
        <table>
            <thead>
				<tr>
					<th width="10px">No</th>
					<th>Mata Pelajaran</th>
					<th>Nama Kelas</th>
					<th>Guru</th>
				</tr>
			</thead>

			<tbody>								
				<?php $no = 1; foreach ($data_ajar as $result) {?>							
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $result->kode_mapel; ?> - <?php echo $result->nama_mapel; ?> </td>								
						<td><?php echo $result->kelas; ?> <?php echo $result->jenis_kelas; ?></td>								
						<td><?php echo $result->nama_guru; ?></td>								
					</tr>
				<?php }?>
			</tbody>
        </table>
    </div>
    <br>

    <?php foreach ($pesantren as $result): ?>
		<div class="ttd">
			<p><?php echo $result->kabupaten; ?>, <?php echo date('d F Y'); ?></p>
			<img src="<?php echo base_url('upload/qrcode/'.$result->qrcode); ?>" alt="Tanda Tangan" width="75px">
			<p><b><?php echo $result->nama_guru; ?></b></p>
		</div>
	<?php endforeach; ?>

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
