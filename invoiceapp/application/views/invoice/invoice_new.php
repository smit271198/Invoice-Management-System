<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">New Invoice</h3>			
			</div>

			<!-- customer new form-->
			<div class="container-fluid">
			<div class="container-fluid">

				<form method="post"  id="invoice_data" action="<?php echo base_url('invoice/invoice/invoice_new_add');?>">
					<div class="form-group">
						<label for="invoiceID">Invoice ID : </label>
						<input type="text" name="invoiceID" id="invoiceID" class="form-control" value="<?= $item[2]?>" readonly="readonly">
					</div>

					<div class= "form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="customer_name">Select Name :</label>
								<select class="form-control" name="customer_name" id="customer_name">
									<option value="" disabled selected hidden>Select</option>
									<?php foreach($item[0] as $res0):?>
										<option value="<?php echo $res0['Name'];?>">
											<?php echo $res0['Name'];?>
										</option>
									<?php endforeach?>
								</select>
							</div>
							<div class="col-md-6">
								<label for="purchase">Purchase Order No :</label>
								<input type="text" name="purchase" id="purchase" class="form-control" size="6" placeholder="Enter Purchase Order No" />
							</div>
						</div>
					</div>					

					<div class="table-responsive">
						<table class="table" id="dynamicTable">
							<thead>
								<th class="col-md-4">Product</th>
								<th class="col-md-2">Price</th>
								<th class="col-md-2">Quantity</th>
								<th class="col-md-1">GST(%)</th>
								<th class="col-md-2">Total</th>
								<th class="col-md-1"></th>
							</thead>
							<tbody id="dynamic_field">
								<tr>
									<td>
										<div id="product_ajax">
											<select class="form-control" name="product_change[1]" id="product_change1">
												<option value="" disabled selected hidden>Select</option>
											</select>
										</div>
									</td>
									<td>
										<input type="number" name="price[1]" id="price1" class="form-control"  size="50" placeholder="Enter Price in Rupees" />
									</td>
									<td>
										<input type="number" class ='form-control' value= "1" name="quantity[1]" id="quantity1" size="50" placeholder="Enter Purchase Quantity">
									</td>
									<td>
										<input type="text" class ='form-control' value="0" name="gst[1]" id="gst1" size="50" placeholder="GST Percentage(%)" readonly="readonly">
									</td>
									<td>
										<input type="number" class ='form-control' value="0" name="subtotal[1]" id="subtotal1" size="50" readonly="readonly">
									</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="form-group">
						<button type="button" id="dynamically_add" class="btn btn-secondary">Add Product</button>
						<button type="button" id="product_add" class="btn btn-secondary" data-toggle="modal" data-target="#product_modal">Add New Product</button>
					</div>

					<div class="form-group">
						<label for="description">Product Description :</label>
						<textarea class ='form-control' id="description" name="description" style="resize: none" rows="2" value="" size="50" /></textarea>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="date">Purchase Date :</label>
								<input type="date" class ='form-control' name="date" id="date" value="<?= date('Y-m-d');?>">
							</div>

							<div class="col-md-6">
								<label for="duedate">Payment Due Date :</label>
								<input type="date" class ='form-control' name="duedate" id="duedate" min="<?php echo date('Y-m-d'); ?>">
							</div>
						</div>
					</div>

					<script type="text/javascript">
						document.getElementById('date').onchange = function(){
							document.getElementById('duedate').setAttribute('min', this.value);
						};
					</script>
					<input type="hidden" name="hidden_invoice" id="hidden_invoice" value="1">
					<div class="form-group">
						<label for="total">Total Price:</label>
						<input type="number" name="total" id="total" value="0" class="form-control" size="6" readonly="readonly" />
					</div>

					<div class ="form-group" align="center"><input type="submit" class ="btn btn-primary" value="Submit" /></div>
								
				</form>

				<!-- Modal for New Product -->
				<div class="modal fade" id="product_modal">
				    <div class="modal-dialog">
				    	<div class="modal-content">
				      		<form method="post">
					    	<!-- Modal Header -->
					    	<div class="modal-header" align="center">
					        	<h2 class="modal-title">New Product</h2>
					        	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        
					    	<!-- Modal body -->
					    	<div class="modal-body">
					         	<div class="form-group">
					         		<label for="categoryID">Category Name : </label>
					         		<select class="form-control" name="categoryID" id="modal_categoryID" required="required">
					         			<option value="" disabled selected hidden>Select</option>
										<?php foreach($item[1] as $res1):?>
											<option value="<?php echo $res1['CategoryID'];?>">
												<?php echo $res1['Name']?>
											</option>
										<?php endforeach?>
					         		</select>
					         	</div>

					         	<div class= "form-group">
									<label for="name">Name :</label>
									<input type="text" class="form-control" name="name" id="modal_name" size="50" required="required" placeholder="Enter Product/Service Name" />
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="price">Price :</label>
											<input type="text" class ="form-control" name="price" id="modal_price" size="50" placeholder="Price in Rupees" required="required">

										</div>

										<div class="col-md-4">						
											<label for="HSN_SAC">HSN_SAC Number :</label>
											<input type="text" name="HSN_SAC" id="modal_HSN_SAC" class="form-control" maxlength="8" size="50" required="required" placeholder="HSN_SAC Number" />

										</div>

										<div class="col-md-4">
											<label for="gst">GST(%)</label>
											<input type="text" class ='form-control' name="gst" id="modal_gst" size="50" required="required" placeholder="GST in %">
										</div>
									</div>
								</div>
						
								<div class="form-group">
									<label for="details">Details :</label>
									<textarea class ='form-control' style="resize:none" name="details" id="modal_details" rows="2" size="50" /></textarea>
								</div>

								<div class ="form-group" align="center"><input type="button" id="modal_submit" class ="btn btn-primary" value="Submit" data-dismiss = "modal" /></div>

					    	</div>
					    	</form>				        
					       
				      	</div>
				    </div>
				</div>
				<!-- Modal for New Product -->

			</div>
			</div>
			<!--customer new form-->

		</div>
		<!-- Add panel -->

	</div>
	<!-- Main area -->