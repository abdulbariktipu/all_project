<?php
$db_server = ('localhost');
$db_user = ('root');
$db_pass = ('');
$db_database = ('test');
$connection = mysql_connect($db_server, $db_user, $db_pass) or die(mysql_error());
$database = mysql_select_db($db_database) or die(mysql_error());

if(!$database){
	echo 'error';
}
?>