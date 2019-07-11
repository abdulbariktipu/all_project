<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("pagination") or die(mysql_error()); 

	if(!empty($_POST['partialStatus']))
	{
		$partialStatus = $_POST['partialStatus'];
		$query = mysql_query("SELECT * FROM `paging_table` WHERE `name`  LIKE '%$partialStatus%'");

		while ($row = mysql_fetch_assoc($query)) 
		{
			echo '<a href="">'.$row['name'].'</a><br>';
		}

	}
?>