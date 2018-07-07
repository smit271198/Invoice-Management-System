<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h3 class="panel-title">Categories</h3>
				<div class="heading-elements">
					<div class="form-group heading-form">
						<input type="text" name="search" id="search" class="form-control" placeholder="search...">
					</div>
					<form class="heading-form" action="<?php echo base_url('invoice/categories/categories_new');?>">
						<div class="form-group">
								<input type="submit" class="btn btn-primary" value="+ Add New Category">
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
							<th>Category ID </th>
							<th>Name </th>
							<th>Details</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody id="listTable">
							<?php if(empty($item)):?>
								<tr>
									<td colspan="4"align="center">
										<h3>No Data Available</h3>
									</td>
								</tr>
							<?php endif ?>
							<?php foreach ($item as $res):?>
								<tr>
									<td><?php echo $res['CategoryID'];?></td>										
									<td><?php echo $res['Name'];?></td>										
									<td><?php echo  $res['Details'] ; ?> </td>
									<td>
										<a href="<?php echo base_url('invoice/categories/categories_id/'.$res['CategoryID']);?>" title="Edit" >
											<i style="font-size: 24px;" class="text-success fa fa-edit"></i>
										</a>
										<a href="<?php echo base_url('invoice/categories/categories_del/'.$res['CategoryID']);?>" title="delete" onclick="return confirm('Are you sure to delete this Category???')">
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