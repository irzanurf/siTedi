<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Ketua Departemen || SiTeDi</title>
    <link rel="shortcut icon" href="<?= base_url('assets/sitedi.png');?>" width="20" height="20">

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> -->
    <script src="<?= base_url('assets/template/js/jquery-1.11.0.js');?>"></script>
    <script src="<?= base_url('assets/layout/assets/libs/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/layout/html/dist/js/perfect-scrollbar.jquery.min.js');?>"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" >

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?= base_url('/');?>" class="simple-text">
                    SiTedi
                </a>
            </div>

            <ul class="nav">
            <li>
                        <a href="<?= base_url('/');?>"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
            <li>
                        <a href="<?= base_url('kadep/kadep');?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                    <a href="#" data-toggle="collapse" data-target="#penelitian"><i class="fa fa-fw fa-edit"></i> Penelitian<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="penelitian" class="collapse">
                            
                            <li>
                                <a href="<?= base_url('kadep/kadep/listAssignPenelitian/');?>"><i class="fa fa-fw fa-edit"></i> Assign Proposal</a>
                            </li></br>
                            <li>
                            <a href="<?= base_url('kadep/kadep/listSubmitPenelitian/');?>"><i class="fa fa-fw fa-edit"></i> Daftar Proposal</a>
                                </li></br>
                            <li>
                                <a href="<?= base_url('kadep/kadep/listMonevPenelitian/');?>"><i class="fa fa-fw fa-clipboard"></i> Monitoring & Evaluasi</a>
                            </li></br>
                            <li>
                                <a href="<?= base_url('kadep/kadep/listAkhirPenelitian/');?>"><i class="fa fa-fw fa-clipboard"></i> Laporan Akhir</a>
                            </li></br>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-edit"></i> Pengabdian<i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                
                                <li>
                                    <a href="<?= base_url('kadep/kadep/listAssignPengabdian/');?>"><i class="fa fa-fw fa-edit"></i> Assign Proposal</a>
                                </li></br>
                                <li>
                                    <a href="<?= base_url('kadep/kadep/listSubmitPengabdian/');?>"><i class="fa fa-fw fa-edit"></i> Daftar Proposal</a>
                                </li></br>
                                <li>
                                    <a href="<?= base_url('kadep/kadep/listAkhirPengabdian/');?>"><i class="fa fa-fw fa-clipboard"></i> List Laporan Akhir</a>
                                </li></br>
                                
                        </ul>
                        
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
                            <a href="<?= base_url('kadep/kadep/logout');?>">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>