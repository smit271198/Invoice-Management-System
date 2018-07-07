<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel panel-flat">

			<div class="panel-heading">
				<h3 class="panel-title" align="center">New Category</h3>			
			</div>


			<!-- categories new form-->
			<div class="container-fluid">
			<div class="container-fluid">

				<form method="post" id="category_data" action="<?php echo base_url('invoice/categories/categories_new_add');?>">
					<div class= "form-group">
						<label for="categoryID">Catgoory ID :</label>
						<input type="text" class="form-control" value="<?= $item;?>" name="categoryID" id="categoryID" readonly="readonly" size="50"/>
						
						<?php echo form_error('categoryID',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class= "form-group">
						<label for="name">Name :</label>
						<input type="text" class="form-control" value="<?php echo set_value('name');?>" name="name" id="name" size="50" placeholder="Enter category Name" />
						
						<?php echo form_error('name',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class="form-group">
						<label for="details">Details :</label>
						<textarea class ='form-control' name="details" id="details" style="resize: none" rows="2" size="50" /></textarea>
					</div>

					<div class ="form-group" align="center"><input type="submit" class ="btn btn-primary" value="Submit" /></div>
								
				</form>
			</div>
			</div>
			<!--categories new form-->

		</div>
		<!-- Add panel -->

	</div>
	<!-- Main area -->