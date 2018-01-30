
$(document).ready(function() {
	$(".child-comments").hide(); // hide all the children comments, they will load but they will not display all at once
	// To find an element with a specific id, write a hash character, followed by the id of the HTML element
	$("a#children").click(function() { // toggle function.     
		var section = $(this).attr("name");
		var togTxt = $("a#tog_text").text();
		$("#C-" + section).toggle();
	});
	// To find elements with a specific class, write a period character, followed by the name of the class
	$(".form-submit").click(function() {
		var commentBox = $("#comment");
		var commentCheck = commentBox.val();
		if(commentCheck == '' || commentCheck == NULL)
		{
			commentBox.addClass("form-text-error"); // can cause shake and change color to red effect
			return false;
		}
	});

	$(".form-reply").click(function() {
		var replyBox = $("#new-reply"); // target the Reply button id='new-reply' under the Reply textarea box
		var replyCheck = replyBox.val();
		if(replyCheck == '' || replyCheck == NULL)
		{
			replyBox.addClass("form-text-error");
			return false;
		}
	});

	$("a#reply").one("click", function() { // targeting the link of reply under the parent comment in the functions.php file
		var comCode = $(this).attr("name");
		var parent = $(this).parent();

		parent.append("<br /><form action='' method='post'><textarea class='form-text' name='new-reply' id='new-reply' required='required'></textarea><input type='hidden' name='code' value='"+comCode+"'/><input type='submit' class='form-reply' id='form-reply' name='replyButton' value='Reply' /></form>");
	});



});