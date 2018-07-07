<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						

		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">Edit Product/Service</h3>			
			</div>

			<!-- customer new form-->
			<div class="container-fluid">
			<div class="container-fluid">
				<?php foreach($item[0] as $res0) :?>
				<form method="post" id="ps_data" action="<?php echo base_url('invoice/ps/ps_update/'.$res0['ID']);?>">
					<div class= "form-group">
						<label for="categoryID">Category Name :</label>
						<select name="categoryID" id="categoryID" class="form-control">
							<?php 
								foreach($item[1] as $res1){
									echo "<option value='".$res1['CategoryID']."'";
									if($res0['CategoryID'] == $res1['CategoryID'])
										echo "selected";
									echo ">".$res1['Name']."</option>";
								}
							?>
						</select>
							<?php echo form_error('categoryID',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class= "form-group">
						<label for="name">Name :</label>
						<input type="text" class="form-control" value="<?php echo $res0['Name'];?>" name="name" id="name" size="50"  placeholder="Enter Product/Service Name" />
							<?php echo form_error('name',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="Price:">Price :</label>
									<input type="number" class ='form-control' value= "<?php echo $res0['Price']; ?>" name="price" id="price" value="" size="50" placeholder="Price in Rupees" >


									<?php echo form_error('price',"<label class='text-danger text-bold'>","</label>"); ?>
								</div>

								<div class="col-md-4">
									<label for="HSN_SAC">HSN_SAC Number :</label>
									<input type="text" name="HSN_SAC" id="HSN_SAC" class="form-control" value="<?php echo $res0['HSN_SAC'];?>" maxlength="8" size="50" placeholder="HSN_SAC Number" />

									<?php echo form_error('HSN_SAC',"<label class='text-danger text-bold'>","</label>"); ?>							
								</div>

								<div class="col-md-4">
									<label for="gst">GST(%)</label>
									<input type="number" class ='form-control' value= "<?php echo $res0['GST']; ?>" name="gst" id="gst" size="50" placeholder="GST in %">
									<?php echo form_error('gst',"<label class='text-danger text-bold'>","</label>"); ?>							

								</div>
							</div>
					</div>
						
					<div class="form-group">
						<label for="details">Details :</label>
						<textarea class ='form-control' name="details" id="details" style="resize: none" rows="2" value="" size="50" /><?php echo $res0['Details']; ?></textarea>
					</div>

					<div class ="form-group" align="center"><input type="submit" class ="btn btn-primary" value="update" /></div>
								
				</form>
			<?php endforeach?>
			</div>
			</div>
			<!--customer new form-->

		</div>
		<!-- Add panel -->

	</div>
	<!-- Main area -->