
$(document).ready(function () {
	
	//alert(window.location.host);
	
	//Gets the browser specific XmlHttpRequest Object 
	function getXmlHttpRequestObject() {
	 if (window.XMLHttpRequest) {
		return new XMLHttpRequest(); //Mozilla, Safari ...
	 } else if (window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP"); //IE
	 } else {
		//Display our error message
		alert("Your browser doesn't support the XmlHttpRequest object.");
	 }
	}
	
	//Our XmlHttpRequest object
	var receiveReq = getXmlHttpRequestObject();
	
	//Initiate the AJAX request
	function makeRequest(url, param) {
	//If our readystate is either not started or finished, initiate a new request
	 if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
	   //Set up the connection to captcha_test.html. True sets the request to asyncronous(default) 
	   receiveReq.open("POST", url, true);
	   //Set the function that will be called when the XmlHttpRequest objects state changes
	   receiveReq.onreadystatechange = updatePage; 
	
	   receiveReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	   receiveReq.setRequestHeader("Content-length", param.length);
	   receiveReq.setRequestHeader("Connection", "close");
	
	   //Make the request
	   receiveReq.send(param);
	 }   
	}
	
	//Called every time our XmlHttpRequest objects state changes
	function updatePage() {
	 //Check if our response is ready
	 if (receiveReq.readyState == 4) {
	   //Set the content of the DIV element with the response text
	   
	   if (receiveReq.responseText == 0) {
		   
			  document.getElementById('result').innerHTML = "Please enter the correct code.";  
			  img = document.getElementById('imgCaptcha');
			  img.src = '/wp-content/themes/devpoint/forms/ajax_captcha/create_image.php?' + Math.random();
			   
	   }
	   
	  else {
		  
		  postForm();
		  
	  }
	
	   
	   
	  
	 }
	}
	
	//Called every time when form is perfomed
	function getParam() {
		
		//console.log($(this));
		
	 //Set the URL
	 var url = '/wp-content/themes/devpoint/forms/ajax_captcha/captcha.php';
	 //Set up the parameters of our AJAX call
	 var postStr = "txtCaptcha=" + encodeURIComponent($("#txtCaptcha").val());
	 //Call the function that initiate the AJAX request
	 makeRequest(url, postStr);
	 
	}
	
	
	$("#email-us").find("input,select,textarea").each(function( index ) {
		
		if ($(this).attr("data-required") == "true") {
			$(this).parent().append("<span>*</span>")
		}
	
	});
	
	var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
	var phoneReg = /^\d{3}-\d{3}-\d{4}$/;
	var returner = true;
	var inputColor = $("#email-us").find("input").css("color");
	
	$("#email-us").find("input,select,textarea").focusin(function() {
		
		$("#email-us").find(".input").find("span").css("color", inputColor);
		
	});
	
	$("#email-us").find("input[name='phone']").focusin(function() {				
				
		var string = $(this).val().replace(/-/g, "");				  
		$(this).val(string) 
			
	});
	
	$("#email-us").find("input[name='phone']").focusout(function() {
				
		if ($(this).val().length == 10) {			
				
			var string = $(this).val();			  
					
			$(this).val(string.substring(0,3) + '-' + string.substring(3,6) + '-' + string.substring(6,10)) 
						  
		}
						
	});
	
	$("#email-us").find("input[name='txtCaptcha']").focusin(function() {
		
		$("#result").html("&nbsp;");
		
	});
	
	$("#email-us").find("input[name='phone']").bind('keypress', function (e) {
				   
		if(this.value.length>= 10) {
							
			return false;
		
		}
		
		return !(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46);
	});
	
	$("#email-us").submit(function( event ) {
	
		event.preventDefault();
		
		$(this).find("input,select,textarea").each(function( index ) {
		
			if ($(this).attr("data-required") == "true" && $(this).val() == "") {
				$(this).parent().find("span").css("color","red");
				returner = false;
			}
	
		});
		
		if ($(this).attr("data-required") == "true" && $(this).val() == "") {
				$(this).parent().find("span").css("color","red");
				returner = false;
		}
		
		if(!returner){
			returner = true;
			alert("Please fill in all required fields.");
			return false;
		}
		
		if ($(this).find("input[name='email']").val() != "" && !emailReg.test($(this).find("input[name='email']").val())) {
			alert("Please enter a valid email address.");
			return false;
		}
							
		if ($(this).find("input[name='phone']").val() != "" && !phoneReg.test($(this).find("input[name='phone']").val())) {							
			alert("Please enter a valid phone number.");
			return false;
			
		}
		
		getParam();
	
	});

	function postForm(){
						
		$.ajax({
			type: "POST",
			url: "/wp-content/themes/devpoint/forms/processor.php?form=contact",	
			data:$("#email-us").serialize(),
			success: function (msg) {	
							
				console.log(msg);			
							
			}
		});	
		
	}
	
	
});