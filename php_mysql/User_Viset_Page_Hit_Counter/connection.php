<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database_name = 'a_database';

$conn = mysql_connect($host, $user, $pass) && mysql_select_db($database_name);

if (!$conn) {
	echo '<b>Please check Database connection<b>';
	//echo 'Connect';
}
?>