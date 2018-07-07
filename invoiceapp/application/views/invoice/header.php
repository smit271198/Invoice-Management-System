<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->helper('url');?>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<title>Online Invoice Management</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('invoice_style/assets/css/icons/icomoon/styles.css');?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('invoice_style/assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('invoice_style/assets/css/core.css');?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('invoice_style/assets/css/components.css');?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('invoice_style/assets/css/colors.css');?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<div class="navbar-right">
				<p class="navbar-text"><a href="<?= base_url('invoice/login/logout');?>" title="logout"><span class="label bg-success-400">Logout</span></a></p>
			</div>
		</div>
	</div>
	<!-- /main navbar -->
