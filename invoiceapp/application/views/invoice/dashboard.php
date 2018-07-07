<!-- Content area -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="card bg-white custom-shadow1" style="height: 270px;width: 200px;">
					<img class="card-img-top" src="<?= base_url('invoice_style/assets/images/demo/images/customer2.jpg');?>">
					<div class="card-body text-center">
						<h4 class="card-title">Customer</h4>
						<h6><?= $item[0]; ?></h6>
						<a href="<?= base_url('invoice/customer/cust_list')?>">
							<button class="btn btn-dark">Customer list</button>
						</a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="card bg-white custom-shadow2 text-center" style="height: 270px;width: 200px;">
					<img class="card-img-top" src="<?= base_url('invoice_style/assets/images/demo/images/product2.jpg');?>">
					<div class="card-body text-danger">
						<h4 class="card-title">Products/Services</h4>
						<h6><?= $item[1];?></h6>
						<a href="<?= base_url('invoice/ps/ps_list')?>">
							<button class="btn btn-danger">Product/Service list</button>
						</a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="card bg-white custom-shadow3 text-center" style="height: 270px;width: 200px;">
					<img class="card-img-top" src="<?= base_url('invoice_style/assets/images/demo/images/invoice.png');?>">
					<div class="card-body text-success">
						<h4 class="card-title">Invoice</h4>
						<h6><?= $item[2];?></h6>
						<a href="<?= base_url('invoice/invoice/invoice_list')?>">
							<button class="btn btn-success text-white">Invoice list</button>
						</a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="card bg-white custom-shadow4 text-center" style="height: 270px;width: 200px;">
					<img class="card-img-top" src="<?= base_url('invoice_style/assets/images/demo/images/receipt.jpg');?>">
					<div class="card-body text-primary">
						<h4 class="card-title">Payment</h4>
						<h6><?= $item[3];?></h6>
						<a href="<?= base_url('invoice/receipt/receipt_list')?>">
							<button class="btn btn-info text-white">Payment Receipts</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<style type="text/css">
		[class *= "col-"]{
			padding-top: .75rem;
			padding-bottom: .75rem;
		}

		[class *= "row"]{
			margin-bottom: 1em;
			justify-content: center
		}

		.custom-shadow1:hover{
  			box-shadow: 2px 2px 10px 5px #757575;
  		}
  		.custom-shadow2:hover{
  			box-shadow: 2px 2px 10px 5px #FF8A80;
  		}
  		.custom-shadow3:hover{
  			box-shadow: 2px 2px 10px 5px #B2FF59;
  		}
  		.custom-shadow4:hover{
  			box-shadow: 2px 2px 10px 5px #90CAF9;
  		}

		.card-img-top{
			height: 120px;
			width: 200px;
		}

		.btn-dark{
			background-color: #273746; /* Green */
			border: none;
			color: white;
			text-align: center;
		}

		.btn-dark:hover{
			background-color: #212F46;	
			color : white;
		}
	</style>
<?php $cnt=1; ?>
<?php foreach($item[4] as $res): ?>
	<?php if($res['Total'] > 0): ?>
		<?php 
			if(($cnt%2) == 1)
				echo "<div class='row'>";
		?>
		<div class="col-md-6">
			<div class="panel invoice-grid">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<h6 class="text-semibold no-margin-top"><?= $res['Name']?></h6>
							<ul class="list list-unstyled">
								<li>Invoice ID: <?= $res['InvoiceID']?></li>
								<li>Issued on: <span class="text-semibold"><?= $res['Date']?></span></li>
							</ul>
						</div>

						<div class="col-sm-6">
							<h6 class="text-semibold text-right no-margin-top">&#x20B9 <?= $res['Total']?></h6>
							<ul class="list list-unstyled text-right">
								<li class="dropdown">
									Status: &nbsp;
									<a href="invoice_grid.html#" class="label bg-danger-400">Remaining</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="panel-footer panel-footer-condensed">
					<div class="heading-elements">
						<span class="heading-text">
							<span class="status-mark border-danger position-left"></span> Due: <span class="text-semibold"><?= $res['Duedate'];?></span>
						</span>				
					</div>
				</div>
			</div>
		</div>
		<?php 
			if(($cnt%2) == 0)
				echo "</div>";
			$cnt++;
		?>
	<?php endif?>
<?php endforeach?>
