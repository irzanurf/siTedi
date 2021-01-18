<!-- <!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>


<div class="info_contact">
<h4>Change password regularly</h4>
<div class="content">
         <form method="post" action="ganti_password" >
<table class="input"><tr><td>Old Password</td><tr>
<tr><td class="input-width"><input type="password" name="old" value="<?php echo set_value('old');?>" required></td></tr>
<tr><td>New Password</td><tr>
<tr><td class="input-width"><input type="password" name="new" value="<?php echo set_value('new');?>"  required></td></tr>
<tr><td>Re-type New Password</td><tr>
<tr><td class="input-width"><input type="password" name="re_new" value="<?php echo set_value('re_new'); ?>" required></td></tr>
<tr><td>
<button type='submit' class='btn1' value='' >Save</button>
</td></tr>
</table>
</form>
</div>

</div>

</body>
</html> -->

<!DOCTYPE html>
 
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
</html>