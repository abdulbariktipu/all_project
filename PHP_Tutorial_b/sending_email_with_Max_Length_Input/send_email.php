<!DOCTYPE html>
<html>
<head>
	<title>Send Email</title>
</head>
<body>
	<?php
		$to = 'tstipu69@gmail.com';
		$subject = 'This is a test email';
		$body = 'This is test body';
		$henders = 'From: noreplaymail69@gmail.com';

		if (mail($to, $subject, $body, $henders)) {
			echo 'Email has been send to '.$to;
		}else{
			echo 'Error';
		}
	?>
</body>
</html>