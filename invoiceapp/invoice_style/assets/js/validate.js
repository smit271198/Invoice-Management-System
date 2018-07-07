$("#company_data").validate({		//validation in company 
	rules : {
		name : "required",
		username : "required",
		password : "required",
		state : "required",
		country : "required",
		city : "required",
		address : "required",
		pincode : {
			required : true,
			minlength : 6,
			maxlength : 6
		},
		GSTIN_no : {
			required : true,
			minlength : 15,
			maxlength : 15
		},
		PAN_no : {
			required : true,
			minlength : 10,
			maxlength : 10
		},
		contact_no_1 : {
			required : true,
			minlength : 10,
			maxlength : 10
		}
	},
	messages : {
		name : "Please enter Customer Name",
		username : "Please enter Userame",
		password : "Please enter Password",
		state : "Please select State",
		country : "Please enter Country name",
		city : "Please enter City",
		address : "Please enter Address",
		pincode : {
			required : "Please enter Pincode",
			minlength : "Please enter valid Pin Code",
			maxlength : "Please enter valid Pin Code"
		},
		GSTIN_no : {
			required : "Please enter GSTIN Number",
			minlength : "Please Enter valid GSTIN number",
			maxlength : "Please Enter valid GSTIN number"
		},
		PAN_no : {
			required : "Please enter PAN number",
			minlength : "Please Enter valid PAN Number",
			maxlength : "Please enter valid PAN Number"
		},
		contact_no_1 : {
			required : "Please enter Contact number",
			minlength : "Please enter valid Contact Number",
			maxlength : "Please enter valis Contact Number"
		}
	},
	errorPlacement: function (error, element) {
        error.css({'margin-right':'20px','padding-top':'5px'});
        error.addClass("text-bold text-danger")
        error.insertAfter(element);
    },
	submitHandler : function(form){
		form.submit();
	}
});

$("#customer_data").validate({		//validation in customer 
	rules : {
		name : "required",
		state : "required",
		state_code : {
			required : true,
			minlength : 2,
			maxlength : 2
		}, 
		city : "required",
		address : "required",
		pincode : {
			required : true,
			minlength : 6,
			maxlength : 6
		},
		GSTIN_no : {
			required : true,
			minlength : 15,
			maxlength : 15
		},
		PAN_no : {
			required : true,
			minlength : 10,
			maxlength : 10
		},
		contact_no_1 : {
			required : true,
			minlength : 10,
			maxlength : 10
		}
	},
	messages : {
		name : "Please enter Customer Name",
		state : "Please select State",
		state_code : {
			required : "Please enter State Code",
			minlength : "Please enter valid State Code",
			maxlength : "Please enter valid State Code"
		},
		city : "Please enter City",
		address : "Please enter Address",
		pincode : {
			required : "Please enter Pincode",
			minlength : "Please enter valid Pin Code",
			maxlength : "Please enter valid Pin Code"
		},
		GSTIN_no : {
			required : "Please enter GSTIN Number",
			minlength : "Please Enter valid GSTIN number",
			maxlength : "Please Enter valid GSTIN number"
		},
		PAN_no : {
			required : "Please enter PAN number",
			minlength : "Please Enter valid PAN Number",
			maxlength : "Please enter valid PAN Number"
		},
		contact_no_1 : {
			required : "Please enter Contact number",
			minlength : "Please enter valid Contact Number",
			maxlength : "Please enter valis Contact Number"
		}
	},
	errorPlacement: function (error, element) {
        error.css({'margin-right':'20px','padding-top':'5px'});
        error.addClass("text-bold text-danger")
        error.insertAfter(element);
    },
	submitHandler : function(form){
		form.submit();
	}
});

$("#category_data").validate({
	rules : {
		name : "required"
	},
	messages : {
		name : "Please enter Name"
	},
	errorPlacement: function (error, element) {
        error.css({'margin-right':'20px','padding-top':'5px'});
        error.addClass("text-bold text-danger")
        error.insertAfter(element);
    },
	submitHandler : function(form){
		form.submit();
	}
});

