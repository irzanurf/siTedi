<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin || SiTeDi</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation library for notifications   -->
    <link href="<?= base_url('assets/admin/assets/css/animate.min.css');?>" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?= base_url('assets/admin/assets/css/light-bootstrap-dashboard.css?v=1.4.0');?>" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?= base_url('assets/admin/assets/css/demo.css');?>" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?= base_url('assets/admin/assets/css/pe-icon-7-stroke.css');?>" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/css/bootstrap-datepicker.css" rel="stylesheet" />
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="<?= base_url('assets/template/js/jquery-1.11.0.js');?>"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" >

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?= base_url('/');?>" class="simple-text">
                    Sistem <br> Penelitian dan Pengabdian
                </a>
            </div>

            <ul class="nav">
            <li>
                        <a href="<?= base_url('admin/dashboard/');?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                    <a href="#" data-toggle="collapse" data-target="#penelitian"><i class="fa fa-fw fa-edit"></i> Penelitian<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="penelitian" class="collapse">
                            <li>
                                <a href="<?= base_url('admin/penelitian/jadwalpenelitian/');?>"><i class="fa fa-fw fa-edit"></i> Jadwal Penelitian</a>
                                </li></br>
                            <li>
                                <a href="<?= base_url('admin/penelitian/berita/');?>"><i class="fa fa-fw fa-edit"></i> Pengumuman Penelitian</a>
                            </li></br>
                            <li>
                                <a href="<?= base_url('admin/penelitian/skemapenelitian/');?>"><i class="fa fa-fw fa-edit"></i> Skema Penelitian</a>
                            </li></br>
                            <li>
                                <a href="<?= base_url('admin/penelitian/showReviewer/');?>"><i class="fa fa-fw fa-edit"></i> Reviewer Penelitian</a>
                            </li></br>
                            <li>
                                <a href="<?= base_url('admin/penelitian/assignProposal/');?>"><i class="fa fa-fw fa-edit"></i> Assign Proposal</a>
                            </li></br>
                            <li>
                                <a href="<?= base_url('admin/penelitian/approval/');?>"><i class="fa fa-fw fa-edit"></i> Aproval Penelitian</a>
                            </li></br>
                            <li>
                                <a href="<?= base_url('admin/penelitian/daftarPenelitian/');?>"><i class="fa fa-fw fa-edit"></i> Status Proposal</a>
                            </li></br>
                            <li>
                                <a href="<?= base_url('admin/penelitian/monev/');?>"><i class="fa fa-fw fa-clipboard"></i> Monitoring & Evaluasi</a>
                            </li></br>
                            <li>
                                <a href="<?= base_url('admin/penelitian/akhir/');?>"><i class="fa fa-fw fa-clipboard"></i> Laporan Akhir</a>
                            </li></br>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i> Pengabdian<i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                            <li>
                                    <a href="<?= base_url('admin/pengabdian/jadwalpengabdian/');?>"><i class="fa fa-fw fa-edit"></i> Jadwal Pengabdian</a>
                                </li></br>
                            <li>
                                <a href="<?= base_url('admin/pengabdian/berita/');?>"><i class="fa fa-fw fa-edit"></i> Pengumuman Pengabdian</a>
                            </li></br>
                                
                                <li>
                                    <a href="<?= base_url('admin/pengabdian/skemapengabdian/');?>"><i class="fa fa-fw fa-edit"></i> Skema Pengabdian</a>
                                </li></br>
                                <li>
                                    <a href="<?= base_url('admin/pengabdian/showReviewer/');?>"><i class="fa fa-fw fa-edit"></i> Reviewer Pengabdian</a>
                                </li></br>
                                <li>
                                    <a href="<?= base_url('admin/pengabdian/assignproposal/');?>"><i class="fa fa-fw fa-edit"></i> Assign Proposal</a>
                                </li></br>
                                <li>
                                    <a href="<?= base_url('admin/pengabdian/approval/');?>"><i class="fa fa-fw fa-edit"></i> Approval Proposal</a>
                                </li></br>
                                <li>
                                    <a href="<?= base_url('admin/pengabdian/daftarPengabdian/');?>"><i class="fa fa-fw fa-edit"></i> Status Proposal</a>
                                </li></br>
                                <li>
                                    <a href="<?= base_url('admin/pengabdian/laporanakhir/');?>"><i class="fa fa-fw fa-clipboard"></i> List Laporan Akhir</a>
                                </li></br>
                                
                        </ul>
                        
                    </li>
                    <li>
                        <a href="<?= base_url('admin/dashboard/viewDosen');?>"><i class="fa fa-fw fa-folder"></i> Dosen</a>
                    </li>
                    <!-- <li>
                        <a href="<?= base_url('admin/dashboard/viewMahasiswa');?>"><i class="fa fa-fw fa-folder"></i> Mahasiswa</a>
                    </li> -->
                    <li>
                        <a href="<?= base_url('admin/dashboard/sumberdana');?>"><i class="fa fa-fw fa-folder"></i> RKT</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/dashboard/luaran');?>"><i class="fa fa-fw fa-folder"></i> Luaran</a>
                    </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="<?= base_url('login/profile/');?>">
                               <p>Profile</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('login/logout');?>">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>