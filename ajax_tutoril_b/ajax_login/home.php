<?php
	//echo "Welcome";
	session_start();
	$id = $_SESSION['id'];

	$con = mysqli_connect("localhost", "root", "", "ajaxdata");

	$query = mysqli_query($con, "SELECT username FROM users WHERE id='$id'");
	$fetch = mysqli_fetch_assoc($query);
	$user = $fetch['username'];

	echo "Welcome back $user!";
	//header("location:logout.php");
	echo "<a href='logout.php'>Logout</a>";
?>

