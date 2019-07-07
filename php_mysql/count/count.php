<?php
   
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "ajaxdata";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());


   $sql = "select count(id) as id, count(name) as name from ajax_example";
   $sql_result = mysql_query($sql) or die(mysql_error());
   //$name_count = count($sql_result);

   while ($row = mysql_fetch_array($sql_result)) 
   {
   	
   	echo $name_count = 'Name: '.$row['name'].'<br>';
   	echo $id_count = 'Id: '.$row['id'].'<br>';
   	
	   	if ($id_count == 8) {
	   	echo 'if';
	   }
	   else
	   {
	   		echo 'else';
	   }
   }
   
   //echo $name_count;

   $query = "SELECT * FROM ajax_example";
   $qry_result = mysql_query($query) or die(mysql_error());

   $display_string = "<table>";
   $display_string .= "<tr>";
   $display_string .= "<th>Name</th>";
   $display_string .= "<th>Age</th>";
   $display_string .= "<th>Sex</th>";
   $display_string .= "<th>WPM</th>";
   $display_string .= "</tr>";
   while($row = mysql_fetch_array($qry_result)) 
   {
      $display_string .= "<tr>";
      $display_string .= "<td>$row[name]</td>";
      $display_string .= "<td>$row[age]</td>";
      $display_string .= "<td>$row[sex]</td>";
      $display_string .= "<td>$row[wpm]</td>";
      $display_string .= "</tr>";
   }
   $display_string .= "</table>";
   echo $display_string;
   echo "Query: " . $query . "<br />";
   ?>