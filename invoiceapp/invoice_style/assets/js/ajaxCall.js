$(document).on("change","input[name='type']",function(){	/*change name according to group or customer*/
	var radiovalue = $(this).val();
	var post_data = {radiovalue:radiovalue };
	$.ajax({
		url : base_url+"/invoice/product_price/change_radio",
		type :"POST",
		cache : false,
		data : post_data,
		success : function(response){
			$("#g_c_name").html(response);
		}
	});
});
$(document).on('input change','input[name^="price"]',function(){
	$('#'+$(this).attr("id")).rules('add',{
		'required' : true,
		'min' : 1,
		'messages':{
			required : "Please enter Price"
		}
	});
});




$(document).on("click","a[name='reminder']",function(){ /*To see remainder on sidebar*/
	$.ajax({
		url : base_url+"/invoice/reminder/reminder_change",
		type :"POST",
		cache : false,
		success : function(response){
			$("#reminder_ajax").html(response);
		}
	});
});


var cnt = 1; 
var res; /*Add new product during new invoice is generated*/
$(document).on("click","#modal_submit",function(){
	var categoryID = $('#modal_categoryID').val();
	var productName = $('#modal_name').val();
	var price = $('#modal_price').val();
	var HSN_SAC = $('#modal_HSN_SAC').val();
	var gst = $('#modal_gst').val();
	var details = $('#modal_details').val();
	$.ajax({
		url : base_url+"/invoice/ps/ps_new_invoice",
		type :"POST",
		cache : false,
		data : {categoryID: categoryID,
		productName: productName,
		price: price,
		HSN_SAC: HSN_SAC,
		gst: gst,
		details: details
		},
		success : function(response){
			res += response;
			for(var i = 1; i <= cnt; i++){
				$('#product_change'+i).append(response);
			}
		}
	});
});



$(document).on("change","#product_change1",function(){ /* Automatically add subtotal when price is loaded for only 1st product*/
	var selectproduct = $(this).val();
	var selectname = $('#customer_name').val();
	var qty = $('#quantity1').val();
	$.ajax({
		url : base_url+"/invoice/invoice/change_price",
		type :"POST",
		cache : false,
		dataType : "json",
		data : {selectproduct: selectproduct, 
		selectname: selectname
		},
		success : function(response){
			$("#price1").val(response.price);
			$('#gst1').val(response.gst);
			var subtotal = (response.price*qty)+((response.price*qty*response.gst)/100);
			$("#subtotal1").val(subtotal);
			var total = 0;
			for(var i=1; i<=cnt; i++){
				total += parseFloat($('#subtotal'+i).val());
			}
			$('#total').val(total);
		}
	});
});


$(document).on("input change","#quantity1,#price1",function(){ /*To change value of subtotal when quantity is changed for 1st product*/
	var qty = $('#quantity1').val();
	var gst = $('#gst1').val();
	var price = $('#price1').val();
	var subtotal = (price*qty)+((price*qty*gst)/100);
	$("#subtotal1").val(subtotal);

	var total = 0;
	for(var i=1; i<=cnt; i++){
		total += parseFloat($('#subtotal'+i).val());
	}
	$('#total').val(total);
});



 /*Change Product when customer is selected*/
$(document).on("change","select[name='customer_name']",function(){
	$.ajax({
		url : base_url+"/invoice/invoice/change_product",
		type :"POST",
		cache : false,
		success : function(response){
			res = response;
			for(var i = 1; i <= cnt; i++){
				$('#product_change'+i).html(res);
			}
		}
	});
});


