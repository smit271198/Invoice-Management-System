<!-- content area -->
<div class="content">
					
	<!-- Main area -->
	<div class="row">
						

		<!-- Add panel -->
		<div class="panel ">
			<div class="panel-heading">
				<h3 class="panel-title" align="center">Edit Payment Receipt</h3>			
			</div>

			<!-- customer new form-->
			<div class="container-fluid">
			<div class="container-fluid">

				<?php foreach($item[0] as $res0): ?>
				<form method="post" id="receipt_data" action="<?php echo base_url('invoice/receipt/receipt_update/'.$res0['ID']);?>">
					<div class= "form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="receipt_name">Customer Name</label>
								<select name="receipt_name" id="receipt_name" class="form-control">
									<?php 
										foreach($item[1] as $res1){
											echo "<option value='".$res1['Name']."'"; 
											if($res1['Name'] == $res0['Name'])
												echo "selected";
											echo ">".$res1['Name'];
											echo "</option>";
										}
									?>
								</select>
								
								<?php echo form_error('receipt_name',"<label class='text-danger text-bold'>","</label>"); ?>
							</div>
							<div class="col-md-6">
								<label for="invoiceID">Invoice ID :</label>
								<input type="text" class="form-control" name="invoiceID" id="invoiceID" size="50"  readonly="readonly" placeholder="Invoice ID" value="<?= $res0['InvoiceID'];?>" />								
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="date">Received Date :</label>
								<input type="date" class ='form-control' value= "<?= $res0['Date']; ?>" name="date" id="date" size="50" >

								<?php echo form_error('date',"<label class='text-danger text-bold'>","</label>"); ?>
							</div>
							<div class="col-md-6">						
								<label for="amount">Received amount :</label>
								<input type="number" name="amount" id="amount" class="form-control" size="50" placeholder="Received Amount" value="<?= $res0['Amount']; ?>" />

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
								<input type="radio" name="mode" id="cash" value="Cash" <?= $res0['Mode'] == 'Cash'?'checked':'' ?>/>
								<label for="cash">Cash</label>	
							</div>

							<div class="col-md-3">
								<input type="radio" name="mode" id="cheque" value="Cheque" <?= $res0['Mode'] == 'Check'?'checked':'' ?>/>
								<label for="cheque">Cheque</label>
							</div>

							<div class="col-md-3">
								<input type="radio" name="mode" id="bank" value="Bank" <?= $res0['Mode'] == 'Bank'?'checked':'' ?>/>
								<label for="bank">Bank</label>
							</div>
						</div>	
						<?php echo form_error('mode',"<label class='text-danger text-bold'>","</label>"); ?>	
					</div>
						
					<div class="form-group">
						<label for="details">Details :</label>
						<textarea class ='form-control' name="details" id="details" style="resize: none" rows="2" value="" size="50" /><?= $res0['Details']; ?></textarea>
					</div>

					<div class ="form-group" align="center"><input type="submit" class ="btn btn-primary" value="Submit" /></div>
								
				</form>
				<?php endforeach?>
			</div>
			</div>
			<!--customer new form-->

		</div>
		<!-- Add panel -->


	</div>
	<!-- Main area -->
