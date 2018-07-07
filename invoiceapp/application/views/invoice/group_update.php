<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">Edit Customer Group</h3>			
			</div>

			<!-- customer new form-->
			<div class="container-fluid">
			<div class="container-fluid">
				<?php foreach($item[0] as $res0): ?>
				<form method="post" id="group_data" action="<?php echo base_url('invoice/customer_group/group_update/'.$res0['ID']);?>">
					<div class= "form-group">
						<label for="name">Group Name :</label>
						<input type="text" class="form-control" value="<?php echo $res0['Name'];?>" name="name" id="name" size="50" placeholder="Enter Group Name" />
							<?php echo form_error('name',"<lable class='text-danger text-bold'>","</label>"); ?>
					</div>
					<div class="table-responsive form-group">
						<label for="name">Customer Name :</label>
						<table class="table table-hover">
							<thead>
								<tr>
									<th></th>
									<th>Name</th>
									<th>GSTIN No.</th>
									<th>PAN No.</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach($item[1] as $res1){
										echo "<tr>";
											echo "<td><input type='checkbox' name='customer_list[]' id='".$res1['Pan_No']."' value='". $res1['Pan_No']."' checked></td>";
											echo "<td><label for='".$res1['Pan_No']."'>".$res1['Name']."</label></td>";
											echo "<td><label for='".$res1['Pan_No']."'>".$res1['GSTIN_No']."</label></td>";
											echo "<td><label for='".$res1['Pan_No']."'>".$res1['Pan_No']."</label></td>";
										echo "</tr>";
									}
									foreach($item[2] as $res2){
										echo "<tr>";
											echo "<td><input type='checkbox' name='customer_list[]' id='".$res2['Pan_No']."' value='". $res2['Pan_No']."'></label></td>";
											echo "<td><label for='".$res2['Pan_No']."'>".$res2['Name']."</label></td>";
											echo "<td><label for='".$res2['Pan_No']."'>".$res2['GSTIN_No']."</label></td>";
											echo "<td><label for='".$res2['Pan_No']."'>".$res2['Pan_No']."</label></td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
						<?php echo form_error('customer_list[]',"<lable class='text-danger text-bold'>","</label>"); ?>

					</div>
					<div class="form-group">
						<label for="details">Details :</label>
						<textarea class ='form-control' name="details" id="details" style="resize: none" rows="2" value="" size="50" /><?php echo $res0['Details']; ?></textarea>
					</div>

					<div class ="form-group" align="center"><input type="submit" class ="btn btn-primary" value="update" /></div>
								
				</form>
				<?php endforeach ?>
			</div>
			</div>
			<!--customer new form-->

		</div>
		<!-- Add panel -->

	</div>
	<!-- Main area -->