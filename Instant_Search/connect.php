<?php
/* Title : Ajax Pagination with jQuery & PHP
Example URL : http://www.sanwebe.com/2013/03/ajax-pagination-with-jquery-php */

$db_username 		= 'root'; //database username
$db_password 		= ''; //dataabse password
$db_name 			= 'pagination'; //database name
$db_host 			= 'localhost'; //hostname or IP
//$item_per_page 		= 5; //item to display per page

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die("error");
//Output any connection error


?>