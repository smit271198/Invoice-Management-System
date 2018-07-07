<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">Edit Product Price</h3>			
			</div>

			<!-- new form-->
			<div class="container-fluid">
			<div class="container-fluid">

				<?php foreach($item[0] as $res0):?>
				<form method="post" id="product_price_data" action="<?php echo base_url('invoice/product_price/prod_price_update/'.$res0['ID']);?>">				
					<div class="form-group">
						
						<div class="row">
							<div class="col-md-1">
								<label for="type">Type : </label>
							</div>
							<div class="col-md-3">
								<input type="radio" name="type" id="group" class="control-primary" value="Group" <?php if($res0['Type'] == "Group") echo "checked";?>/>
								<label for="group">Group</label>
							</div>

							<div class="col-md-3">
								<input type="radio" name="type" id="customer" class="control-primary" value="Customer" <?php if($res0['Type'] == "Customer") echo "checked";?> />
								<label for="customer">Customer</label>								
							</div>
						</div>
							
					</div>

					<div class="form-group">
						<label for="g_c_name">Name : </label>
						<select class="form-control" name="g_c_name" id="g_c_name">
							<?php
								foreach ($item[2] as $res2) {
									echo "<option value = '".$res2['Name']."'";
									if($res0['Name'] == $res2['Name']){
										echo "selected";
									}
									echo ">".$res2['Name'];
									echo "</option>";
								}
							?>
						</select>
					</div>


					<div class="table-responsive form-group">
						<table class="table table-hover">
							<thead>
								<th class="col-md-4">Product</th>
								<th class="col-md-4">Price</th>
								<th class="col-md-2"></th>
							</thead>
							<tbody id="dynamic_products">
								<?php
								$priceId=0;
									foreach($item[1] as $res1) {
										$priceId++;
										echo "<tr>";
										echo "<td><input type='hidden' name='product[]' id='product".$priceId."' value='".$res1['Product']."'>".$res1['Product']."</td>";
										echo "<td><input type='number' name='price[".$priceId."]' id='price".$priceId."' value='".$res1['Price']."' placeholder='Enter Price' class='form-control'></td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>

					<div class ="form-group" align="center">
						<input type="submit" class ="btn btn-primary" value="update" />
					</div>
								
				</form>
				<?php endforeach?>
			</div>
			</div>
			<!-- new form-->

		</div>
		<!-- Add panel -->


	</div>
	<!-- Main area -->