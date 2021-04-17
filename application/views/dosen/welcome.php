<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="<?php echo base_url ('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/styles.css'); ?>">
</head>

<body  id="page-top">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top"><img src="<?= base_url('assets/undip.png');?>" alt="logo" width="60" height="70"/> Penelitian Dan Pengabdian</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" data-toogle="collapse" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                    <?php  if(!empty($cek)){ ?>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('kadep/kadep/'); ?>" style="color: rgb(255,255,255);font-family: 'Kaushan Script', cursive;font-size: 16 px;">Ketua Departemen</a></li>
                    <?php  }?>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('login/profile'); ?>" style="color: rgb(0,255,255);font-family: 'Kaushan Script', cursive;font-size: 16 px;">Profile</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('login/ganti_password'); ?>" style="color: rgb(122,255,122);font-family: 'Kaushan Script', cursive;font-size: 16 px;">Ganti Password</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="<?php echo base_url('dosen/Welcome/logout'); ?>" style="color: rgb(255,122,122);font-family: 'Kaushan Script', cursive;font-size: 16 px;">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    
    <div class="section hpanel leftpan">
  <div class="background-img" style="background-image:url('<?php echo base_url('assets/img/penelitian.jpg'); ?>');">>
    <div class="content-area"> 
        <div class="btn-area">
</br></br></br></br></br></br></br>
        <a href="<?= base_url('dosen/penelitian/');?>">PENELITIAN</a> </div>
    </div>
  </div>
</div>
<div class="section hpanel rightpan">
<div class="background-img" style="background-image:url('<?php echo base_url('assets/img/pengabdian.jpg'); ?>');">>
    <div class="content-area">
      <div class="btn-area">
      </br></br></br></br></br></br></br>
        <a href="<?= base_url('dosen/pengabdian/');?>">PENGABDIAN</a> </div>
    </div>
  </div>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="<?php echo base_url ('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url ('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="<?php echo base_url ('assets/js/agency.js'); ?>"></script>
</body>

</html>