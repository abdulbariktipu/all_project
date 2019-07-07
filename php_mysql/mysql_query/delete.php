<?php
    $server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "classicmodels";
    
    $con = mysql_connect($server,$db_user,$db_pass) && mysql_select_db($db_name);
    
    if(!$con)
    {
        echo "can not be connected";
    }
    else{
        //echo "connected";
    }
?>
<!--delete query-->
  <?php
    if(isset($_GET['delete_id'])){
        $customerNumber=$_GET['delete_id'];
        $sql=mysql_query(" DELETE FROM customers where customerNumber=$customerNumber"); 
        if($sql){
          header("location:query_test.php"); 
        }
      }
  ?>
<!--delete query end-->