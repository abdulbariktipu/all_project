<?php
	$to = 'tstipu69@gmail.com';
	$subject = 'Hello from XAMPP!';
	$message = 'This is a test';
	$headers = "From: 14310026@uits.edu.bd\r\n";
	if (mail($to, $subject, $message, $headers)) {
		   echo "SUCCESS";
		   } else {
		   	   echo "ERROR";
		   	   }
?>