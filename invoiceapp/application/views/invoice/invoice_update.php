<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">Edit Invoice</h3>			
			</div>

			<!-- new form-->
			<div class="container-fluid">
			<div class="container-fluid">
				<?php foreach($item[0] as $res0):?>
				<form method="post" id="invoice_data" action="<?php echo base_url('invoice/invoice/invoice_update/'.$res0['InvoiceID']);?>">

					<div class="form-group">
						<label for="invoiceID">Invoice ID : </label>
						<input type="text" name="invoiceID" id="invoiceID" class="form-control" readonly="readonly" value="<?= $res0['InvoiceID']?>">
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="customer_name">Name : </label>
								<select class="form-control" name="customer_name" id="customer_name">
									<option value="" selected disabled hidden>select</option>
									<?php 
										foreach($item[1] as $res1){
											echo "<option value='".$res1['Name']."'";
											if($res0['Name'] == $res1['Name'])
												echo "selected";
											echo ">".$res1['Name'];
											echo "</option>";
										}
									?>
								</select>
							</div>
							<div class="col-md-6">
								<label for="purchase">Purchase Order No.</label>
								<input type="text" name="purchase" id="purchase" class ="form-control" placeholder="Enter Purchase Orsder no." value="<?php echo $res0['Order_No']?>">
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
							<?php 
								$i = 1;
								foreach ($item[3] as $res3) {
									echo "<tr id='row".$i."'>";
										echo "<td>";
											echo"<select class='form-control' name='product_change[".$i."]' id='product_change".$i."'>";
												foreach ($item[2] as $res2) {
													echo "<option value='".$res2['Name']."'";
													if($res3['Product'] == $res2['Name'])
														echo "selected";
													echo ">".$res2['Name'];
													echo "</option>";
												}
												echo"</select>";
										echo "</td>";

										echo "<td>";
											echo "<input type='number' name='price[".$i."]'' id='price".$i."' class ='form-control' value=".$res3['Price']." placeholder='Price in Rupees'>";
										echo "</td>";

										echo "<td>";
											echo "<input type='number' class ='form-control' name='quantity[".$i."]' id='quantity".$i."' value=".$res3['Quantity']." size='50' placeholder='Enter Purchase Quantity'>";
										echo "</td>";

										echo "<td>";
											echo "<input type='text' class ='form-control' value='".$res3['GST']."' name='gst[".$i."]' id='gst".$i."' size='50' placeholder='GST' Percentage(%)' readonly='readonly'>";
										echo "</td>";

										echo "<td>";
											echo"<input type='number' class ='form-control' value='".$res3['Subtotal']."' name='subtotal[".$i."]' id='subtotal".$i."' size='50' readonly='readonly'>";
										echo "</td>";

										echo "<td>";
										if($i != 1){
											echo "<a name='remove' class='remove' id='".$i."' title='remove'><i class='material-icons' style='font-size:20px;color:red' >clear</i></a>";
										}
										echo "</td>";
									echo "</tr>";
									$i++;
								}
							?>
							</tbody>
						</table>
					</div>

					<div class="form-group">
						<button type="button" id="dynamically_add_update" class="btn btn-secondary">Add Product</button>
						<button type="button" id="product_add" class="btn btn-secondary" data-toggle="modal" data-target="#product_modal">Add New Product</button>
					</div>

					<script type="text/javascript" src="<?php echo base_url('invoice_style/assets/js/core/libraries/jquery.min.js');?>"></script>
					<script type="text/javascript">
						var res,cnt;
						$(window).on("load",function(){
							cnt = <?php echo $i-1;?>;
							$.ajax({
								url  : "<?php echo base_url('invoice/invoice/change_product');?>",
								type : "POST",
								cache : false,
								success : function(response){
									res = response;
									for(var j=2;j<=cnt;j++){
										$('#product_change'+j).change(function(){
											var idName = $(this).attr('id');
											var id = idName[idName.length - 1];
											var selectproduct = $(this).val();
											var selectname = $('#customer_name').val();
											var qty = $('#quantity'+id).val();
											$.ajax({
												url  : "<?php echo base_url('invoice/invoice/change_price');?>",
												type : "POST",
												cache : false,
												dataType : "json",
												data : {selectproduct : selectproduct, 
														selectname : selectname
													},
												success : function(response){
													$("#price"+id).val(response.price);
													$('#gst'+id).val(response.gst);
													var subtotal = (response.price*qty)+((response.price*qty*response.gst)/100);
													$("#subtotal"+id).val(subtotal);

													var total = 0;
													for(var i=1;i<=cnt;i++){
														if(!isNaN($('#subtotal'+i).val()))
															total += parseFloat($("#subtotal"+i).val());
													}
													$("#total").val(total);
												}
											});
										});

									$('#product_change'+j).rules('add',{
										'required' : true,
										'messages':{
											required : "Please select Product"
										}
									});
									$('#price'+j).rules('add',{
										'required' : true,
										'min' : 0,
										'messages':{
											required : "Please enter Price"
										}
									});
									$('#quantity'+j).rules('add',{
										'required' : true,
										'min' : 1,
										'messages':{
											required : "Please enter quantity"
										}
									});

									$("#quantity"+j+",#price"+j).on("change input",function(){	/*to chnge price*/
										var idName = $(this).attr('id');
										var id = idName[idName.length - 1];
										var qty = $("#quantity"+id).val();
										var gst = $('#gst'+id).val();
										var price = $('#price'+id).val();
										var subtotal = (price*qty)+((price*qty*gst)/100);
										$('#subtotal'+id).val(subtotal);

										var total = 0;
										for(var i=1;i<=cnt;i++){
											if(!isNaN($('#subtotal'+i).val()))
												total += parseFloat($("#subtotal"+i).val());
										}
										$("#total").val(total);
									});
									}
								}
							});
						});

						$(document).on("click","#dynamically_add_update",function(){		/* dynamically add product field*/
							cnt++;
							var html = '<tr id="row'+cnt+'">';
							html += '<td><div id="product_ajax"><select class="form-control" name="product_change['+cnt+']" id="product_change'+cnt+'"><option value="" disabled selected hidden>select</option>'+res+'</div></td>';

							html += '<td><input type="number" name="price['+cnt+']" id="price'+cnt+'" class="form-control" size="50" placeholder="Enter Price in Rupees" /></td>';

							html += '<td><input type="number" class ="form-control" value= "1" name="quantity['+cnt+']" id="quantity'+cnt+'" size="50" placeholder="Enter Purchase Quantity"></td>';

							html += '<td><input type="text" class ="form-control" value="0" name="gst['+cnt+']" id="gst'+cnt+'" size="50" placeholder="GST Percentage(%)" readonly="readonly">';

							html += '<td><input type="number" class ="form-control" value="0" name="subtotal['+cnt+']" id="subtotal'+cnt+'" size="50" readonly="readonly"></td>';

							html += '<td><a name="remove" class="remove" id="'+cnt+'" title="remove"><i class="material-icons" style="font-size:20px;color:red">clear</i></a></td>';

							html += '</tr>';

							$('#hidden_invoice').val(cnt);

							$("#dynamic_field").append(html);

							$('#product_change'+cnt).rules('add',{
								'required' : true,
								'messages':{
									required : "Please select Product"
								}
							});
							$('#price'+cnt).rules('add',{
								'required' : true,
								'min' : 0,
								'messages':{
									required : "Please enter Price"
								}
							});
							$('#quantity'+cnt).rules('add',{
								'required' : true,
								'min' : 1,
								'messages':{
									required : "Please enter quantity"
								}
							});

							$('#product_change'+cnt).change(function(){
								var idName = $(this).attr('id');
								var id = idName[idName.length - 1];
								var selectproduct = $(this).val();
								var selectname = $('#customer_name').val();
								var qty = $('#quantity'+id).val();
								$.ajax({
									url  : "<?php echo base_url('invoice/invoice/change_price');?>",
									type : "POST",
									cache : false,
									dataType : "json",
									data : {selectproduct : selectproduct, 
											selectname : selectname
										},
									success : function(response){
										$("#price"+id).val(response.price);
										$('#gst'+id).val(response.gst);
										var subtotal = (response.price*qty)+((response.price*qty*response.gst)/100);
										$("#subtotal"+id).val(subtotal);

										var total = 0;
										for(var i=1;i<=cnt;i++){
											if(!isNaN($('#subtotal'+i).val()))
												total += parseFloat($("#subtotal"+i).val());
										}
										$("#total").val(total);
									}
								});
							});

							$("#quantity"+cnt+",#price"+cnt).on("change input",function(){	/*to chnge price*/
								var idName = $(this).attr('id');
								var id = idName[idName.length - 1];
								var qty = $("#quantity"+id).val();
								var gst = $('#gst'+id).val();
								var price = $('#price'+id).val();
								var subtotal = (price*qty)+((price*qty*gst)/100);
								$('#subtotal'+id).val(subtotal);

								var total = 0;
								for(var i=1;i<=cnt;i++){
									if(!isNaN($('#subtotal'+i).val()))
										total += parseFloat($("#subtotal"+i).val());
								}
								$("#total").val(total);
							});	

						});
					</script>

					<div class="form-group">
						<label for="description">Product Description : </label>
						<textarea name="description" id="description" class="form-control" row="2" style="resize: none"><?php echo $res0['Description']?></textarea>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="date"> Purchase date : </label>
								<input type="date" id="date" name = "date" class="form-control" value="<?php echo $res0['Date']?>">
							</div>

							<div class="col-md-6">
								<label for="duedate">Payment due date : </label>
								<input type="date" id="duedate" name = "duedate" class="form-control" min="<?php echo date('Y-m-d');?>" value="<?php echo $res0['Duedate']?>">
								
								<?php echo form_error('duedate',"<label class='text-danger text-bold'>","</label>"); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="total">Total Price :</label>
						<input type="text" name ="total" id="total" value="<?php echo $res0['Total']?>" readonly="readonly" class="form-control" >
					</div>

					<input type="hidden" name="hidden_invoice" id="hidden_invoice" value="<?php echo $i-1?>">

					<script type="text/javascript">
						document.getElementById('date').onchange = function(){
							document.getElementById('duedate').setAttribute('min',this.value);
						}
					</script>

					<div class ="form-group" align="center"><input type="submit" class ="btn btn-primary" value="update" /></div>
				</form>
				<?php endforeach?>


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
										<?php foreach($item[4] as $res4):?>
											<option value="<?php echo $res4['CategoryID'];?>">
												<?php echo $res4['Name']?>
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
			<!-- new form-->

		</div>
		<!-- Add panel -->


	</div>
	<!-- Main area -->