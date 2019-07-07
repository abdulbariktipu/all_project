<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "ajaxdata";

	//Connect to MySQL Server
   	mysql_connect($dbhost, $dbuser, $dbpass);
   
   	//Select Database
   	mysql_select_db($dbname) or die(mysql_error());
   
   //build query
   $query = "SELECT * FROM lib_supplier where type=2";
   $sql = "SELECT id,supplier_name,type FROM lib_supplier WHERE FIND_IN_SET(2, type)";
   $sql_query='SELECT * FROM author WHERE aut_name LIKE "%2%"';

   
   //Execute query
   $qry_result = mysql_query($sql);
   
   // Insert a new row in the table for each person returned
   while($row = mysql_fetch_array($qry_result)) 
   {
     echo $row['id'];
     echo $row['supplier_name'];
     echo $row['type']."<br>";
   }
?>