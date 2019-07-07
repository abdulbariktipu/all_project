<?php
	//fetch.php  
	$connect = mysqli_connect("localhost", "root", "", "ajaxdata");
	$sql="SELECT * from autorefresh";
	$sql_res=mysqli_query($connect,$sql);
	while ( $row=mysqli_fetch_array($sql_res)) 
	{
		echo $row['id'].'='.$row['user'].'='.$row['message'].'<br>';
	}
?>