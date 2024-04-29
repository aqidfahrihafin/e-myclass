<!DOCTYPE html>
<html>

<head>
    <title>Account Activation</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <style>
    /* CSS styles go here */
    /* Example styles */
    body {
        font-family: sans-serif;
        background-color: #eef7f4;

    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 30px;
        background-color: #dfdddd;
        font-size: x-small;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.466);

    }

    h2 {
        color: #1565c0;
        text-align: center;
        margin-bottom: 30px;
    }

    small {
        color: #8b8e91;
    }

    .container1 {
        max-width: 600px;
        margin: 0 auto;
        padding: 30px;
        background-color: #ffffff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.466);
    }

    a,
    button,
    input[type=submit],
    input[type=reset] {
        display: inline-block;
        padding: 10px 20px;
        background-color: #22a4cf;
        color: #ffffff;
        text-decoration: none;
        border-radius: 3px;
    }

    a {
        text-decoration: none;
    }

    a:hover,
    button:hover,
    input[type=submit]:hover,
    input[type=reset]:hover {
        opacity: 0.9;
    }
	table {
			width: 100%;
			border-collapse: collapse;
			border-left: 1px solid #ddd;
			/* Border kiri tabel */
			border-top: 1px solid #ddd;
			/* Border kanan tabel */
			border-right: 1px solid #ddd;
			/* Border kanan tabel */
			border-bottom: 1px solid #ddd;
			/* Border kanan tabel */
		}
		td {
        padding: 5px;
        /* Padding untuk sel data */
    }

		/* Gaya untuk sel data yang berisi link */
		td a {
			color: #007bff;
			text-decoration: none;
		}

		td a:hover {
			text-decoration: underline;
		}

   
    </style>
</head>

<body>
    <div class="container1">
        <div class="card border-1">
            <div align="center">
                <img src="<?php echo base_url('public/assets/images/2.png')?>" width="120" alt="">
            </div>

            <div align="center">
                <h2>Account Activation</h2>
            </div>
            <p align="justify">
                Hi <b><?php echo $nama_dosen; ?></b>, one more step before you can use <b>E-Reward</b> LPPM Universitas Annuqayah account. <br>
            </p>
            <!-- data dosen -->
			<table>
				<tr>
					<td align="left">Nama Lengkap</td>
					<td align="right"><?php echo $nama_dosen; ?></td>
				</tr>
				<tr>
					<td align="left">NIDN</td>
					<td align="right"><?php echo $nidn; ?></td>
				</tr>
				<tr>
					<td align="left">Jenis Kelamin</td>
					<td align="right"><?php echo $jenis_kelamin; ?></td>
				</tr>
				<tr>
					<td align="left">Tempat Lahir</td>
					<td align="right"><?php echo $tempat_lahir; ?></td>
				</tr>
				<tr>
					<td align="left">Tanggal Lahir</td>
					<td align="right"><?php echo $tanggal_lahir; ?></td>
				</tr>
				<tr>
					<td align="left">Pendidikan</td>
					<td align="right"><?php echo $pendidikan; ?></td>
				</tr>
				<tr>
					<td align="left">Telp/WA</td>
					<td align="right"><?php echo $telp_dosen; ?></td>
				</tr>
			</table>
			<br>
            <small>Click the button below to verify your account!</small>
            <br>
            <br>
            <br>
            <div align="center"><a href="<?php echo base_url('home/activate/').$dosen_id?>">Activate account</a></div>
            <br>
            <br>
            <small align="justify">The account activation button is valid only once.</small>
            <p align="justify">Support by:  <strong>LPPM Universitas Annuqayah</strong>, Guluk-Guluk Sumenep Madura.
            </p>

        </div>
    </div>
    <div class="container" align="center">
        <small>You received this email as notification of important changes to your Apins Digital Account</small><br>
        <small>© Copyright
            <?php $yearNow = date('Y'); $yearNext = $yearNow + 1; $yearRange = $yearNow . ' - ' . $yearNext; echo $yearRange; ?>
            Apins' Digital
        </small>
    </div>


</body>

</html>
