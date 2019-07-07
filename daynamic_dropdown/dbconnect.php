<?php
    // $server = "localhost";
    // $db_user = "root";
    // $db_pass = "";
    // $db_name = "dropdowndb";
    
    // $con = mysql_connect($server,$db_user,$db_pass) && mysql_select_db($db_name);
    
    // if(!$con)
    // {
    //     echo "can not be connected";
    // }
    // else{
    //     //echo "connected";
    // }

   $con = mysqli_connect("localhost", "root", "", "dropdowndb");

    //check our connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect:".mysqli_connect_errno();
    }
?>