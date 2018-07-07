<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h3 class="panel-title">Price List</h3>
				<div class="heading-elements">
					<div class="form-group heading-form">
						<input type="text" name="search_product_price" id="search_product_price" class="form-control" placeholder="search...">
					</div>
					<form class="heading-form" action="<?php echo base_url('invoice/product_price/prod_price_new');?>">
						<div class="form-group">
								<input type="submit" class="btn btn-primary" value="+ Create Price List">
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
							<th>Type</th>
							<th>Name </th>
							<th>Product</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody id="listTable">
						<?php if(empty($item[0])):?>
							<tr>
								<td colspan="5" align="center">
									<h3>No Data Available</h3>
								</td>
							</tr>
						<?php endif ?>
						<?php $j=1; ?>
						<?php foreach ($item[0] as $res0):?>
							<?php 
								$i = 0;
								$cnt=0;
								foreach ($item[1] as $res1) {
									if($res1['ID'] == $res0['ID'])
										$cnt++;
								}
								foreach ($item[1] as $res1) {
									$span = "rowspan = '".$cnt."'";
									if($res1['ID'] == $res0['ID']){
										echo "<tr class='filterName".$j."'>";
										if($i==0){
											echo "<td ".$span.">".$res0['Type']."</td>";
											echo "<td ".$span.">".$res0['Name']."</td>";			
										}
										echo "<td>".$res1['Product']."</td>";
										echo "<td>".$res1['Price']."</td>";
										if($i == 0){
											echo "<td ".$span.">"; 
											echo "<a href='".base_url('invoice/product_price/prod_price_id/'.$res0['ID'])."'title='Edit' >";
											echo "<i style='font-size: 24px;' class='text-success fa fa-edit'></i>";
											echo "</a>";
											echo "<a href='".base_url('invoice/product_price/prod_price_del/'.$res0['ID'])."' title='delete' onclick=\"javascript: return confirm('Are you sure to Delete this Price List???')\">";
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
