<?php
	$conn = mysqli_connect('localhost','root','','a_database');
	
	$date = date("Y-m-d"); // Returns current date in YYYY-MM-DD formate
	$userIP = $_SERVER['REMOTE_ADDR']; // Stores remote user ip address
	$query = "SELECT * FROM `unique_visitors` WHERE `date`='$date'";
	// Query for selecting record of current date from the table
	$result = mysqli_query($conn,$query);// Executes above query and returns MySQL result object

	$rowcount=mysqli_num_rows($result);
	echo $rowcount;
	
	if ($rowcount==0) //$result->num_rows==0
	{ 
		// Block will execute when there is no record of current date in the database table		
		$insertQuery = "INSERT INTO `unique_visitors`(`date`,`ip`) VALUES ('$date','$userIP')";
		// SQL query for inserting new record into the database table with current date and user IP address
		mysqli_query($conn,$insertQuery);
		// Excutes above SQL query to insert new record into the database table
	}
	else
	{
		$row=mysqli_fetch_assoc($result); //$row = $result->fetch_assoc(); //Extracts result row from result object		
		if (!preg_match('/'.$userIP.'/i', $row['ip'])) 
		{
			// Will execute when current IP is not in database;			
			$newIP = "$row[ip] $userIP";
			// Combines previous and current user IP address with a separator for updateing in the database;
			$updateQuery = "UPDATE `unique_visitors` set `ip` = '$newIP',`views`=`views`+1 WHERE `date`='$date'";
			mysqli_query($conn,$updateQuery);// Executes update query
		}
	} // Close everything that we've opend and close PHP
?>
<h1>My Page</h1>