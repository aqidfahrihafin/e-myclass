<!doctype html>
<html lang="en">
<?php foreach ($lembaga as $result): ?>
<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="E-MyClass by Aqid Fahri Hafin,S.Kom" name="description">
    <meta content="E-MyClass" name="Aqid Fahri Hafin">
    <link rel="shortcut icon" href="<?php echo base_url('upload/logo/'.$result->logo); ?>">
    <link href="<?php echo base_url('public/assets/');?>css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/assets/');?>css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/assets/');?>css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"> Reset Password</h5>
                                        <p>Re-Password with E-MyClass <?php echo $result->nama_lembaga; ?>.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?php echo base_url('public/assets/');?>images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="<?php echo base_url('');?>">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo base_url('upload/logo/'.$result->logo); ?>" alt=""
                                                class="rounded-circle" height="40">
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <div class="p-2">
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    Enter your Email and instructions will be sent to you!
                                </div>
                                <form class="form-horizontal" action="#">

                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail"
                                            placeholder="Enter email">
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Reset</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Remember It ? <a href="<?php echo base_url('login');?>" class="font-weight-medium text-primary"> Sign In here</a> </p>
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Apins Digital. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i>
                                by Aqid Fahri Hafin
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('public/assets/');?>libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/node-waves/waves.min.js"></script>

    <script src="<?php echo base_url('public/assets/');?>js/app.js"></script>
</body>
<?php endforeach; ?>
</html>
