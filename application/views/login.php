<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - SiTeDi</title>
    <link rel="shortcut icon" href="<?= base_url('assets/sitedi.png');?>" width="20" height="20">
    <link rel="stylesheet" href="<?php echo base_url ('assets/login/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="<?php echo base_url ('assets/login/css/Google-Style-Login.css'); ?>">
    
</head>
<body id="page-top" style="background-image: url('<?php echo base_url('assets/login/img/intro-bg.jpg'); ?>');background-size: cover;">
    <div class="text-left flex-fill justify-content-center align-items-center align-content-center align-self-center login-card" style="background-color: rgba(247,247,247,0.51);">
    <h1 style="text-align:center; color:black">Si TeDi</h1>
    <img class="profile-img-card" src="<?php echo base_url('assets/login/img/avatar_2x.png'); ?>">
    <?php if(isset($error)) { echo $error; }; ?>    
    <p class="profile-name-card"> </p>
        <form class="form-signin" method="POST" action="<?php echo base_url() ?>index.php/login">
        <div class="form-group">
            <input class="form-control" type="text" name="username" required="" placeholder="Username" autofocus="">
            <?php echo form_error('username'); ?>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" required="" placeholder="Password">
            <?php echo form_error('password'); ?>
        </div>
            <button class="btn btn-primary btn-block btn-lg btn-signin"  name="btn-login" id="btn-login" type="submit">Sign in</button></form>
    <!-- <a class="forgot-password" href="login_reviewer">Login Sebagai Reviewer</a></div> -->
    <script src="<?php echo base_url ('assets/login/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url ('assets/login/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="<?php echo base_url ('assets/login/js/grayscale.js'); ?>"></script>
    
</body>

</html>