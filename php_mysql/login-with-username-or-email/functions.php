<?php
//databse settings
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'rasoft');

$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
mysql_query ("set character_set_results='utf8'");


function cleanInput($text)
{
	//strip tags
	$text = strip_tags($text);
	$text = trim($text);
	return $text;
}

function Is_email($user)
{
	//If the username input string is an e-mail, return true 
	if(filter_var($user, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}