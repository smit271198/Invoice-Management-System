<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h3 class="panel-title">Invoice </h3>
				<div class="heading-elements">
					<div class="form-group heading-form">
						<input type="text" name="search_invoice" id="search_invoice" class="form-control" placeholder="search...">
					</div>
					<form class="heading-form" action="<?php echo base_url('invoice/invoice/invoice_new');?>">
						<div class="form-group">
								<input type="submit" class="btn btn-primary" value="+ New Invoice">
							</label>
						</div>
					</form>
				</div>
								
			</div>


			<!--Panel content-->
			<div class = "container-fluid table-responsive">
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th>Name</th>
							<th>Order No</th>
							<th>Product</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>GST (%)</th>
							<th>Subtotal</th>
							<th>Purchase Date</th>
							<th>Due Date</th>
							<th>Total Price</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody id="listTable">
						<?php if(empty($item[0])):?>
							<tr>
								<td colspan="10" align="center">
									<h3>No Data Available</h3>
								</td>
							</tr>
						<?php endif ?>
						<?php $j=1 ?>
						<?php foreach ($item[0] as $res0):?>
							<?php 
								$i = 0;
								$cnt=0;
								foreach ($item[1] as $res1) {
									if($res1['InvoiceID'] == $res0['InvoiceID'])
										$cnt++;
								}
								foreach ($item[1] as $res1) {
									$span = "rowspan = '".$cnt."'";
									if($res1['InvoiceID'] == $res0['InvoiceID']){
										echo "<tr class='filterName".$j."'>";
										if($i == 0){
											echo "<td ".$span." >".$res0['Name']."</td>";
											echo "<td ".$span.">".$res0['Order_No']."</td>";
										}
										echo "<td>".$res1['Product']."</td>";
										echo "<td>".$res1['Price']."</td>";
										echo "<td>".$res1['Quantity']."</td>";
										echo "<td>".$res1['GST']."</td>";
										echo "<td>".$res1['Subtotal']."</td>";
										if($i == 0){
											echo "<td ".$span.">".$res0['Date']."</td>";
											echo "<td ".$span.">".$res0['Duedate']."</td>";
											echo "<td ".$span.">".$res0['Total']."</td>";
											
											echo "<td ".$span."> ";
											echo "<a href='".base_url('invoice/invoice/invoice_id/'.$res0['InvoiceID'])."' title='edit' id='invoice_update' >";
												echo "<i style='font-size: 24px;' class='text-success fa fa-edit'></i>";
											echo "</a>";

											$msg = "confirm('Are you sure you want to delete invoice')";
											echo "<a href='".base_url('invoice/invoice/invoice_del/'.$res0['InvoiceID'])."' title='delete' onclick= \"javascript: return confirm('Are you sure you want to delete this Invoice');\">";
												echo "<i class='material-icons text-danger'>delete</i>";
											echo "</a>";
											echo "</td>";
										}
										echo "</tr>";
										$i++;
									}
								}
								$j++;
							?>
						<?php endforeach ?>
							
					</tbody>
									
				</table>
			</div>
			<!--Panel content-->

		</div>
		<!-- Add panel -->

	</div>
	<!-- Main area -->