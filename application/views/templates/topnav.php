  <div class="topnav">
      <div class="container-fluid">
          <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

              <div class="collapse navbar-collapse" id="topnav-menu-content">
                  <ul class="navbar-nav">
						<?php if ($this->session->userdata('role') == "admin") {   ?>
							<?php $this->load->view('templates/usersmenu/admin'); ?>
						<?php } ?>	
						<?php if ($this->session->userdata('role') == "bmsi") {   ?>
							<?php $this->load->view('templates/usersmenu/bmsi'); ?>
						<?php } ?>	
						<?php if ($this->session->userdata('role') == "dosen") {   ?>
							<?php $this->load->view('templates/usersmenu/dosen'); ?>
						<?php } ?>	
						<?php if ($this->session->userdata('role') == "mahasiswa") {   ?>
							<?php $this->load->view('templates/usersmenu/mahasiswa'); ?>
						<?php } ?>	               
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
