<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Simão Toco | Adicionar Membro</title>
        <link rel="icon" href="<?= base_url() ?>libs/dist/img/logo.png" type="image/x-icon" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>libs/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?= base_url() ?>libs/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?= base_url() ?>libs/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>libs/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?= base_url() ?>libs/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>libs/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <!-- Site wrapper -->
<nav class="main-header navbar navbar-expand navbar-light bg-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
	
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>usuario/sair" class="nav-link"><i class="fas fa-power-off"></i> Terminar Sessão</a>
        </li>
    </ul>
</nav>

<?php include APPPATH . 'views/includes/header_lateral.php'; ?>
