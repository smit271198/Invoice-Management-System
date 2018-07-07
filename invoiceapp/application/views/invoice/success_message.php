<div class="container-fluid">
	<div class="alert alert-success no-border">
		<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
		Operation performed Successfully...!!! 
	</div>
</div>

<script type="text/javascript">
	window.setTimeout(function(){
		$(".alert").fadeTo(500,0).slideUp(500,function(){
			$(this).remove();
		});
	},3000);
</script>