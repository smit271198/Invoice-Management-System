<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h3 class="panel-title">Payment Receipts</h3>
				<div class="heading-elements">
					<div class="form-group heading-form">
						<input type="text" name="search" id="search" class="form-control" placeholder="search...">
					</div>
					<form class="heading-form" action="<?php echo base_url('invoice/receipt/receipt_new');?>">
						<div class="form-group">
								<input type="submit" class="btn btn-primary" value="+ Create New Receipts">
							</label>
						</div>
					</form>
				</div>
								
			</div>


			<!--Panel content-->
			<div class = "container-fluid table-responsive">
				<table class="table table-hover">
					<thead class="thead-dark">
						<tr>
							<th>Invoice ID</th>
							<th>Customer Name</th>
							<th>Received Date</th>
							<th>Received Amount</th>
							<th>Payment Mode</th>
							<th>Details</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody id="listTable">
							<?php if(empty($item)):?>
								<tr>
									<td colspan="6"align="center">
										<h3>No Data Available</h3>
									</td>
								</tr>
							<?php endif ?>
							<?php foreach ($item as $res):?>
									<tr>
									<td><?php echo $res['InvoiceID'];?></td>
									<td><?php echo $res['Name']?></td>
									<td><?php echo  $res['Date']; ?> </td>
									<td><?php echo  $res['Amount']; ?> </td>
									<td><?php echo  $res['Mode']; ?> </td>
									<td><?php echo  $res['Details'] ; ?> </td>
									<td> 
										<a href="<?php echo base_url('invoice/receipt/receipt_id/'.$res['ID']);?>" title="Edit" >
											<i style="font-size: 24px;" class="text-success fa fa-edit"></i>
										</a>
										<a href="<?php echo base_url('invoice/receipt/receipt_del/'.$res['ID']);?>" title="delete" onclick="return confirm('Are you sure to delete this Payment Receipt ???')">
											<i class="material-icons text-danger">delete</i>
										</a>
									</td>
									</tr>
							<?php endforeach ?>
							
					</tbody>
									
				</table>
			</div>
			<!--Panel content-->

		</div>
		<!-- Add panel -->

	</div>
	<!-- Main area -->