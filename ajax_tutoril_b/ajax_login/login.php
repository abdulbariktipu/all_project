<?php
	$user = $_POST["username"];
	$pass = $_POST["pass"];

	$con = mysqli_connect("localhost", "root", "", "ajaxdata");

	$query = mysqli_query($con, "SELECT id FROM users WHERE username='$user' || email='$user' AND password='$pass'");
	$fetch = mysqli_fetch_assoc($query);
	$id = $fetch['id'];
	$num = mysqli_num_rows($query);

	if (!$user & !$pass) 
	{
		echo "All Fields required.";
	}
	else
		if (!$user) 
		{
			echo "Enter a username";
		}
		else
			if ($num == 0) 
			{
				echo "Incorrect username or password";
			}
			else
				if (!$pass) 
				{
					echo "Enter a password";
				}
				else
				{
					//echo "Success";
					session_start();
					$_SESSION['id'] = $id;
					//header("location:home.php");
					echo "<script>window.location.href='home.php';</script>";
				}

?>
