<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Apins Digital Solusi Teknologi Tekini" name="description">
    <meta content="E-Raport" name="Aqid Fahri Hafin">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('public/assets/');?>images/logo1.png">

	<link href="<?php echo base_url('public/assets/');?>libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables -->
    <link href="<?php echo base_url('public/assets/');?>libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/assets/');?>libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="<?php echo base_url('public/assets/');?>libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Css -->
    <link href="<?php echo base_url('public/assets/');?>css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="<?php echo base_url('public/assets/');?>css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="<?php echo base_url('public/assets/');?>css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

</head>

<body data-topbar="dark" data-layout="horizontal">

<!-- Begin page -->
<div id="layout-wrapper">

<?php $this->load->view('templates/topbar'); ?> 
<?php $this->load->view('templates/topnav'); ?>
