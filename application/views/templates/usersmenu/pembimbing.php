<li class="nav-item">
	<a class="nav-link  arrow-none" href="<?php echo base_url('/dashboard');?>" id="topnav-dashboard" role="button"aria-expanded="false">
	<i class="mdi mdi-home-variant mr-2"></i>Dashboard </a>
</li>
<li class="nav-item">
	<a class="nav-link  arrow-none" href="<?php echo base_url('/profil');?>" id="topnav-dashboard" aria-expanded="false">
	<i class="mdi mdi-account mr-2"></i>Profil </a>
</li>
<li class="nav-item">
	<a class="nav-link  arrow-none" href="<?php echo base_url('/penilaian');?>" id="topnav-dashboard" aria-expanded="false">
	<i class="bx bx-customize mr-2"></i>Penilaian </a>
</li>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
		role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="mdi mdi-account-switch mr-2"></i>Pembimbing Santri <div class="arrow-down"></div>
	</a>
	<div class="dropdown-menu" aria-labelledby="topnav-dashboard">
		<a href="<?php echo base_url('/santri');?>" class="dropdown-item">Data Santri</a>
		<a href="<?php echo base_url('#');?>" class="dropdown-item">Absen Santri</a>
		<a href="<?php echo base_url('#');?>" class="dropdown-item">Catatan Pembimbing</a>
		<a href="<?php echo base_url('#');?>" class="dropdown-item">Penilaian Kepribadian</a>
		<a href="<?php echo base_url('prestasi');?>" class="dropdown-item">Prestasi Santri</a>
		<a href="<?php echo base_url('#');?>" class="dropdown-item">Raport Santri</a>
	</div>
</li>
