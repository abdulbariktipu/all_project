<!DOCTYPE html>
<html>
<head>
	<title>PHP MYSQL user authentication</title>
</head>
<body>
	<?php
		session_start();
		if (!$_SESSION['username']) 
		{
			header('location:login.php');
		}

	?>

	<h1>Welcome! Your are Login!</h1> 
	<?php echo $_SESSION['username'];?>
	<a href="logout.php">Logout..!</a>
</body>
</html>
