<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "ajaxdata";

	//Connect to MySQL Server
   	mysql_connect($dbhost, $dbuser, $dbpass);
   
   	//Select Database
   	mysql_select_db($dbname) or die(mysql_error());

	// Retrieve data from queryString
	$user_name = $_GET['u_name'];
	$user_age = $_GET['age'];
	$user_sex = $_GET['sex'];
	$user_wpm = $_GET['wpm'];

// Escape User Input to help prevent SQL Injection
// $user_name = mysql_real_escape_string($user_name);
// $user_age = mysql_real_escape_string($user_age);
// $user_sex = mysql_real_escape_string($user_sex);
// $user_wpm = mysql_real_escape_string($user_wpm);
   
   //build query
   $query = "SELECT * FROM ajax_example WHERE sex = '$user_sex' or name='$user_name'";
   
   if(is_numeric($user_age))
   $query .= " AND age <= $user_age";
   
   if(is_numeric($user_wpm))
   $query .= " AND wpm <= $user_wpm";
   
   //Execute query
   $qry_result = mysql_query($query) or die(mysql_error());
   
   //Build Result String
   $display_string = "<table>";
   $display_string .= "<tr>";
   $display_string .= "<th>Name</th>";
   $display_string .= "<th>Age</th>";
   $display_string .= "<th>Sex</th>";
   $display_string .= "<th>WPM</th>";
   $display_string .= "</tr>";
   
   // Insert a new row in the table for each person returned
   while($row = mysql_fetch_array($qry_result)) {
      $display_string .= "<tr>";
      $display_string .= "<td>$row[name]</td>";
      $display_string .= "<td>$row[age]</td>";
      $display_string .= "<td>$row[sex]</td>";
      $display_string .= "<td>$row[wpm]</td>";
      $display_string .= "</tr>";
   }
   echo "Query: " . $query . "<br />";
   
   $display_string .= "</table>";
   echo $display_string;
?>