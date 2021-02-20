<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Elegant admin lite design, Elegant admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Elegant Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Penelitian</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin-lite/" />
    <!-- Favicon icon -->
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?= base_url('assets/layout/assets/node_modules/morrisjs/morris.css');?>" rel="stylesheet">
    <!--c3 plugins CSS -->
    <link href="<?= base_url('assets/layout/assets/node_modules/c3-master/c3.min.css');?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/layout/html/dist/css/style.css');?>" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?= base_url('assets/layout/html/dist/css/pages/dashboard1.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?=base_url('dosen/penelitian')?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url('assets/undip.png');?>" alt="logo" width="60" height="70"/>
                            <!-- Light Logo icon -->
                            
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <h1 style="color:black"> &nbsp;Penelitian</h1></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light"
                                href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-black" href="<?= base_url('login/profile/');?>"><i class="fa fa-fw fa-address-book-o"></i> Profile</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="<?= base_url('dosen/penelitian/logout');?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="left-sidebar" style="background-color:#00bcd4;">
            
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('/');?>" aria-expanded="false"><i style="color:white"
                                    class="fa fa-home nav_icon"></i><span class="hide-menu"><h5 style="color:white;">Home</h5></span></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('dosen/penelitian/');?>" aria-expanded="false"><i style="color:white"
                                    class="fa fa-file-text-o nav_icon"></i><span class="hide-menu"><h5 style="color:white;">Dashboard</h5></span></a></li>
                        <li> <a class="waves-effect waves-dark" href="javascript:;" aria-expanded="true"><i style="color:white"
                                    class="fa fa-check-square-o nav_icon"></i><span class="hide-menu"></span><h5 style="color:white;">Pengajuan Proposal</h5></a>
                                    <ul id="demo" class="collapse">
                                    <li>
                                    <a href="<?= base_url('dosen/penelitian/pengisianform/');?>"><h5 style="color:white;">Form Pengajuan</h5></a>
                                </li>
                                <li>
                                    <a href="<?= base_url('dosen/penelitian/submit/');?>"><h5 style="color:white;">Daftar Pengajuan & Submit</h5></a>
                                </li>
                        </ul></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('dosen/penelitian/monev');?>" aria-expanded="false"><i style="color:white"
                                    class="fa fa-fw fa-clipboard"></i><span class="hide-menu"></span><h5 style="color:white;">Laporan Monev</h5></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?= base_url('dosen/penelitian/akhir');?>" aria-expanded="false"><i style="color:white"
                                    class="fa fa-fw fa-clipboard"></i><span class="hide-menu"></span><h5 style="color:white;">Laporan Akhir</h5></a></li>
                                    <?php  if(!empty($cek)){ ?>
                        <li> <a class="waves-effect waves-dark" href="javascript:;" aria-expanded="true"><i style="color:white"
                                class="fa fa-bar-chart"></i><span class="hide-menu"></span><h5 style="color:white;">Reviewer</h5></a>
                                    <ul id="demo" class="collapse">
                                    <li>
                                    <a href="<?= base_url('reviewer/penelitian/penilaian_penelitian/');?>"><h5 style="color:white;">Penilaian Proposal</h5></a>
                                </li>
                                <li>
                                    <a href="<?= base_url('reviewer/penelitian/monev/');?>"><h5 style="color:white;">Monitoring & Evaluasi</h5></a>
                                </li>
                        </ul></li>
                        <!-- <li> <a class="waves-effect waves-dark" href="<?= base_url('reviewer/penelitian/penilaian_penelitian/');?>" aria-expanded="false"><i style="color:white"
                                    class="fa fa-bar-chart"></i><span class="hide-menu"></span><h5 style="color:white;">Penilaian Proposal</h5></a></li>
									<li> <a class="waves-effect waves-dark" href="<?= base_url('reviewer/penelitian/monev/');?>" aria-expanded="false"><i style="color:white"
                                    class="fa fa-bar-chart"></i><span class="hide-menu"></span><h5 style="color:white;">Monitoring & Evaluasi</h5></a></li> -->
                                    <?php  }?>
                        <div class="text-center m-t-30">
                            <a href="<?= base_url('dosen/pengabdian/logout/');?>"
                                class="btn waves-effect waves-light btn-danger hidden-md-down"><i class="fa fa-fw fa-power-off"></i>  Log Out</a>
                        </div>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
									</div>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <br>