<?php
mysql_connect("localhost", "root", "") or die();
$conn = mysql_select_db("email-to-user-register") or die();
if(!$conn){
die('Could not Connect My Sql:' .mysql_error());
}
?>