  <div class="topnav">
      <div class="container-fluid">
          <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

              <div class="collapse navbar-collapse" id="topnav-menu-content">
                  <ul class="navbar-nav">

                      <li class="nav-item">
                          <a class="nav-link  arrow-none" href="<?php echo base_url('/dashboard');?>" id="topnav-dashboard" role="button"
                              aria-expanded="false">
                              <i class="bx bx-home-circle mr-2"></i>Dashboard </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link  arrow-none" href="<?php echo base_url('/pesantren');?>" id="topnav-dashboard"
                              aria-expanded="false">
                              <i class="bx bx-user mr-2"></i>Profil Pesantren </a>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                              role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-customize mr-2"></i>Lembaga <div class="arrow-down"></div>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                              <a href="<?php echo base_url('/tahunajaran');?>" class="dropdown-item">Sanah Dirasah</a>
                              <a href="<?php echo base_url('/kelas');?>" class="dropdown-item">Data Kelas</a>
                              <a href="<?php echo base_url('/mapel');?>" class="dropdown-item">Mata Pelajaran</a>
                          </div>
                      </li>

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                              role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-customize mr-2"></i>Guru <div class="arrow-down"></div>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                              <a href="<?php echo base_url('/guru');?>" class="dropdown-item">Data Guru</a>
                              <a href="<?php echo base_url('/datamengajar');?>" class="dropdown-item">Mengajar</a>
                          </div>
                      </li>

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                              role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-customize mr-2"></i>Santri <div class="arrow-down"></div>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                              <a href="<?php echo base_url('/santri');?>" class="dropdown-item">Data Santri</a>
                              <a href="<?php echo base_url('/pindahkelas');?>" class="dropdown-item">Pindah Kelas</a>
                              <a href="<?php echo base_url('/naikkelas');?>" class="dropdown-item">Naik Kelas</a>
                              <a href="<?php echo base_url('/alumni');?>" class="dropdown-item">Data Alumni</a>
                          </div>
                      </li>

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                              role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-customize mr-2"></i>Raport <div class="arrow-down"></div>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                              <a href="#" class="dropdown-item">Pengaturan Cetak</a>
                              <a href="#" class="dropdown-item">Status Nilai</a>
                              <a href="#" class="dropdown-item">Cetak Raport</a>
                          </div>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                              role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-user mr-2"></i>Admin App <div class="arrow-down"></div>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                              <a href="#" class="dropdown-item">Data Admin</a>
                              <a href="#" class="dropdown-item">Backup & Restore</a>
                          </div>
                      </li>
                  </ul>
              </div>
          </nav>
      </div>
  </div>

  <div class="main-content">
      <div class="page-content">
          <div class="container-fluid">

              <!-- start page title -->
              <div class="row">
                  <div class="col-12">
                      <div class="page-title-box d-flex align-items-center justify-content-between">
                          <h4 class="mb-0 font-size-18"><?php echo $title?></h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                  <li class="breadcrumb-item active"><?php echo $title?></li>
                              </ol>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- end page title -->
