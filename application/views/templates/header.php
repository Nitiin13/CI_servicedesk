<html ng-app="myApp">
	<head>
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
 <script src="<?php echo base_url();?>js/scripts.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.3.2/angular-ui-router.min.js">
    </script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login-page.css?v1" media="all">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/nav.css?v1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register.css?v1" media="all">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/admin_portal.css?v1" media="all">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ticket_portal.css?v1" media="all">
	<base href="<?php echo base_url(); ?>service">
	</head>
	<header>
<div class="navbar" ng-controller="headController">
	<div class="logo-container"><img src="<?php echo base_url()?>assets/logo.png"  alt="logo"></div>
	<div class="nav-links">
	 <?php $a=$this->session->userdata('isloggedIn');?>
	 <?php if($a){?>
	 <a ng-click="logout()">Logout</a>
	 <?php
	}else{
?>
<a href="<?php echo base_url()?>service/">Home</a>
<a href="#">About</a>
	<a href="<?php echo base_url()?>service/">SignIn</a>
	<a ng-click="register()">SignUp</a>
	<?php }
	?>
</div>
</div>
</header>