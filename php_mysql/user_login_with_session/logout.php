<!DOCTYPE html>
<html>
<head>
	<title>PHP MYSQL user authentication</title>
</head>
<body>
	<?php
		session_start();
		session_unset();
		session_destroy();
		header("refresh:2; url=login.php");
		echo '<h1>Thank you! Your are Logout!</h1> ';
		
	?>

	


</body>
</html>
