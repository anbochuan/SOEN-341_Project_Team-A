$(document).ready(function() {
	$("#productCategory").change(function() {
		var productCategory_id = $(this).val();
		if(productCategory_id != "") {
			$.ajax({
				url:"productCategory2.php",
				data:{c_id:productCategory_id},
				type:'POST',
				success:function(response) {
					var resp = $.trim(response);
					$("#productCategory2").html(resp);
				}
			});
		} else {
			$("#productCategory2").html("<option value=''>------- Select --------</option>");
		}
	});
	$("#productCategory2").change(function() {
		var product_category2_id = $(this).val();
		if(product_category2_id != "") {
			$.ajax({
				url:"productCategory3.php",
				data:{c_id:product_category2_id},
				type:'POST',
				success:function(response) {
					var resp = $.trim(response);
					$("#productCategory3").html(resp);
				}
			});
		} else {
			$("#productCategory3").html("<option value=''>------- Select --------</option>");
		}
	});
});
