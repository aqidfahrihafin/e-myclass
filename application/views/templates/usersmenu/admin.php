<li class="nav-item">
	<a class="nav-link  arrow-none" href="<?php echo base_url('/dashboard');?>" id="topnav-dashboard" role="button"
		aria-expanded="false">
		<i class="mdi mdi-home-variant mr-2"></i>Dashboard </a>
</li>
<li class="nav-item">
	<a class="nav-link  arrow-none" href="<?php echo base_url('/profil');?>" id="topnav-dashboard"
		aria-expanded="false">
		<i class="mdi mdi-account mr-2"></i>Profil </a>
</li>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
		role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="mdi mdi-domain mr-2"></i>Data Master <div class="arrow-down"></div>
	</a>
	<div class="dropdown-menu" aria-labelledby="topnav-dashboard">
		<a href="<?php echo base_url('/lembaga');?>" class="dropdown-item">Profil Lembaga </a>
		<div class="dropdown">
			<a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Data Referensi <div class="arrow-down"></div>
			</a>
			<div class="dropdown-menu" aria-labelledby="topnav-email">
				<a href="<?php echo base_url('/tahunajaran');?>" class="dropdown-item">Tahun Akademik</a>
				<a href="<?php echo base_url('/fakultas');?>" class="dropdown-item">Data Fakultas</a>
				<a href="<?php echo base_url('/prodi');?>" class="dropdown-item">Data Prodi</a>
				<a href="<?php echo base_url('/kategori');?>" class="dropdown-item">Kategori Reward & BPI</a>
				<a href="<?php echo base_url('/perpub');?>" class="dropdown-item">Peringkat Publikasi</a>
			</div>
		</div>
		<a href="<?php echo base_url('/dosen');?>" class="dropdown-item">Data Dosen</a>
		<a href="<?php echo base_url('/mahasiswa');?>" class="dropdown-item">Data Mahasiswa</a>
		<a href="<?php echo base_url('/alumni');?>" class="dropdown-item">Data Alumni</a>
	</div>
</li>

<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
		role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="mdi mdi-server-network mr-2"></i>Data Manajemen <div class="arrow-down"></div>
	</a>
	<div class="dropdown-menu" aria-labelledby="topnav-dashboard">
		<a href="#" class="dropdown-item">Pengaturan Cetak</a>
		<a href="#" class="dropdown-item">Status Nilai</a>
		<a href="<?php echo base_url('/prestasi');?>" class="dropdown-item">Prestasi</a>
		<a href="#" class="dropdown-item">Beasiswa</a>
		<a href="#" class="dropdown-item">Cetak Raport</a>
	</div>
</li>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
		role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="mdi mdi-account-key mr-2"></i>Admin App <div class="arrow-down"></div>
	</a>
	<div class="dropdown-menu" aria-labelledby="topnav-dashboard">
		<a href="<?php echo base_url('/users');?>" class="dropdown-item">Data Users</a>
		<a href="#" class="dropdown-item">Backup & Restore</a>
	</div>
</li>
