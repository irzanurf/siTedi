<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Profile</title>
<link rel="shortcut icon" href="<?= base_url('assets/sitedi.png');?>" width="20" height="20">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?= base_url('assets/prof/css/bootstrap.css');?>">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?= base_url('assets/prof/css/style.css');?>" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?= base_url('assets/prof/css/font.css');?>" type="text/css"/>
<link href="<?= base_url('assets/prof/css/font-awesome.css');?>" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="<?= base_url('assets/prof/js/jquery2.0.3.min.js');?>"></script>
<script src="<?= base_url('assets/prof/js/modernizr.js');?>"></script>
<script src="<?= base_url('assets/prof/js/jquery.cookie.js');?>"></script>
<script src="<?= base_url('assets/prof/js/screenfull.js');?>"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
<!-- charts -->
<script src="<?= base_url('assets/prof/js/raphael-min.js');?>"></script>
<script src="<?= base_url('assets/prof/js/morris.js');?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/prof/css/morris.css');?>">
<!-- //charts -->
<!--skycons-icons-->
<script src="<?= base_url('assets/prof/js/skycons.js');?>"></script>
<!--//skycons-icons-->
</head>
<body class="dashboard-page">
	<script>
	        var theme = $.cookie('protonTheme') || 'default';
	        $('body').removeClass (function (index, css) {
	            return (css.match (/\btheme-\S+/g) || []).join(' ');
	        });
	        if (theme !== 'default') $('body').addClass(theme);
        </script>
        
	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<section class="title-bar">
			<div class="logo">
				<h1><img src="<?= base_url('assets/undip.png');?>" alt="logo" width="60" height="70" /><a href="<?= base_url('/');?>"><br>Profile</a></h1>
			</div>
			
			
			<div class="header-right">
				<div class="profile_details_left">
					
				<div class="profile_details">		
					<ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="<?= base_url('login/profile/');?>">
                               <p>Profile</p>
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('dosen/penelitian/logout');?>">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
							</li>
						</ul>
					</div>
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
					
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</section>