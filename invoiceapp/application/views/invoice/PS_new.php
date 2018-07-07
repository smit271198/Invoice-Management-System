<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						

		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">New Product/Service</h3>			
			</div>

			<!-- customer new form-->
			<div class="container-fluid">
			<div class="container-fluid">

				<form method="post" id="ps_data" action="<?php echo base_url('invoice/ps/ps_new_add');?>">
					<div class= "form-group">
						<label for="categoryID">Category Name :</label>
						<select name="categoryID" id="categoryID" class="form-control">
							<option value="" disabled selected hidden>select</option>
							<?php foreach($item as $res) : ?>
								<option value="<?php echo $res['CategoryID'];?>"><?php echo $res['Name']?></option>
							<?php endforeach?>
						</select>
							<?php echo form_error('categoryID',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class= "form-group">
						<label for="name">Name :</label>
						<input type="text" class="form-control" value="<?php echo set_value('name');?>" name="name" id="name" size="50"  placeholder="Enter Product/Service Name" />
							<?php echo form_error('name',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<label for="Price:">Price :</label>
									<input type="number" class ='form-control' value= "<?php echo set_value('price'); ?>" name="price" id="price" value="" size="50" placeholder="Price in Rupees" >


									<?php echo form_error('price',"<label class='text-danger text-bold'>","</label>"); ?>
								</div>

								<div class="col-md-4">						
									<label for="HSN_SAC">HSN_SAC Number :</label>
									<input type="text" name="HSN_SAC" id="HSN_SAC" class="form-control" value="<?php echo set_value('HSN_SAC');?>" maxlength="8" size="50" placeholder="HSN_SAC Number" />

									<?php echo form_error('HSN_SAC',"<label class='text-danger text-bold'>","</label>"); ?>
								</div>

								<div class="col-md-4">
									<label for="gst">GST(%)</label>
									<input type="number" class ='form-control' value= "<?php echo set_value('gst'); ?>" name="gst" id="gst" size="50" placeholder="GST in %">
								</div>
							</div>
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
