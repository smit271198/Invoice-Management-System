<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						

		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">New Payment Receipt</h3>			
			</div>

			<!-- customer new form-->
			<div class="container-fluid">
			<div class="container-fluid">

				<form method="post" id="receipt_data" action="<?php echo base_url('invoice/receipt/receipt_new_add');?>">
					<div class= "form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="receipt_name">Customer Name</label>
								<select name="receipt_name" id="receipt_name" class="form-control">
									<option value="" disabled selected hidden>select</option>
									<?php foreach($item as $res) : ?>
										<option value="<?php echo $res['Name'];?>" <?= set_value('receipt_name')== $res['Name']?"selected":""?>><?php echo $res['Name']?></option>
									<?php endforeach?>
								</select>
								
								<?php echo form_error('receipt_name',"<label class='text-danger text-bold'>","</label>"); ?>
							</div>
							<div class="col-md-6">
								<label for="invoiceID">Invoice ID :</label>
								<input type="text" class="form-control" name="invoiceID" id="invoiceID" size="50"  readonly="readonly" placeholder="Invoice ID" value="<?= set_value('invoiceID');?>" />
								
								<?php echo form_error('name',"<label class='text-danger text-bold'>","</label>"); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="date">Received Date :</label>
								<input type="date" class ='form-control' value= "<?= Date('Y-m-d'); ?>" name="date" id="date" size="50" >

								<?php echo form_error('date',"<label class='text-danger text-bold'>","</label>"); ?>
							</div>
							<div class="col-md-6">						
								<label for="amount">Received amount :</label>
								<input type="number" name="amount" id="amount" class="form-control" value="" size="50" placeholder="Received Amount" value="<?= set_value('amount');?>" />

								<?php echo form_error('amount',"<label class='text-danger text-bold'>","</label>"); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label for="mode">Payment Mode : </label>
							</div>

							<div class="col-md-3">
								<input type="radio" name="mode" id="cash" value="Cash"/> 
								<label for="cash">Cash</label>
							</div>

							<div class="col-md-3">
								<input type="radio" name="mode" id="cheque" value="Check"/>
								<label for="cheque">Cheque</label>
							</div>

							<div class="col-md-3">
								<input type="radio" name="mode" id="mode" value="Bank"/>
								<label for="bank">Bank</label>
							</div>
						</div>	
						<?php echo form_error('mode',"<label class='text-danger text-bold'>","</label>"); ?>	
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
