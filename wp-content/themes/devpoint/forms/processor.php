<?php

//print_r($_POST);

//exit();

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

if(IS_AJAX && $_POST) {
	
		
	define('WP_USE_THEMES', false);
	require($_SERVER['DOCUMENT_ROOT'].'/wp-blog-header.php');
	
	require_once("rb/rb.php");
	R::setup('sqlite:data/db.sqlite'); 
	R::debug(false);
	R::freeze();
	
	$bean = R::dispense('submissions');
	
	if ($_GET['form'] == "newsletter") {  
		$bean->Email = $_POST['mailing-list'];
		$bean->Source = "Newsletter";
		$id = R::store($bean);
	}
	
	else {

			
		/*$email_decoded = base64_decode(strtr($_POST['toEmail'], '-_', '+/'));			
		$to = stripslashes($email_decoded);
		$from = "Website <".stripslashes($email_decoded).">";*/
	
					
		foreach ($_POST as $key => $value) {
				
					
			if ($key != "txtCaptcha") {
				
					$key = str_replace("-", " ",$key);
					$key = str_replace("_", " ",$key);
					
					$body = $body . ucwords(stripslashes($key)) . ": " . stripslashes($value) . "<br/>";
				//	$bean->ucwords(stripslashes($key)) = stripslashes($value);
							
			}
			 
		
		 }
		
		//echo $body;
		
			
		$to = get_bloginfo('admin_email');
		$from = "Website <".$to.">";
		$subject = "Website Notification";
		$message = $body;
				
		$headers = "From:" . $from . "\r\n" .
		'Content-type: text/html' . "\r\n";
	
	    wp_mail( $to, $subject, $message, $headers );
		
		$bean->FirstName = $_POST['first_name'];
		$bean->LastName = $_POST['last_name'];
		$bean->Email = $_POST['email'];
		$bean->Phone = $_POST['phone'];	
		$bean->Source = 'Contact';
		$bean->Message = $_POST['message'];
		
		$id = R::store($bean);
	
	}


}?>