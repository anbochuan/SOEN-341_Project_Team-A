
$(document).ready(function() {
	$('#level2').hide();
	$('#level3').hide();
	var targetCategory // global
	var targetCategory2
	$('#productCategory').change(function(){
  		targetCategory = $(this).val();
  		$('#level2').show();
		$('optgroup:not(#'+targetCategory+')').hide();		
 	});
 	$('#productCategory2').change(function(){
  		targetCategory2 = $(this).val();
		$('#level3').show();
		$('optgroup:not(#'+targetCategory+')').show();
		$('#level2').show();
		$('optgroup:not(#'+targetCategory2+')').hide();
		
 	});
});
