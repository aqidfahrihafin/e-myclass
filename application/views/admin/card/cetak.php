<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Card Reward</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600;700&display=swap');

	body, html {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 85.6mm; /* Sesuaikan dengan lebar kartu ATM dalam mm */
      height: 53.98mm; /* Sesuaikan dengan tinggi kartu ATM dalam mm */
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Josefin Sans', sans-serif;
    }

    .cardd {
      width: 85.6mm; /* Sesuaikan dengan lebar kartu ATM dalam mm */
      height: 53.98mm; /* Sesuaikan dengan tinggi kartu ATM dalam mm */
      color: #fff;
      cursor: pointer;
      perspective: 1000px;
    }

    .card-inner {
      width: 100%;
      height: 100%;
      position: relative;
      transition: transform 1s;
      transform-style: preserve-3d;
    }

    .front, .back {
      width: 100%;
      height: 100%;
      background-image: linear-gradient(45deg, #1552fa,  #eeb108);
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px 20px;
      border-radius: 15px;
      overflow: hidden;
      z-index: 1;
      backface-visibility: hidden;
    }

    .row {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .map-img {
      width: 100%;
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0.3;
      z-index: -1;
    }

    .card-no {
      font-size: 22px;
      margin-top: 48px;
    }

    .card-holder {
      font-size: 10px;
      margin-top: 28px;
    }

    .name {
      font-size: 12px;
      margin-top: 14px;
    }

    .bar {
      background: #222;
      margin-left: -30px;
      margin-right: -30px;
      height: 35px;
      margin-top: 18px;
    }

    .card-cvv {
      margin-top: 18px;
    }

    .card-cvv div {
      flex: 1;
    }

    .card-cvv img {
      width: 100%;
      display: block;
      line-height: 0;
    }

    .card-cvv p {
      background: #fff;
      color: #000;
      font-size: 12px;
      padding: 10px 20px;
    }

    .card-text {
      margin-top: 22px;
      font-size: 10px;
    }

    .signature {
      margin-top: 20px;
      font-size: 12px;
    }

    @media print {
      /* CSS untuk gaya saat mencetak */
      body {
        background-color: transparent !important;
      }

	  .cardd {
		width: 85.6mm; /* Sesuaikan dengan lebar kartu ATM dalam mm */
		height: 53.98mm; /* Sesuaikan dengan tinggi kartu ATM dalam mm */
		color: #fff;
		cursor: pointer;
		perspective: 1000px;
		}

      .front, .back {
		width: 100%;
		height: 100%;
		background-image: linear-gradient(45deg, #1552fa,  #eeb108);
		position: absolute;
		top: 0;
		left: 0;
		padding: 10px 20px;
		border-radius: 15px;
		overflow: hidden;
		z-index: 1;
		backface-visibility: hidden;
      }
    }
  </style>
</head>
<body >

<div class="row" >
	<div class="col-xl-12">
	  <div class="card">
            <div class="card-body">
						<div class="table-responsive">
				<div class="cardd">
					<div class="card-inner">
						<div class="front">
								<img src="<?php echo base_url('public/card/map.png');?>" class="map-img">
								<div class="row">
									<img src="" width="60px">
									<img src="<?php echo base_url('public/card/ua.png');?>" width="40px">
								</div>
								<?php if ($user_data->user_type == 'dosen'): ?>
									<div class="row card-no">
									<?php
										$angka = $user_data->nidn;
										$no_card = $user_data->no_card;

										$angka_pertama = substr($angka, 0, 4);

										$angka_setelah_keempat = substr($angka, 4, 4);
										$angka_terakhir = substr($angka, -2);
										echo "<p>$angka_pertama</p>";
										echo "<p> $angka_setelah_keempat</p>";
										echo "<p> $angka_terakhir 89</p>";
										echo "<p>$no_card</p>";
										?>
									
									</div>
									<div class="row card-holder">
										<p>CARD REWARD</p>
										<p>MONTH/YEAR</p>
									</div>
									<div class="row name">
										<p style="text-transform: uppercase;"><?php echo $user_data->nama_dosen; ?></p>
										<p><?php $bulan_tahun = date('m / y'); echo  $bulan_tahun; ?></p>
									</div>
								<!-- data wali -->
								<?php elseif ($user_data->user_type == 'mahasiswa'): ?>
									<div class="row card-no">
									<?php
										$angka = $user_data->nim;
										$no_card = $user_data->no_card;

										$angka_pertama = substr($angka, 0, 4);

										$angka_setelah_keempat = substr($angka, 4, 4);
										$angka_terakhir = substr($angka, -2);
										echo "<p>$angka_pertama</p>";
										echo "<p> $angka_setelah_keempat</p>";
										echo "<p> $angka_terakhir 89</p>";
										echo "<p>$no_card</p>";
										?>
									
									</div>
									<div class="row card-holder">
										<p>CARD REWARD</p>
										<p>MONTH/YEAR</p>
									</div>
									<div class="row name">
										<p style="text-transform: uppercase;"><?php echo $user_data->nama_mahasiswa; ?></p>
										<p><?php $bulan_tahun = date('m / y'); echo  $bulan_tahun; ?></p>
									</div>
								<?php endif; ?>
							
							</div>            
						</div>
					</div>
              </div>

 			<br>
			<div class="table-responsive">
				<div class="cardd">
					<div class="card-inner">
					<div class="back">
						<img src="<?php echo base_url('public/card/map.png');?>" class="map-img">
						<div class="bar"></div><br><br>
						<?php if ($user_data->user_type == 'dosen'): ?>
							<div class="row card-text">
								<p  align="left"><b>Lecturer</b> Reward Card by LPPM Universitas Annuqayah Guluk-Guluk Sumenep.</p>
							</div>
						<?php elseif ($user_data->user_type == 'mahasiswa'): ?>									
							<div class="row card-text">
								<p  align="left"><b>Student</b> Reward Card by LPPM Universitas Annuqayah Guluk-Guluk Sumenep.</p>
							</div>
						<?php endif; ?>
						<?php foreach ($lembaga as $result): ?>
							<div class="row signature">
								<p  style="text-transform: uppercase;"><?php echo $result->nama_dosen; ?></p>
								<img src="<?php echo base_url('upload/qrcode/'.$result->qrcode); ?>" alt="ttd" width="25px">
							</div>
						<?php endforeach; ?>
					</div> 
              </div>
			  
        </div>
			
      		  </div>
    </div>
	</div>
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
