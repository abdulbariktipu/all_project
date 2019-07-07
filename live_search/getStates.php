<?php
mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('pagination') or die(mysql_error());

		//include 'connect.php';
		$partialStates = $_POST['partialStates'];
		$states = mysql_query("SELECT * FROM `paging_table` WHERE `name` LIKE '%$partialStates%'");
		//$result = mysql_query($query);
		while ($states = mysql_fetch_array($states)) 
		{
			echo '<a>'.$states['name'].'</a>';
		}
	
?>
