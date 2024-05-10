<li class="nav-item">
	<a class="nav-link  arrow-none" href="<?php echo base_url('/dashboard');?>" id="topnav-dashboard" role="button"aria-expanded="false">
	<i class="mdi mdi-home-variant mr-2"></i>Dashboard </a>
</li>
<li class="nav-item">
	<a class="nav-link  arrow-none" href="<?php echo base_url('/profil');?>" id="topnav-dashboard" aria-expanded="false">
	<i class="mdi mdi-account mr-2"></i>Profil </a>
</li>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
		role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="mdi mdi-account-key mr-2"></i>Data Managemen <div class="arrow-down"></div>
	</a>
	<div class="dropdown-menu" aria-labelledby="topnav-dashboard">
		<a href="<?php echo base_url('/kelas');?>" class="dropdown-item">Data Kelas</a>
		<a href="#" class="dropdown-item">Backup & Restore</a>
	</div>
</li>
