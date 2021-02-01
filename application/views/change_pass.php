<!-- <!DOCTYPE html>
 
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login and Registration form example</title>
 
<link rel="stylesheet"  href="login.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/change_pass.css');?>">
 
</head>
 
<body>
 
<div id="container">
<form action="ganti_password" method="post" >
 
<div class="border-box">
<h2>Ganti Kata Sandi</h2>
<div class="error">
<?= validation_errors() ?>
<?= $this->session->flashdata('error') ?>
</div>
<label for="upass" id="ps">Kata Sandi Lama</label>
<input type="password" name="old" value="<?php echo set_value('old');?>" required><br/>
 
<label for="upass" id="ps">Kata Sandi Baru</label>
<input type="password" name="new" value="<?php echo set_value('new');?>" required><br/>

<label for="upass" id="ps">Ulangi Kata Sandi</label>
<input type="password" name="re_new" value="<?php echo set_value('re_new'); ?>" required><br/>
 
<button type="submit" value="Login"  id="submit">Save</button>
 
</div>
 
</form>
</div>
 
</body>
</html> -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="<?php echo base_url ('assets/login/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="<?php echo base_url ('assets/login/css/Google-Style-Login.css'); ?>">
    
</head>

<body id="page-top" style="background-image: url('<?php echo base_url('assets/login/img/intro-bg.jpg'); ?>');background-size: cover;">
    <div class="text-left flex-fill justify-content-center align-items-center align-content-center align-self-center login-card" style="background-color: rgba(247,247,247,0.51);">
    
    <h1 style="text-align:center; color:black">Ganti Password</h1>
    <img class="profile-img-card" src="<?php echo base_url('assets/login/img/avatar_2x.png'); ?>">
    <?php if(isset($error)) { echo $error; }; ?>    
    <p class="profile-name-card"> </p>
    <p style='color:red'>
<?= validation_errors() ?>
<?= $this->session->flashdata('error') ?>
</p>
        <form class="form-signin" method="POST" action="<?php echo base_url() ?>login/ganti_password">
        <div class="form-group">
        <label for="upass" id="ps">Kata Sandi Lama</label>
            <input class="form-control" type="password" name="old" value="<?php echo set_value('old');?>" required>
           
        </div>
        <div class="form-group">
        <label for="upass" id="ps">Kata Sandi Baru</label>
            <input class="form-control" type="password" name="new" value="<?php echo set_value('new');?>" required>
            
        </div>
        <div class="form-group">
        <label for="upass" id="ps">Ulangi Kata Sandi</label>
            <input class="form-control" type="password" name="re_new" value="<?php echo set_value('re_new'); ?>" required>
            
        </div>
            <button class="btn btn-primary btn-block btn-lg btn-signin"  name="btn-login" id="btn-login" type="submit">Submit</button></form>
    <!-- <a class="forgot-password" href="login_reviewer">Login Sebagai Reviewer</a></div> -->
    <script src="<?php echo base_url ('assets/login/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url ('assets/login/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="<?php echo base_url ('assets/login/js/grayscale.js'); ?>"></script>
    
</body>

</html>