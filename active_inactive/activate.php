<?php
//file name may be Active.php
//$status =  $_GET['status'];
$status =  trim($_GET['status']);
$con=mysqli_connect("localhost","root","","mydatabase");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " .mysqli_connect_error();
  }
if($status == 'Active')
{
    mysqli_query($con,"UPDATE `active` SET `status` = 'Inactive'");
}
else
{
    mysqli_query($con,"UPDATE `active` SET `status` = 'Active'");
}
header('location:index.php');
mysqli_close($con);
?> 