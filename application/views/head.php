<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REUNI SMADA</title>

    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url(); ?>assets/img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url(); ?>assets/img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url(); ?>assets/img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url(); ?>assets/img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url(); ?>assets/img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url(); ?>assets/img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url(); ?>assets/img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url(); ?>assets/img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url(); ?>assets/img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/img/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url(); ?>assets/img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url(); ?>assets/img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/custom/datetimepicker/jquery.datetimepicker.css" />

    <link href="<?= base_url('assets/custom/magnify/'); ?>css/jquery.magnify.css" rel="stylesheet">
    <!-- <link href="<?= base_url('assets/custom/magnify/'); ?>css/snack.css" rel="stylesheet"> -->
    <link href="<?= base_url('assets/custom/magnify/'); ?>css/snack-helper.css" rel="stylesheet">
    <link href="<?= base_url('assets/custom/magnify/'); ?>css/docs.css" rel="stylesheet">

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        html {
            /* zoom: 80%; */
            /* transform: scale(0.8, 0.8); */
            /* -webkit-transform: scale(0.9, 0.9); */
            /* margin-top: -13% */
            /* height: 95%;
            width: 95%; */
        }

        a {
            color: #70b5ff;
        }

        .btn {
            margin-top: 3px;
        }

        .dark-mode input:-webkit-autofill {
            -webkit-text-fill-color: unset !important;
        }

        @font-face {
            font-family: 'squada';
            /* Nama font */
            src: url('<?php echo base_url('assets/custom/font/SquadaOne-Regular.ttf'); ?>') format('truetype');
            /* Path ke file font */
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'bauhaus';
            /* Nama font */
            src: url('<?php echo base_url('assets/custom/font/BauhausRegular.woff'); ?>') format('woff');
            /* Path ke file font */
            font-weight: normal;
            font-style: normal;
        }

        .brand-text {
            /* font-family: bauhaus; */
            font-size: 1.5em;
            letter-spacing: 3px;

        }
    </style>
</head>

<body class="dark-mode text-sm">

    <!-- <body class="sidebar-mini text-sm "> -->

    <!-- <body class="layout-fixed layout-navbar-fixed layout-footer-fixed"> -->
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm"> -->
        <nav class="main-header navbar navbar-expand navbar-dark text-sm">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu <?= $this->session->isLogin ? '' : 'd-none'; ?>">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?= base_url(); ?>assets/img/head.png" class="user-image img-circle elevation-2" alt="User Image">
                        <!-- <span class="d-none d-md-inline"><?= $this->session->fullname; ?></span> -->
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="<?= base_url(); ?>assets/img/head.png" class="img-circle elevation-2" alt="User Image">
                            <p>
                                <?= $this->session->fullname; ?>
                                <!-- <small>Member since Nov. 2012</small> -->
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="<?= base_url(); ?>login/profile" class="btn btn-default btn-flat">Profile</a>
                            <a href="<?= base_url(); ?>login/logout" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item <?= $this->session->isLogin ? 'd-none' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('login'); ?>" role="button">
                        LOGIN
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item d-none">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 no-expand sidebar-no-expand">
            <!-- Brand Logo -->
            <a href="#" class="brand-link text-sm d-flex align-items-center">
                <!-- <img src="<?= base_url(); ?>assets/img/logoz.png" alt="AdminLTE Logo" class="brand-image" style="margin-right: 10px;"> -->
                <div>
                    <span class="brand-text font-weight-light">REUNI SMADA 99<br>
                        <!-- <span class="brand-text font-weight-light" style="font-family: bauhaus;">Resource Allocation
                        IT Kōji Optimization Unit</span> -->
                </div>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?= base_url(); ?>assets/img/head.png" alt="user image">
                        <span class="username" style="font-size: 15px;color: ghostwhite;">
                            <?= $this->session->fullname == '' ? 'User' : $this->session->fullname; ?>
                            <!-- <a href="#" class="disabled" disabled></a> -->
                        </span>
                        <span class="description">
                            <?= $this->session->jabatan == '' ? 'Public Access' : $this->session->jabatan; ?>
                        </span>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="text-sm nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat " data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-header">REUNI</li>
                        <?php
                        $recruitment = ['request', 'applicant'];
                        $location = isset($location) ? $location : '';
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>reuni" class="nav-link <?= $location == 'list_peserta' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-chart-area"></i>
                                <p>
                                    List Peserta
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?= $location == 'list_project' ? 'menu-open' : ''; ?>">
                            <a href="<?= base_url(); ?>projects" class="nav-link <?= $location == 'list_project' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>
                                    Form Kedatangan
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?= $location == 'applicant' ? 'menu-open' : ''; ?> d-none">
                            <a href="<?= base_url(); ?>recruitment/applicant" class="nav-link <?= $location == 'applicant' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Applicant
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?= $this->session->username == 'admin' ? '' : 'd-none' ?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Agenda
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?= $this->session->username == 'admin' ? '' : 'd-none' ?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-pdf"></i>
                                <p>
                                    Reports
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">