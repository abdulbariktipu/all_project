<?php

    //$X=10;

	$database = 'localhost';
	$username = 'root';
	$passw = '';
	$db_name = 'countrycityarea';
	$conn = mysql_connect($database, $username, $passw) && mysql_select_db($db_name);
	if (!$conn) {
		echo 'Can not be connected';
	} else {
		//echo 'Connected';
	}
?>