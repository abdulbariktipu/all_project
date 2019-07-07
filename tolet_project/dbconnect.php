<?php
$server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "tolet_project";

$con = @mysql_connect($server,$db_user,$db_pass) && @mysql_select_db($db_name);

if(!$con)
{
    echo"can not be connected";
}
else{
    //echo "connected";
}
?>