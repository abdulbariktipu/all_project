<?php
	include_once('db.php');

	if( isset($_GET['del']) )
	{
		$id = $_GET['del'];
		$sql= "DELETE FROM apple WHERE id='$id'";
		$res= mysql_query($sql) or die("Failed".mysql_error());
        if($res)
        {
            header('refresh:0; index.php');
        }
	}
?>