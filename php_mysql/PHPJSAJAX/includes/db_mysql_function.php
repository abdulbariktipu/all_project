<?php
//error_reporting (0);
function connect( $server='localhost', $user='root', $passwd='', $db_name='classicmodels' ) 
{
	$con = mysql_connect( $server, $user, $passwd );
	if(!$con)
	{
		trigger_error("Problem connecting to server");
	}
	$DB =  mysql_select_db($db_name, $con);
	if(!$DB)
	{
		trigger_error("Problem selecting database");
	}
	//mysql_query("START TRANSACTION");
	return $con;
}

function sql_select($strQuery)
{ 

	$con = connect(); 
	$result_select = mysql_query( $strQuery );
	
	$rows = array();
	while( $row = mysql_fetch_array( $result_select ))
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
	$discdb = mysql_close($con);
	if(!$discdb)
	{
		trigger_error("Problem disconnecting database");
	}	
}
?>