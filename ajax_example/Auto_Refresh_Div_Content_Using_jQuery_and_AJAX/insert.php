<?php
//insert.php
	if(isset($_POST["tweet"]) && isset($_POST["user"]))
	{
		//echo $_POST["tweet"];
		//echo $_POST["user"];die;
		$connect = mysqli_connect("localhost", "root", "", "ajaxdata");
		$tweet = mysqli_real_escape_string($connect, $_POST["tweet"]);
		$user = mysqli_real_escape_string($connect, $_POST["user"]);
		$sql = "INSERT INTO autorefresh (user,message) VALUES ('".$user."','".$tweet."')";
		mysqli_query($connect, $sql);
	}
?>