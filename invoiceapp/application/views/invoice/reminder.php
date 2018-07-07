<!-- Content area -->
<div class="content">

	<!-- Main area -->
	<div class="row">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h3 class="panel-title">Reminder</h3>
				<div class="heading-elements">
					<div class="form-group heading-form">
						<input type="text" name="search" id="search" class="form-control" placeholder="Search...">
					</div>
				</div>
			</div>

			<!-- Panel Content -->
			<div class="container-fluid table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Invoice ID</th>
							<th>Reminder Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="listTable">
						<?php if(empty($item)): ?>
							<tr>
								<td colspan="10" align="center"><h3>No data available</h3></td>
							</tr>
						<?php endif?>
						<?php foreach($item as $res):?>
							<tr>
								<td><?php echo $res['Name']; ?></td>
								<td><?php echo $res['InvoiceID']; ?></td>
								<td><?php echo $res['Duedate']; ?></td>
								<td>
									<a href="<?php echo base_url('invoice/reminder/reminder_id/'.$res['ID'])?>" title="Edit">
										<i class="fa fa-edit text-success" style="font-size:24px"></i>
									</a>
								</td>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
			<!-- /Panel Content -->
		</div>
	</div>
	<!-- /Main area -->
