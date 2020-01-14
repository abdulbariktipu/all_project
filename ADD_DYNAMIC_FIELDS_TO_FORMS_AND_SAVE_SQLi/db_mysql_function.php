<?php
//error_reporting (0);
function connect( $server='localhost', $user='root', $passwd='', $db_name='addmore' ) 
{
	$con = mysqli_connect( $server, $user, $passwd );
	if(!$con)
	{
		trigger_error("Problem connecting to server");
	}
	$DB =  mysqli_select_db($con, $db_name);
	if(!$DB)
	{
		trigger_error("Problem selecting database");
	}
	//mysqli_query("START TRANSACTION");
	return $con;
}

function sql_select($strQuery)
{ 

	$con = connect(); 
	$result_select = mysqli_query($con, $strQuery );
	
	$rows = array();
	while( $row = mysqli_fetch_array( $result_select ))
	{
		if($row==1) 
		{
			$rows[] = $row;
			return $rows;
			disconnect($con);
			die;
		}
		else
			$rows[] = $row;
	}
	return $rows;
	disconnect($con);
	die;
}
function disconnect($con) 
{
	$discdb = mysqli_close($con);
	if(!$discdb)
	{
		trigger_error("Problem disconnecting database");
	}	
}
?>