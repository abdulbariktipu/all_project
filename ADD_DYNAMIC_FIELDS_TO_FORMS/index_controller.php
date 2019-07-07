<?php
	//error_reporting (0);
	require_once('db_mysql_function.php');
	$action=$_REQUEST['action'];
	$row_num=$_REQUEST['row_num'];
	function check_magic_quote_gpc( $data )
	{
		$data_array=array();
		$process = array( &$_POST );
		while (list($key, $val) = each($process)) 
		{
			foreach ($val as $k => $v) 
			{
				$data_array[$k]= ($v);
				unset($process[$key][$k]);
			}
		}
		return $data_array;
	}

	function return_next_id( $field_name, $table_name, $max_row=1)
	{
		$increment=1;
		$queryText="select max(".$field_name.") as ".$field_name."  from ".$table_name." "  ;
		$nameArray=sql_select( $queryText);
		//print_r($nameArray);die;
		foreach ($nameArray as $result)
		{
			return ($result[$field_name]+$increment);
		}
	}

	if ($action=='save_update_delete_dtls') 
	{
		extract(check_magic_quote_gpc($process));
		//$process = array(&$_POST);
		// print_r($process);die;
		$dtls_id = return_next_id("id", "inventory", 1);
		$field_array = "id,make,model";
		// echo "10**$dtls_id";die;
		for ($j = 1; $j <= $row_num; $j++)
		{
			//$txt_item_account=$process[0]['txt_item_account_'.$j].',';

			$txt_item_account = "txt_item_account_" . $j;
			$txt_item_dtls = "txt_item_dtls_" . $j;

			if ($data_array != "") $data_array .= ",";
				$data_array .= "(" . $dtls_id . "," . $$txt_item_account . "," . $$txt_item_dtls . ")";
				$dtls_id++;

			$unique='';
			if ($unique != "") $unique .= ",";
				$unique .= $$txt_item_account;
				$dtls_id++;	
		}
		//echo $data_array;
		//echo "INSERT INTO inventory ($field_array) VALUES $data_array";die;
		//echo "SELECT * FROM inventory WHERE make in ($unique)";die;
		$query = mysql_query("SELECT * FROM inventory WHERE make in ($unique)");
		if($row = mysql_num_rows($query) > 0 ) 
		{
			echo "Username already exists!";
		}
		else
		{
			$insert = mysql_query("INSERT INTO inventory ($field_array) VALUES $data_array"); 
			if (!$insert) 
			{
				echo "Registration Error";
			}
			else
			{
				echo "<p>Registration success</p>";
			}
		}
		
		//echo "10**insert into inventory($field_array) values ".$data_array." ";die;
	}
?>