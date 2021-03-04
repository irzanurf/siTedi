<head>
    <link rel="stylesheet" href="<?= base_url('assets/profile/assets/css/Profile-Edit-Form-1.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/profile/assets/css/Profile-Edit-Form.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/profile/assets/css/styles.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/profile/assets/css/divider.css');?>">
    <link rel="stylesheet" href="<?= base_url('assets/profile/assets/menubar.css');?>">
</head>
    <body>

    <div class="container profile profile-view" id="profile">
    
        <div class="col-md-0">
        
        <div id="content">
  
       
        <div class="form-row profile-row">
                <div class="col-md-4 relative">
</br></br></br>
                    <div class="avatar">
                        <div class="text-center center"><img src="<?= base_url('assets/profile/assets/profile.png');?>" alt="profile" width="200" height="200" /></div>
                    </div>
                </div>
                <div class="col-md-8">
                
<nav id="nav" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
  <a style="display: none;" class="menu-slide" href="#"><i class="fa fa-list"></i> Menu</a>
  <ul class="nav kang-teja">
    <li class=""><a class="active" href="<?= base_url('/');?>"><span itemprop="name"><i class="fa fa-home"></i> Home</span></a></li>
    <li class=""><a href="<?php echo base_url('login/ganti_password'); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-edit"></i> Ganti Password</span></a></li>
    <li class=""><a class="deactive" href="<?php echo base_url('login/logout'); ?>" itemprop="url"><span itemprop="name"><i class="fa fa-sign-out"></i> Sign Out</span></a></li>
    
  </ul>
</nav>
                    <br><h1>Profile</h1>
                    
                    <hr>
                    <?php 
                        foreach($nama as $v) { ?>
                    <div class="form-group"><label>Nama</label><input class="form-control" type="text" name="nama" value="<?= $v->nama ?>" readonly></div>
                    <div class="form-group"><label>NIDN</label><input class="form-control" type="text" name="nidn" value="<?= $v->nip ?>" readonly></div>
                    <div class="form-group"><label>NIP</label><input class="form-control" type="text" name="nip" value="<?= $v->nomor_induk ?>" readonly></div>
                    <div class="form-group"><label>Departemen / Prodi</label><input class="form-control" type="text" name="program_studi" value="<?= $v->dep ?>" readonly></div>
                    <hr>
                    
                    <?php }?>
					
					
                </div>
            </div>
    </div>
    <script src="<?= base_url('assets/profile/assets/js/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/profile/assets/bootstrap/js/bootstrap.min.js');?>"></script>
    <script src="<?= base_url('assets/profile/assets/js/Profile-Edit-Form.js');?>"></script>
</body>