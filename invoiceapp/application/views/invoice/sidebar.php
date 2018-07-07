<!-- Page container -->
<div class="page-container">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-main sidebar-default">
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="category-content">
						<div class="sidebar-user-material-content">
							<h4 style="color: white"><?= $details[0]['Name'];?></h4>
							<span class="text-size-small"><?= $details[0]['City']?></span>
						</div>
														
						<div class="sidebar-user-material-menu" align="center">
							<a><span>My account</span></a>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="sidebar-category sidebar-category-visible">
					<div class="category-content no-padding">
						<ul class="navigation navigation-main navigation-accordion">

							<!-- Main -->
							<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>	
							<li class="<?php if($active == "Dashboard") echo 'active';?>"><a href="<?php echo base_url('invoice/dashboard');?>"><i class="material-icons">home</i> <span>Dashboard</span></a></li>
								
							<li class="<?php if($active == "Customer") echo 'active';?>">
								<a href="<?php echo base_url('invoice/customer/cust_list');?>"><i class="material-icons">person</i> <span>Customer</span></a>
							</li>

							<li class="<?php if($active == "Categories") echo 'active';?>">
								<a href="<?php echo base_url('invoice/categories/categories_list')?>"><i class="material-icons">view_list</i> <span>Categories</span></a>
							</li>

							<li class="<?php if($active == "Product/Service") echo 'active';?>"><a href="<?php echo base_url('invoice/ps/ps_list');?>"><i class="material-icons">business_center</i> <span>Product/Service</span></a></li>

							<li class="<?php if($active == "Customer Groups") echo 'active';?>"><a href="<?php echo base_url('invoice/customer_group/group_list');?>"><i class="material-icons">group</i> <span>Customer Groups</span></a></li>

							<li class="<?php if($active == "Product Price") echo 'active';?>"><a href="<?php echo base_url('invoice/product_price/prod_price_list');?>"><i class="material-icons">attach_money</i> <span>Product Price</span></a></li>

							<li class="<?php if($active == "Invoice") echo 'active';?>"><a href="<?php echo base_url('invoice/invoice/invoice_list');?>"><i class="material-icons">credit_card</i> <span>Invoice</span></a></li>

							<li class="<?php if($active == "Payment Reminders") echo 'active';?>"><a href="<?php echo base_url('invoice/reminder/reminder_list');?>"><i class="material-icons">alarm</i> <span>Payment Reminders</span></a></li>

							<li class="<?php if($active == "Payment Receipts") echo 'active';?>"><a href="<?= base_url('invoice/receipt/receipt_list');?>"><i class="material-icons">description</i> <span>Payment Receipts</span></a></li>
							<!-- /main -->
						</ul>
					</div>
				</div>
				<!-- /main navigation -->

			</div>
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-default">
				<div class="page-header-content">
					<div class="page-title">
						<h4><span class="text-semibold">Home</span> - <?php echo $active;?></h4>
					</div>

					<div class="heading-elements">
						<div class="navbar-collapse collapse" id="navbar-mobile">
							<div class="navbar-right">
								<ul class="nav navbar-nav">				
									<li class="dropdown">
										<a href="index.html#" class="dropdown-toggle btn btn-link btn-float text-size-small has-text" data-toggle="dropdown" name = "reminder">
											<i class="icon-bell2" style="font-size: 25px"></i>
											<span>Reminders</span>
										</a>

										<div class="dropdown-menu dropdown-content">
											<div class="dropdown-content-heading jumbotron bg-primary" align="center">
												Payment Reminder
											</div>

											<ul class="media-list dropdown-content-body width-350" id="reminder_ajax">
												<li class="media">
												</li>
											</ul>
										</div>
									</li>					
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line">
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url('invoice/dashboard');?>"><i class="icon-home2 position-left"></i> Home</a></li>
						<li class="active"><?php echo $active;?></li>
					</ul>
				</div>
			</div>
			<!-- /page header -->