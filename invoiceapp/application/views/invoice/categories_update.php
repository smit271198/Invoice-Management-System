<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">Edit Category</h3>			
			</div>

			<!-- customer new form-->
			<div class="container-fluid">
			<div class="container-fluid">
				<?php foreach($item as $res) :?>
				<form method="post" id="category_data" action="<?php echo base_url('invoice/categories/categories_update/'.$res['CategoryID']);?>">

					<div class= "form-group">
						<label for="categoryID">Category ID :</label>
						<input type="text" class="form-control" value="<?php echo $res['CategoryID'];?>" name="categoryID" id="categoryID" size="50" readonly="readonly"/>
						
						<?php echo form_error('categoryID',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class= "form-group">
						<label for="name">Name :</label>
						<input type="text" class="form-control" value="<?php echo $res['Name'];?>" name="name" id="name" size="50" placeholder="Enter Full Name" />
						
						<?php echo form_error('name',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class="form-group">
						<label for="details">Details :</label>
						<textarea class ='form-control' name="details" id="details" style="resize: none" rows="2" value="" size="50" /><?php echo $res['Details']; ?></textarea>
					</div>

					<div class ="form-group" align="center"><input type="submit" class ="btn btn-primary" value="Update" /></div>
								
				</form>
			<?php endforeach ?>
			</div>
			</div>
			<!--customer new form-->

		</div>
		<!-- Add panel -->

	</div>
	<!-- Main area -->