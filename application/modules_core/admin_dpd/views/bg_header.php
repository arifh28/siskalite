
<doctype html>
<html>
<head>
	<title><?php echo $_SESSION['site_title']; ?></title>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/style.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/main.js"></script>
</head>
<body>
<body class="skin-red fixed">
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url();?>superadmin" class="logo">SISKA IMM Jateng</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" href="<?php echo base_url(); ?>auth/user_login/logout">
                <i class="fa fa-sign-out"></i> Log Out
            </a>
        </div>

        <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" href="<?php echo base_url(); ?>">
                <i class="fa fa-home"></i> Beranda
            </a>
        </div>
        <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url(); ?>admin_dpd/dashboard">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>asset/admin/images/siska_logo.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata("nama_user_login"); ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Admin DPD</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th-list"></i> <span>Menu</span> <i class="fa fa-angle-left pull-right"></i>
                </a>

		        <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url(); ?>admin_dpd/kader"><i class="fa fa-circle-o"></i> Kader  <?php if($_SESSION['juml_kader']!=0){ ?>
                                <small class="badge pull-right bg-red"><?php echo $_SESSION['juml_kader']; ?></small>
                            <?php } ?></a>        </li>
                </ul>
                <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url(); ?>admin_dpd/foto_kader"><i class="fa fa-circle-o"></i> Foto Kader				<?php if($_SESSION['juml_foto_kader']!=0){ ?>
                                <small class="badge pull-right bg-red" ><?php echo $_SESSION['juml_foto_kader']; ?></small>
                            <?php } ?></a></li>
                </ul>

                <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url(); ?>web/to_pro"><i class="fa fa-circle-o"></i> Pesan dari PC IMM</a></li>
                </ul>

                <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url(); ?>admin_dpd/survei"><i class="fa fa-circle-o"></i> Survei</a></li>
                </ul>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th-list"></i> <span>Pimpinan Cabang</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url(); ?>admin_dpd/admin_cabang"><i class="fa fa-circle-o"></i> Admin Cabang</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url(); ?>admin_dpd/cabang"><i class="fa fa-circle-o"></i> Pimpinan Cabang</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Profil</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url(); ?>admin_dpd/profil"><i class="fa fa-circle-o"></i> User</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url(); ?>admin_dpd/password"><i class="fa fa-circle-o"></i> Password</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
