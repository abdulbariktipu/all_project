<!DOCTYPE html>
<html>
<head>
	<title>Send Email</title>
</head>
<body>
	<?php
	if (isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_text'])) {
		$contact_name = $_POST['contact_name'];
		$contact_email = $_POST['contact_email'];
		$contact_text = $_POST['contact_text'];

		if (!empty($_POST['contact_name']) && !empty($_POST['contact_email']) && !empty($_POST['contact_text']) ) {
			if (strlen($contact_name)>25 || strlen($contact_email)>50 || strlen($contact_text)>1000) {
				echo 'Sorry, maxlength for same field has been exceeded.';
			}else{
				$to = $contact_email;
				$subject = $contact_name;
				$body = $contact_text;
				$henders = 'From: noreplaymail69@gmail.com';

				if (mail($to, $subject, $body, $henders)) {
					echo 'Email has been send to '.$to;
				}else{
					echo 'Error';
				}	
			}
		}else{
			//echo '<script language="javascript">';
			echo '<script language="javascript">alert("Please input")</script>';
			//echo '</script>';
		}
	}
	?>

	<form action="" method="post">
		Name:<br><input type="text" name="contact_name" maxlength="25"><br><br>
		Email Address:<br><input type="text" name="contact_email" maxlength="50"><br><br>
		Message:<br>
		<textarea name="contact_text" rows="6" cols="30" maxlength="1000"></textarea><br><br>
		<input type="submit" name="" value="Send">
	</form>
</body>
</html>




<script>
function myFunction() {
    alert("Hello! I am an alert box!");
}
</script>