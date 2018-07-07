<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						
		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">Edit Customer</h3>			
			</div>

			<!-- customer new form-->
			<div class="container-fluid">
			<div class="container-fluid">
				<?php foreach($item as $res) :?>
				<form method="post" id="customer_data" action="<?php echo base_url('invoice/customer/cust_update/'.$res['ID']);?>">

					<div class= "form-group">
						<label for="name">Name :</label>
						<input type="text" class="form-control" value="<?php echo $res['Name'];?>" name="name" id="name" size="50" placeholder="Enter Full Name" />
							<?php echo form_error('name',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<?php
						$state = array("Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chhatisgarh","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Odisha","Punjab","Rajasthan","Sikkim","Tamil Nadu","Telangana","Tripura","Uttar Pradesh","Uttarakhand","West Bengal");
					?>
					<div class ="form-group">
						<label for="state">State :</label>
						<select name="state" id="state" class="form-control">
							<?php foreach($state as $statename):?>
								<option <?php if($res['State'] == $statename) echo "SELECTED"; ?> value=<?=$statename?>><?= $statename?></option>
							<?php endforeach?>
						</select>
						<?php echo form_error('state',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>


					<div class="form-group">
						<label for="state_code">State Code :</label>
						<input type="text" name="state_code" id="state_code" class="form-control" value="<?php echo $res['State_Code'];?>" maxlength="2" size="50" placeholder="eg- 07 for Delhi" />

						<?php echo form_error('state_code',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class= "form-group">
						<label for="city">City :</label>
						<input type="text" class="form-control" name="city" id="city" size="50"placeholder="Enter City" value="<?php echo $res['City'];?>"/>
							<?php echo form_error('city',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>

					<div class="form-group">
						<label for="Address">Address :</label>
						<textarea class ='form-control' name="address" id="address" size="50" rows="4" placeholder="eg- Flat No. 100 
Triveni Apartments 
Pitam Pura 
NEW DELHI 110034 
INDIA"><?php echo $res['Address']; ?></textarea>
										
							<?php echo form_error('address',"<label class='text-danger text-bold'>","</label>"); ?>
					</div>
							

					<div class="form-group">
						<label>Pin Code :</label>
						<input type="text" name="pincode" id="pincode" value="<?php echo $res['Pin_Code']; ?>" class="form-control"  maxlength="6" size="6" placeholder="eg- 380001" />
							<?php echo form_error('pincode',"<div class='alert alert-danger alert-dismissible'>","</div>"); ?>
					</div>


					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="GSTIN_no">GSTIN Number :</label>
								<input type="text" name="GSTIN_no" id="GSTIN_no" class="form-control" value="<?php echo $res['GSTIN_No'];?>" maxlength="15" size="50" placeholder="eg- 22AAAAA000A1Z5" />

								<?php echo form_error('GSTIN_no',"<label class='text-danger text-bold'>","</label>"); ?>
							</div>

							<div class="col-md-6">
								<label for="PAN_no">PAN number :</label>
								<input type="text" name="PAN_no" id="PAN_no" class="form-control" value="<?php echo $res['Pan_No'];?>" maxlength="10" size="50" placeholder="AAAPL1234C" />

								<?php echo form_error('PAN_no',"<label class='text-danger text-bold'>","</label>"); ?>
												
							</div>
						</div>
							
					</div>


					<div class="form-group">
						<label for="Contact no.:">Contact No. :</label>
							<div class="row">
								<div class="col-md-6">
									<input type="tel" class ='form-control' value= "<?php echo $res['Contact_No1']; ?>" name="contact_no_1" id="contact_no_1" maxlength="10" size="50" placeholder="Contact  no. 1" >


									<?php echo form_error('contact_no_1',"<label class='text-danger text-bold'>","</label>"); ?>
								</div>

								<div class="col-md-6">
									<input type="tel" class ='form-control' value= "<?php echo $res['Contact_No2']; ?>" name="contact_no_2" id="contact_no_2" maxlength="10" size="50" placeholder="contact no.  2">
								</div>
							</div>
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
					