$(document).on("click","#dynamically_add",function(){  /*Dynamically add product in invoice*/
	cnt++;
	var html = '<tr id="row'+cnt+'">'; //adding dynamically all the elements using variable html

	html += '<td><div class="product_ajax"><select class="form-control" name="product_change['+cnt+']" id="product_change'+cnt+'" class="product_change"><option value="" disabled selected hidden>Select</option>'+res+'</select></div></td>';

	html += '<td><input type="number" name="price['+cnt+']" id="price'+cnt+'" class="form-control" size="50" placeholder="Enter Price in Rupees" /></td>';

	html += '<td><input type="number" class ="form-control" value= "1" name="quantity['+cnt+']" id="quantity'+cnt+'" size="50" placeholder="Enter Purchase Quantity"></td>';

	html += '<td><input type="text" class ="form-control" value="0" name="gst['+cnt+']" id="gst'+cnt+'" size="50" placeholder="GST Percentage(%)"  readonly="readonly"></td>';

	html += '<td><input type="number" class ="form-control" value="0" name="subtotal['+cnt+']" id="subtotal'+cnt+'" size="50" readonly="readonly"></td>';

	html += '<td><a name="remove" id="'+cnt+'" title="Remove"><i class="material-icons" style="color:red">clear</i></a></td>';

	html += "</tr>";

	$('#dynamic_field').append(html);
	$('#hidden_invoice').val(cnt);

	$('#product_change'+cnt).rules('add',{
		'required' : true,
		'messages':{
			required : "Please select Product"
		}
	});
	$('#price'+cnt).rules('add',{
		'required' : true,
		'min' : 0,
		'messages':{
			required : "Please enter Price"
		}
	});
	$('#quantity'+cnt).rules('add',{
		'required' : true,
		'min' : 1,
		'messages':{
			required : "Please enter quantity"
		}
	});

	$('#product_change'+cnt).change(function(){ /* Automatically add subtotal when price is loaded in invoice*/
		var selectproduct = $(this).val();
		var selectname = $('#customer_name').val();
		var idName = $(this).attr("id");
		var id = idName[idName.length-1];
		var qty = $('#quantity'+id).val();
		$.ajax({
			url : base_url+"/invoice/invoice/change_price",
			type :"POST",
			cache : false,
			dataType : "json",
			data : {selectproduct: selectproduct, 
			selectname: selectname
			},
			success : function(response){
				$("#price"+id).val(response.price);
				$('#gst'+id).val(response.gst);
				var subtotal = (response.price*qty)+((response.price*qty*response.gst)/100);
				$("#subtotal"+id).val(subtotal);

				var total = 0;
				for(var i=1; i<=cnt; i++){
					if(!isNaN($('#subtotal'+i).val()))
				total += parseFloat($('#subtotal'+i).val());
				}
				$('#total').val(total);
			}
		});
	});

	$('#quantity'+cnt+',#price'+cnt).on("input change",function(){
		var idName = $(this).attr("id");
		var id = idName[idName.length-1];
		var qty = $('#quantity'+id).val();
		var gst = $('#gst'+id).val();
		var price = $('#price'+id).val();
		var subtotal = (price*qty)+((price*qty*gst)/100);
		$("#subtotal"+id).val(subtotal);

		var total = 0;
		for(var i=1; i<=cnt; i++){
			if(!isNaN($('#subtotal'+i).val()))
				total += parseFloat($('#subtotal'+i).val());
		}
		$('#total').val(total);
	});
});


$(document).on("click","a[name='remove']",function(){ /*To delete dynamically added row in invoice_new*/
	var button_id = $(this).attr("id");   
    $('#row'+button_id+'').remove();
    var total = 0;
	for(var i=1; i<=cnt; i++){
		if(!isNaN($('#subtotal'+i).val()))
			total += parseFloat($('#subtotal'+i).val());
	}
	$('#total').val(total);
});



$(document).on("change","#receipt_name",function(){		/*change invoiceID,date and amount when change customer in payment receipt_new*/
	var name = $(this).val();
	$.ajax({
		url : base_url+"/invoice/receipt/change_invoiceID",
		type :"POST",
		data : {name : name},
		dataType : "json",
		cache : false,
		success : function(response){
			$("#invoiceID").val(response.invoiceID);
			$("#amount").val(response.amount);			
		}
	});
});



/*to check if username is already exists in add new company*/
$(document).on('blur',"#username",function(){
	username = $('#username').val();
	$.ajax({
		url : base_url+"/invoice/admin/check_username",
		type :"POST",
		data : {username : username},
		cache : false,
		success : function(response){
			if(response){
				$("#username_error").css('display','block');
				$("input[type=submit]").attr('disabled','disabled');
			}
			else{
				$("#username_error").css('display','none');
				$("input[type=submit]").removeAttr('disabled','disabled');
			}
		}
	});
});
