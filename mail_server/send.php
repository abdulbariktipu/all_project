<?php

if(isset($_POST['submit'])){

	$to = $_POST['to'];
	$from = $_POST['from'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	//$body = "This is an automated message. Please dont reply to this email. \n\n $message";

	//from_new = "From: $from";

	//mail($to, $subject, $body, $from_new);
	mail($to, $subject, $message);

	echo "Message Sent! <a href='index.php'>Click here to send another email</a>";

}

?>

<?php
	$message = "The test message";
	$headers = "From: tstipu69@gmail.com";
	mail('tstipu69@gmail.com', 'Testing', $message, $headers);

	echo "Test message is sent";
?>
