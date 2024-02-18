<!doctype html>
<html lang="en">
<?php foreach ($pesantren as $result): ?>
<head>

    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('upload/logo/'.$result->logo); ?>">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/');?>libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="<?php echo base_url('public/assets/');?>libs/owl.carousel/assets/owl.theme.default.min.css">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url('public/assets/');?>css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="<?php echo base_url('public/assets/');?>css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="<?php echo base_url('public/assets/');?>css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

</head>

<body data-spy="scroll" data-target="#topnav-menu" data-offset="60">

    <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
        <div class="container">
            <a class="navbar-logo" href="<?php echo base_url('/');?>">
                <img src="<?php echo base_url('upload/logo/'.$result->logo); ?>" alt="" height="35" class="logo logo-dark">
                <img src="<?php echo base_url('upload/logo/'.$result->logo); ?>" alt="" height="35" class="logo logo-light">
            </a>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-toggle="collapse" data-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav ml-auto" id="topnav-menu">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faqs">FAQs</a>
                    </li>

                </ul>

                <div class="ml-lg-2">
                    <a href="<?php echo base_url('login');?>" class="btn btn-outline-success w-xs">Sign in</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" id="home">
        <div class="bg-overlay bg-info"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">E-Raport Digital Pondok Pesantren
                            <?php echo $result->nama_lembaga; ?></h1>
                        <p class="font-size-14">Aplikasi Raport Digital diharapkan dapat mendukung program Pesantren
                            Digital, agar dapat memberikan layanan yang cepat, tepat dan akurat kepada seluruh
                            warga pesantren.
                            Amin.....!!!</p>

                        <div class="button-items mt-4">
                            <a href="#" class="btn btn-success">Register Now</a>
                            <a href="<?php echo base_url('login');?>" class="btn btn-light">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-8 col-sm-10 ml-lg-auto">
                    <img src="<?php echo base_url('public/assets/');?>images/features-img/img-2.png" alt=""
                        class="img-fluid mx-auto d-block">
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->


    <!-- Faqs start -->
    <section class="section" id="faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">FAQs</div>
                        <h4>Frequently asked questions</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="vertical-nav">
                        <div class="row">
                            <div class="col-lg-12 col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="v-pills-gen-ques"
                                                role="tabpanel">
                                                <h4 class="card-title mb-4">General Questions</h4>

                                                <div>
                                                    <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                        <div class="mb-3">
                                                            <a href="#general-collapseOne" class="accordion-list"
                                                                data-toggle="collapse" aria-expanded="true"
                                                                aria-controls="general-collapseOne">

                                                                <div>What is Lorem Ipsum ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>

                                                            </a>

                                                            <div id="general-collapseOne" class="collapse show"
                                                                data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">Everyone realizes why a new
                                                                        common language would be desirable: one could
                                                                        refuse to pay expensive translators. To achieve
                                                                        this, it would be necessary to have uniform
                                                                        grammar, pronunciation and more common words.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <a href="#general-collapseTwo"
                                                                class="accordion-list collapsed"
                                                                data-toggle="collapse" aria-expanded="false"
                                                                aria-controls="general-collapseTwo">
                                                                <div>Why do we use it ?</div>
                                                                <i class="mdi mdi-minus accor-plus-icon"></i>
                                                            </a>
                                                            <div id="general-collapseTwo" class="collapse"
                                                                data-parent="#gen-ques-accordion">
                                                                <div class="card-body">
                                                                    <p class="mb-0">If several languages coalesce,
                                                                        the grammar of the resulting language is more
                                                                        simple and regular than that of the individual
                                                                        languages. The new common language will be more
                                                                        simple and regular than the existing European
                                                                        languages.</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end vertical nav -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Faqs end -->


    <!-- Footer start -->
    <footer class="landing-footer">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <img src="<?php echo base_url('upload/logo/'.$result->logo); ?>" alt="" height="35">
                    </div>

                    <p class="mb-2">2023 © E-Raport. Design & Develop by Aqid Fahri Hafin</p>
                    <p>It will be as simple as occidental in fact, it will be to an english person, it will seem like
                        simplified English, as a skeptical</p>
                </div>

            </div>
        </div>
        <!-- end container -->
    </footer>
    <!-- Footer end -->

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url('public/assets/');?>libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/jquery-countdown/jquery.countdown.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>js/pages/ico-landing.init.js"></script>
    <script src="<?php echo base_url('public/assets/');?>js/app.js"></script>

</body>

<?php endforeach; ?>
</html>
