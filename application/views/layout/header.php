<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SiTeDI</title>
    <link rel="shortcut icon" href="<?= base_url('assets/sitedi.png');?>" width="20" height="20">

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/template/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/template/css/sb-admin.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets/template/font-awesome-4.1.0/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url('assets/template/css/plugins/morris.css');?>" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">


    <link href="<?= base_url("datepicker/dist/css/bootstrap-datepicker.css");?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0/css/bootstrap-datepicker.css" rel="stylesheet" />
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /> -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url('admin/dashboard/');?>">Sistem Penelitian Pengabdian</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="<?= base_url('login/profile/');?>"><i class="fa fa-fw fa-address-book-o"></i> Profile</a>
                </li>
                <li class="dropdown">
                    <a href="<?= base_url('login/logout');?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>