 <header id="page-topbar" class="bg-primary">
     <div class="navbar-header">
         <div class="d-flex">
             <!-- LOGO -->
             <div class="navbar-brand-box">
                 <a href="#" class="logo logo-dark">
                     <span class="logo-sm">
                         <img src="<?php echo base_url('public/assets/');?>images/logo/dark.png" alt="" height="26">
                     </span>
                     <span class="logo-lg">
                         <img src="<?php echo base_url('public/assets/');?>images/logo/dark.png" alt="" height="23">
                     </span>
                 </a>

                 <a href="#" class="logo logo-light">
                     <span class="logo-sm">
                         <img src="<?php echo base_url('public/assets/');?>images/logo/light.png" alt="" height="26">
                     </span>
                     <span class="logo-lg">
                         <img src="<?php echo base_url('public/assets/');?>images/logo/light.png" alt="" height="23">
                     </span>
                 </a>
             </div>

             <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                 data-toggle="collapse" data-target="#topnav-menu-content">
                 <i class="fa fa-fw fa-bars"></i>
             </button>

             <!-- App Search-->
             <form class="app-search d-none d-lg-block">
                 <div class="position-relative">
                     <input type="text" class="form-control" placeholder="Search...">
                     <span class="bx bx-search-alt"></span>
                 </div>
             </form>
         </div>

         <div class="d-flex">

             <div class="dropdown d-none d-lg-inline-block ml-1">
                 <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                     <i class="bx bx-fullscreen"></i>
                 </button>
             </div>

             <div class="dropdown d-inline-block">
                 <button type="button" class="btn header-item noti-icon waves-effect"
                     id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">
                     <i class="bx bx-bell bx-tada"></i>
                     <span class="badge badge-danger badge-pill">3</span>
                 </button>
                 <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-notifications-dropdown">
                     <div class="p-3">
                         <div class="row align-items-center">
                             <div class="col">
                                 <h6 class="m-0"> Notifications </h6>
                             </div>
                             <div class="col-auto">
                                 <a href="#!" class="small"> View All</a>
                             </div>
                         </div>
                     </div>
                     <div data-simplebar="" style="max-height: 230px;">
                         <a href="" class="text-reset notification-item">
                             <div class="media">
                                 <div class="avatar-xs mr-3">
                                     <span class="avatar-title bg-primary rounded-circle font-size-16">
                                         <i class="bx bx-cart"></i>
                                     </span>
                                 </div>
                                 <div class="media-body">
                                     <h6 class="mt-0 mb-1">Your order is placed</h6>
                                     <div class="font-size-12 text-muted">
                                         <p class="mb-1">If several languages coalesce the grammar</p>
                                         <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                     </div>
                                 </div>
                             </div>
                         </a>
                     </div>
                     <div class="p-2 border-top">
                         <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                             <i class="mdi mdi-arrow-right-circle mr-1"></i> View More..
                         </a>
                     </div>
                 </div>
             </div>

             <div class="dropdown d-inline-block">
                 <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="rounded-circle header-profile-user" src="<?php echo base_url('public/assets/');?>images/logo1.png" alt="Header Avatar">
                 </button>
                 <div class="dropdown-menu dropdown-menu-right">
                     <!-- item-->
                     <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i>
                         Profile</a>
                     <a class="dropdown-item d-block" href="#"><span
                             class="badge badge-success float-right">11</span><i
                             class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                     <a class="dropdown-item" href="#"><i
                             class="bx bx-lock-open font-size-16 align-middle mr-1"></i> Lock screen</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item text-danger" href="<?php echo base_url('home/logout');?>"><i
                             class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                 </div>
             </div>

         </div>
     </div>
 </header>
