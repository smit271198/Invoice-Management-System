<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">New Customer Group</h3>			
			</div>

			<!-- customer new form-->
			<div class="container-fluid">
			<div class="container-fluid">

				<form method="post" id="group_data" action="<?php echo base_url('invoice/customer_group/group_new_add');?>">
									
					<div class= "form-group">
						<label for="name">Group Name :</label>
						<input type="text" class="form-control" value="<?php echo set_value('name');?>" name="name" id="name" size="50"  placeholder="Enter Product/Service Name" />

						<?php echo form_error('name',"<lable class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class="table-responsive form-group">
						<label for="customer_list[]">Customer List</label>
						<table class="table table-hover">
							<thead class="thead-dark">
								<tr>
									<th></th>
									<th>Name </th>
									<th>GSTIN no</th>
									<th>PAN no</th>
								</tr>
							</thead>

							<tbody >
								<?php foreach ($item as $res):?>
									<tr>
										<td><input type="checkbox" name="customer_list[]" id="<?= $res['ID']?>" value="<?php echo $res['ID']?>"></td>
										<td><label for="<?= $res['ID']?>"><?php echo $res['Name'];?></label></td>
										<td><label for="<?= $res['ID']?>"><?php echo  $res['GSTIN_No']; ?></label> </td>
										<td><label for="<?= $res['ID']?>"><?php echo  $res['Pan_No']; ?></label></td>
									</tr>
								<?php endforeach ?>												
							</tbody>
						</table>
						<?php echo form_error('customer_list[]',"<lable class='text-danger text-bold'>","</label>"); ?>
					</div>
									
					<div class="form-group">
						<label for="details">Details :</label>
						<textarea class ='form-control' name="details" id="details" style="resize: none" rows="2" value="" size="50" /></textarea>
					</div>

					<div class ="form-group" align="center"><input type="submit" class ="btn btn-primary" value="Submit" /></div>
								
				</form>
			</div>
			</div>
			<!--customer new form-->

		</div>
		<!-- Add panel -->
						

	</div>
	<!-- Main area -->