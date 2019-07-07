<?php 

	$to = "tstipu69@gmail.com";
	$mail_sub = "Mail Script";
	$mail_content = "Hello ProgForg";
	$header = "From: 14310026@uits.edu.bd"."\r\n";

	$result = mail($to, $mail_sub, $mail_content, $header);

	if($result)
	{
		echo "Mail sent successfully";
	}
	else
	{
		echo "Mail not sent";
	}

?>