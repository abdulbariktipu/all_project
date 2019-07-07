<?php
//including the database connection file
include("config.php");
 
//getting id of the data from url
$delete_id = $_GET['delete'];
 
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$delete_id");
 
//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>