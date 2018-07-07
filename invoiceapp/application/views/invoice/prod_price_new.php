<!-- content area -->
<div class="content">

	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">New Product Price</h3>			
			</div>

			<!-- new form-->
			<div class="container-fluid">
			<div class="container-fluid">

				<form method="post" id="product_price_data" action="<?php echo base_url('invoice/product_price/prod_price_new_add');?>">
					<div class="form-group">
						
						<div class="row">
							<div class="col-md-1">
								<label for="type">Type : </label>
							</div>
							<div class="col-md-3">
								<input type="radio" name="type" id="group" class="control-primary" value="Group"/>
								<label for="group">Group</label>
							</div>

							<div class="col-md-3">
								<input type="radio" name="type" id="customer" class="control-primary" value="Customer"/>
								<label for="customer">Customer</label>								
							</div>
						</div>
							
					</div>

					<div class="form-group">
						<label for="g_c_name">Name : </label>
						<select class="form-control" name="g_c_name" id="g_c_name">
							<option selected hidden>select</option>
						</select>
					</div>

					<div class="form-group table-responsive">
						<table class="table table-hover">
							<thead>
								<th class="col-md-4">Product</th>
								<th class="col-md-4">Price</th>
							</thead>
							<tbody id="product_price">
								<?php $id=0;  ?>
								<?php foreach($item as $res):?>
									<?php $id++; ?>
									<tr>
										<td>
											<input type="hidden" name="product[]" id="product<?= $id ;?>" value="<?= $res['Name']; ?>">
											<?= $res['Name']; ?>
											</td>
										<td>
											<input type="number" name="price[<?= $id?>]" id="price<?= $id?>" value="<?= $res['Price']?>" class="form-control" placeholder="Enter Price">
										</td>
									</tr>
								<?php endforeach?>
							</tbody>
						</table>
					</div>
						
					<div class ="form-group" align="center">
						<input type="submit" class ="btn btn-primary" value="Create" />
					</div>
								
				</form>
			</div>
			</div>
			<!-- new form-->

		</div>
		<!-- Add panel -->

	</div>
	<!-- Main area -->