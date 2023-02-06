<html>
	<head>
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login-page.css?v1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/nav.css?v1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register.css?v1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/admin_portal.css?v1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ticket_portal.css?v1">
	</head>
	<body>
<div class="navbar">
	 <a href="<?php echo base_url()?>service/">TicketPortal</a>
	 <?php $a=$this->session->userdata('isloggedIn');?>
	 <?php if($a){?>
	 <a href="<?php echo base_url()?>service/logout">Logout</a>
	 <?php
	}else{
?>
	<a href="<?php echo base_url()?>service/">Login</a>
	<?php }
	?>
</div>