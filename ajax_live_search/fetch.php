<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("pagination");

	//include 'connect.php';
	if(!empty($_GET['q']))
	{
		//include 'connect.php';
		$q = $_GET['q'];
		$query = mysql_query("SELECT * FROM `paging_table` WHERE `name`  LIKE '%$q%'");

		while ($row = mysql_fetch_assoc($query)) 
		{
			echo '<a href="">'.$row['name'].'</a>';
		}

	}
?>