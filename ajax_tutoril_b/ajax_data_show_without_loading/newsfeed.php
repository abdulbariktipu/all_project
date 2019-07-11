

<?php
	//echo "hi from php";

	$username = "root";
	$password = "";
	$hostname = "localhost";	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");	
	$selected = mysql_select_db("ajaxdata", $dbhandle);

	$query = "SELECT * FROM statuses";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)) 
	{
	 //echo $row['id'].'<br>';
	 //echo $row['status'];
	}
	
?>