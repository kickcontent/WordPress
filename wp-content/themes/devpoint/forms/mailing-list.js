// JavaScript Document

$(document).ready(function () {
	
	var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	
	$("#newsletter").submit(function( event ) {
	
		event.preventDefault();	
		
		if (!emailReg.test($(this).find("input[name='mailing-list']").val())) {
			alert("Please enter a valid email address.");
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: "/wp-content/themes/devpoint/forms/processor.php?form=newsletter",	
			data:$(this).serialize(),
			success: function (msg) {	
	
				$("#newsletter").html("Thank you.");			
				//console.log(msg);			
							
			}
		});	
		
	});
		
	
});