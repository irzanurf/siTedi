<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Getting Started</title>
    <link rel="stylesheet" href="<?php echo base_url ('assets/login_reviewer/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="<?php echo base_url ('assets/login_reviewer/css/Google-Style-Login.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/login_reviewer/css/dh-header-non-rectangular.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/login_reviewer/css/styles.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/login_reviewer/css/Header-Dark.css'); ?>">
</head>

<body style="background-image: url('<?php echo base_url('assets/login_reviewer/img/defocused-image-of-lights-255379.jpg'); ?>');">
    <div class="login-card"><img class="profile-img-card" src="<?php echo base_url('assets/login_reviewer/img/avatar_2x.png'); ?>">
        <p class="profile-name-card"> </p>
        <form class="form-signin" method="POST" action="<?php echo base_url() ?>index.php/login_reviewer">
        <div class="form-group">
            <input class="form-control" type="text" name="username" required="" placeholder="Username" autofocus="">
            <?php echo form_error('username'); ?>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" required="" placeholder="Password">
            <?php echo form_error('password'); ?>
        </div>
            <div class="checkbox">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Remember me</label></div>
            </div><button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" style="background-color: rgb(20,174,44);">Sign in</button></form><a class="forgot-password" href="#">Forgot your password?</a></div>
    <script src="<?php echo base_url ('assets/login_reviewer/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url ('assets/login_reviewer/bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>

</html>