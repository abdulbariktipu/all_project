<?php
	//echo "Posting...";	

	$username = "root";
	$password = "";
	$hostname = "localhost";	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");	
	$selected = mysql_select_db("ajaxdata", $dbhandle);

	if(isset($_POST['s']))
	{
		$status = $_POST['s'];

		$query = mysql_query("SELECT * FROM statuses WHERE status='$status'");
		if($row = mysql_num_rows($query) > 0 ) 
		{ //check if there is already an entry for that username
			echo "Username already exists!";
		}
		else
		{
			mysql_query("INSERT INTO statuses (status) VALUES ('$status')");
			header("location:index.php");
		}
	}

	/*

	if (!$status) {
		echo "No status entered...";
	}
	else {
		echo "Success"; 
	}*/
?>