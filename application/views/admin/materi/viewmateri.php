<!DOCTYPE html>
<html lang="en">
<?php foreach ($lembaga as $result): ?>

<head>
    <meta charset="UTF-8">
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="E-Reward LPPM Universitas Annuqayah by Aqid Fahri Hafin,S.Kom" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('upload/logo/'.$result->logo); ?>">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/');?>libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet"
        href="<?php echo base_url('public/assets/');?>libs/owl.carousel/assets/owl.theme.default.min.css">
    <!-- Bootstrap Css -->
    <link href="<?php echo base_url('public/assets/');?>css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css">
    <!-- Icons Css -->
    <link href="<?php echo base_url('public/assets/');?>css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
</head>

<body>
    <h1>Detail Materi</h1>
    <?php if ($materi): ?>
    <!-- Gunakan tag <object> untuk menampilkan PDF -->
    <object data="<?php echo base_url('upload/dokumen/' . $materi->dokumen); ?>" type="application/pdf" width="100%"
        height="600px">

        <div align="center">
            <img src="<?php echo base_url('public/assets/images/null.png');?>" width="150px" alt="test" srcset="">
            <p><b>Belum ada data komentar :(</b></p>
			<p>PDF tidak dapat ditampilkan. <a href="<?php echo base_url('upload/dokumen/' . $materi->dokumen); ?>">Download
                PDF</a> untuk melihatnya.</p>
        </div>
    </object>
    <!-- Atau gunakan tag <iframe> -->
    <!-- <iframe src="<?php echo base_url('upload/dokumen/' . $materi->dokumen); ?>" width="100%" height="600px"></iframe> -->
    <?php else: ?>
    <p>Materi tidak ditemukan.</p>
    <?php endif; ?>



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
