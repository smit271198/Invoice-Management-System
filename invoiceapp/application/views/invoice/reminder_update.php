<!-- Content area -->
<div class="content">

	<!-- Main area -->
	<div class="row">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h3 class="panel-title">Reminder</h3>
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
					<tbody>
						<?php if(empty($item)): ?>
							<tr>
								<td colspan="10" align="center"><h3>No data available</h3></td>
							</tr>
						<?php endif?>
						<?php foreach($item[0] as $res):?>
							<tr>
								<td><?php echo $res['Name']; ?></td>
								<td><?php echo $res['InvoiceID']; ?></td>
								<?php if($res['ID'] == $item[1]):?>
								<td>
									<form id="reminder_data" action="<?php echo base_url('invoice/reminder/reminder_update/'.$item[1]); ?>" method="post">
										<input type="date" name="setdate" id="setdate" class="form-control" value="<?php echo $res['Duedate']; ?>" min="<?php echo $res['Date']; ?>">
										<label class="text-danger text-bold" id="dateError" style="display: none">Please enter date</label>
									</form>
								</td>
								<td>
									<input type="submit" id="reminder" class="btn btn-primary" value="Set" form="reminder_data">
								</td>
								</form>
								<?php else: ?>
									<td><?php echo $res['Duedate']; ?></td>
									<td>
										<a href="<?php echo base_url('invoice/reminder/reminder_id/'.$res['ID'])?>" title="Edit">
											<i class="fa fa-edit text-success" style="font-size:24px"></i>
										</a>
									</td>
								<?php endif ?>
							</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
			<!-- /Panel Content -->
		</div>
	</div>
	<!-- /Main area -->
