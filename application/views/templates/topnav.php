  <div class="topnav">
      <div class="container-fluid">
          <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

              <div class="collapse navbar-collapse" id="topnav-menu-content">
                  <ul class="navbar-nav">
						<?php if ($this->session->userdata('role') == "admin") {   ?>
							<?php $this->load->view('templates/usersmenu/admin'); ?>
						<?php } ?>	
						<?php if ($this->session->userdata('role') == "pembimbing") {   ?>
							<?php $this->load->view('templates/usersmenu/pembimbing'); ?>
						<?php } ?>	
						<?php if ($this->session->userdata('role') == "guru") {   ?>
							<?php $this->load->view('templates/usersmenu/guru'); ?>
						<?php } ?>	
						<?php if ($this->session->userdata('role') == "wali") {   ?>
							<?php $this->load->view('templates/usersmenu/wali'); ?>
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
