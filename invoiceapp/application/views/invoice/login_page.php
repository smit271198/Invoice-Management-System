<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('invoice_style/assets/css/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url('invoice_style/assets/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('invoice_style/assets/css/core.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('invoice_style/assets/css/components.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('invoice_style/assets/css/colors.css'); ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url('invoice_style/assets/js/plugins/loaders/pace.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('invoice_style/assets/js/core/libraries/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('invoice_style/assets/js/core/libraries/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('invoice_style/assets/js/plugins/loaders/blockui.min.js'); ?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('invoice_style/assets/js/plugins/forms/styling/uniform.min.js'); ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('invoice_style/assets/js/core/app.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('invoice_style/assets/js/pages/login.js'); ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('invoice_style/assets/js/plugins/ui/ripple.min.js'); ?>"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container bg-slate-800">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<form action="<?= base_url('invoice/login/login_check'); ?>" method="post">
						<div class="panel panel-body login-form">

							
							<div class="text-center">
								<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" id="username" name="username" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<a style="text-decoration: none;color: gray">
									<i class="material-icons" style="float: right;position: relative;margin-top: -26px;opacity: 0.5;font-size: 20px" id="show_password">remove_red_eye</i>
								</a>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<?php if(!empty($error)): ?>
								<div class="form-group login-options">
									<label class="text-danger text-bold">Invalid Username or Password</label>
								</div>
							<?php endif ?>

							<div class="form-group">
								<button type="submit" class="btn bg-pink-400 btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
							</div>
						</div>
					</form>
					<!-- /advanced login -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#show_password').mousedown(function(){
			$('#password').attr('type','text');
		});
		$('#show_password').mouseup(function(){
			$('#password').attr('type','password');
		});
	});
</script>