$("#ps_data").validate({
	rules : {
		categoryID : "required",
		name : "required",
		price : "required",
		HSN_SAC : {
			required : true,
			minlength : 6,
			maxlength : 8
		},
		gst : {
			required :true,
			max : 28,
			min : 5
		}

	},
	messages : {
		categoryID : "Please enter Catedory ID",
		name : "Please enter Name",
		price : "Please enter price",
		HSN_SAC : {
			required : "Please enter HSN/SAC numer",
			minlength : "Please enter valid HSN/SAC number",
			maxlength : "Please enter valid HSN/SAC number"
		},
		gst : {
			required : "Please enter GST (%)",
			min : "Please enter valid GST",
			max : "Please enter valid gst"
		}
	},
	errorPlacement: function (error, element) {
        error.css({'margin-right':'20px','padding-top':'5px'});
        error.addClass("text-bold text-danger")
        error.insertAfter(element);
    },
	submitHandler : function(form){
		form.submit();
	}
});

$("#group_data").validate({
	rules : {
		name : "required",
		'customer_list[]' : {
			required : true,
			minlength : 1
		}
	},
	messages : {
		name : "Please enter name",
		'customer_list[]' : {
			required : "Please select atleast one customer",
			minlength : "Please select atleast one customer"
		}
	},
	errorPlacement: function (error, element) {
        error.css({'margin-right':'20px','padding-top':'5px'});
        error.addClass("text-bold text-danger")
        if(element.attr('name') == "customer_list[]")
        	error.insertAfter(element.closest("table"));
        else
        	error.insertAfter(element);
    },
	submitHandler : function(form){
		form.submit();
	}
});


$("#product_price_data").validate({		//validation in product_price
	rules : {
		g_c_name : "required",
		'type' : "required",
	},
	messages : {
		g_c_name : "Please select Name",
		'type' : "Please select Type",
	},
	errorPlacement: function (error, element) {
        error.css({'margin-right':'20px','padding-top':'5px'});
        error.addClass("text-bold text-danger")
        if(element.attr('name') == "type")
        	error.insertAfter(element.parent().parent());
        else
        	error.insertAfter(element);
    },
	submitHandler : function(form){
		form.submit();
	}
});

$("#invoice_data").validate({		//validation in invoice
	rules : {
		customer_name : "required",
		"product_change[1]" : "required",
		"price[1]" : {
			required :  true,
			min : 0
		},
		"quantity[1]" : {
			required : true,
			min : 1
		},
		date : {
			required : true,
			date : true
		},
		duedate : {
			required : true,
			date : true
		}
	},
	messages : {
		customer_name : "Please select customer",
		"product_change[1]" : "Please select product",
		"price[1]" : {
			required : "Please enter price",
			min : "Price should be positive value"
		},
		"quantity[1]" : {
			required : "Please enter quantity",
			min : "Quantity shold be greater than 0"
		},
		date : {
			required :"Please Enter purchase date ",
			date : "Please enter valid date"
		},
		duedate : {
			required :"Please Enter Payment Duedate ",
			date : "Please enter valid date"
		}
	},
	errorPlacement: function (error, element) {
        error.css({'margin-right':'20px','padding-top':'5px'});
        error.addClass("text-bold text-danger")
        error.insertAfter(element);
    },
	submitHandler : function(form){
		form.submit();
	}
});

$("#reminder_data").on("submit",function(e){
	if($("#setdate").val() == ""){
		$("#dateError").show();
		e.preventDefault();
	}
	else
		$("#reminder_data").submit();
});


$("#receipt_data").validate({		//validation in invoice
	rules : {
		receipt_name : "required",
		amount : "required",
		"mode" : "required",
		date : {
			required : true,
			date : true
		}
	},
	messages : {
		receipt_name : "Please select Customer",
		amount : "Please enter Amount",
		"mode" : "Please select Payment Mode",
		date : {
			required :"Please Enter Payment date ",
			date : "Please enter valid date"
		}
	},
	errorPlacement: function (error, element) {
        error.css({'margin-right':'20px','padding-top':'5px'});
        error.addClass("text-bold text-danger")
        if(element.attr('name') == "mode")
        	error.insertAfter(element.parent().parent());
        else
        	error.insertAfter(element);
    },
	submitHandler : function(form){
		form.submit();
	}
});
