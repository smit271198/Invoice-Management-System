$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#listTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("#search_product_price").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    var i=1;
    $("#listTable tr").filter(function() {
      $('.filterName'+i).toggle($(".filterName"+i).text().toLowerCase().indexOf(value) > -1);
      i++;
      //alert($("#filterName"+i).text());
    });
  });

  $("#search_invoice").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    var i=1;
    $("#listTable tr").filter(function() {
      $('.filterName'+i).toggle($(".filterName"+i).text().toLowerCase().indexOf(value) > -1);
      i++;
      //alert($("#filterName"+i).text());
    });
  });
});