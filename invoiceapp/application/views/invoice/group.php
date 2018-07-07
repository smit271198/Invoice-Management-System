<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h3 class="panel-title">Customer Groups</h3>
				<div class="heading-elements">
					<div class="form-group heading-form">
						<input type="text" name="search" id="search" class="form-control" placeholder="search...">
					</div>
					<form class="heading-form" action="<?php echo base_url('invoice/customer_group/group_new');?>">
						<div class="form-group">
								<input type="submit" class="btn btn-primary" value="+ Create New Group">
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
							<th>Group Name </th>											
							<th>Customer Name</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody id="listTable">

							<?php if(empty($item[1])):?>
								<tr>
									<td colspan="3"align="center">
										<h3>No Data Available</h3>
									</td>
								</tr>
							<?php endif ?>
							<?php foreach ($item[1] as $res):?>
									<tr>
									<td><?php echo $res['Name'];?></td>
									<td>
										<?php 
															foreach($item[0] as $data){									
																if($data['Name'] == $res['Name'])
																	echo $data['Cust_Name']."<br/>";
															}
														?>
									</td>
									<td> 
										<a href="<?php echo base_url('invoice/customer_group/group_id/'.$res['ID']);?>" title="Edit" >
											<i style="font-size: 24px;" class="text-success fa fa-edit"></i>
										</a>
										<a href="<?php echo base_url('invoice/customer_group/group_del/'.$res['ID']);?>" title="delete" onclick="return confirm('Are you sure to delete this Group???')">
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