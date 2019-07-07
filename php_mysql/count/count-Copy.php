<?php
   
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $dbname = "ajaxdata";
   
   //Connect to MySQL Server
   mysql_connect($dbhost, $dbuser, $dbpass);
   
   //Select Database
   mysql_select_db($dbname) or die(mysql_error());

   $query = "SELECT * FROM ajax_example";
   $qry_result = mysql_query($query) or die(mysql_error());

   while($row = mysql_fetch_array($qry_result)) 
   {
   	//print_r($row);
      echo count($row[name]);
      $row[1];
      $row[2];
      $row[3];
      $row[4];
      foreach ($row as $key => $value) 
      {
         //echo $value.'<br>';
      }
      
   }

   ?>