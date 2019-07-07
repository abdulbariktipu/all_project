<?
header('Content-type:text/html; charset=utf-8');
session_start();
if( $_SESSION['logic_erp']['user_id'] == "" ) header("location:login.php");

include('../../../includes/common.php');

$data=$_REQUEST['data'];
$action=$_REQUEST['action'];

if ($action=="load_drop_down_location")
{
	echo create_drop_down( "cbo_location_name", 262, "select location_name,id from lib_location where company_id='$data' and is_deleted=0  and status_active=1  order by location_name",'id,location_name', 1, '--- Select Location ---', 0, ""  );
}

if ($action=="productionfloor_list_view")
{
	$arr=array(3=>$production_process,4=>$row_status);
	echo  create_list_view ( "list_view", "Company Name,Location Name,Floor Name,Prod. Process,Status", "150,100,100,100,50","600","220",1, "select c.company_name,l.location_name,a.floor_name,a.status_active, a.production_process, a.id from  lib_prod_floor a, lib_company c, lib_location l  where a.company_id=c.id and a.location_id=l.id and a.is_deleted=0 order by a.floor_name", "get_php_form_data", "id","'load_php_data_to_form'", 1, "0,0,0,production_process,status_active", $arr , "company_name,location_name,floor_name,production_process,status_active", "../production/requires/production_floor_controller", 'setFilterGrid("list_view",-1);' ) ;		
}

if ($action=="load_php_data_to_form")//load list view data to the form
{
	$nameArray=sql_select( "select company_id, location_id, floor_name,floor_serial_no, production_process,status_active,id from lib_prod_floor where id='$data'" );
	foreach ($nameArray as $inf)
	{
		echo "load_drop_down( 'requires/production_floor_controller', '".($inf[csf("company_id")])."', 'load_drop_down_location', 'location' );\n";
		echo "document.getElementById('cbo_company_name').value = '".($inf[csf("company_id")])."';\n";    
		echo "document.getElementById('cbo_location_name').value  = '".($inf[csf("location_id")])."';\n"; 
		echo "document.getElementById('txt_floor').value  = '".($inf[csf("floor_name")])."';\n";
		echo "document.getElementById('txt_floor_sequence').value  = '".($inf[csf("floor_serial_no")])."';\n";
		echo "document.getElementById('cbo_production_process').value  = '".($inf[csf("production_process")])."';\n";
		echo "document.getElementById('cbo_status').value  = '".($inf[csf("status_active")])."';\n";
		echo "document.getElementById('update_id').value  = '".($inf[csf("id")])."';\n"; 
		echo "set_button_status(1, '".$_SESSION['page_permission']."', 'fnc_product_floor_info',1);\n";  
	}
}

if ($action=="save_update_delete")
{
	$process = array( &$_POST );
	extract(check_magic_quote_gpc( $process )); 
	
	if ($operation==0)  // Insert Here
	{
		if (is_duplicate_field( "floor_name", "lib_prod_floor", " floor_name=$txt_floor and company_id=$cbo_company_name and location_id=$cbo_location_name and is_deleted=0" ) == 1)
		{
			echo "11**0"; die;
		}
		else
		{
			$con = connect();
			if($db_type==0)
			{
				mysql_query("BEGIN");
			}
			$id=return_next_id( "id", "lib_prod_floor", 1 ) ;
			$field_array="id,company_id,location_id,floor_name,floor_serial_no,production_process,inserted_by,insert_date,status_active,is_deleted";
			$data_array="(".$id.",".$cbo_company_name.",".$cbo_location_name.",".$txt_floor.",".$txt_floor_sequence.",".$cbo_production_process.",".$_SESSION['logic_erp']['user_id'].",'".$pc_date_time."',".$cbo_status.",0)";
			$rID=sql_insert("lib_prod_floor",$field_array,$data_array,1);
			if($db_type==0)
			{
				if($rID ){
					mysql_query("COMMIT");  
					echo "0**".$rID;
				}
				else{
					mysql_query("ROLLBACK"); 
					echo "10**".$rID;
				}
			}
			if($db_type==2 || $db_type==1 )
			{
				 if($rID )
					{
						oci_commit($con);   
						echo "0**".$rID;
					}
				else{
						oci_rollback($con);
						echo "10**".$rID;
					}
			}
			disconnect($con);
			die;
		}
	}
	else if ($operation==1)   // Update Here
	{
		if (is_duplicate_field( "floor_name", "lib_prod_floor", " floor_name=$txt_floor and company_id=$cbo_company_name and location_id=$cbo_location_name and id!=$update_id and is_deleted=0" ) == 1)
		{
			echo "11**0"; die;
		}
		else
		{
			$con = connect();
			if($db_type==0)
			{
				mysql_query("BEGIN");
			}
			$field_array="company_id*location_id*floor_name*floor_serial_no*production_process*updated_by*update_date*status_active*is_deleted";
			$data_array="".$cbo_company_name."*".$cbo_location_name."*".$txt_floor."*".$txt_floor_sequence."*".$cbo_production_process."*".$_SESSION['logic_erp']['user_id']."*'".$pc_date_time."'*".$cbo_status."*0";
			$rID=sql_update("lib_prod_floor",$field_array,$data_array,"id","".$update_id."",1);
			if($db_type==0)
			{
				if($rID ){
					mysql_query("COMMIT");  
					echo "1**".$rID;
				}
				else{
					mysql_query("ROLLBACK"); 
					echo "10**".$rID;
				}
			}
			if($db_type==2 || $db_type==1 )
			{
			 if($rID )
			    {
					oci_commit($con);   
					echo "1**".$rID;
				}
				else{
					oci_rollback($con);
					echo "10**".$rID;
				}
			}
		   disconnect($con);
		   die;
		}
	}
	else if ($operation==2)   // Update Here
	{
		$con = connect();
		if($db_type==0)
		{
			mysql_query("BEGIN");
		}
		$field_array="updated_by*update_date*status_active*is_deleted";
	    $data_array="".$_SESSION['logic_erp']['user_id']."*'".$pc_date_time."'*'0'*'1'";
		
		$rID=sql_delete("lib_prod_floor",$field_array,$data_array,"id","".$update_id."",1);
		
		if($db_type==0)
		{
			if($rID ){
				mysql_query("COMMIT");  
				echo "1**".$rID;
			}
			else{
				mysql_query("ROLLBACK"); 
				echo "10**".$rID;
			}
		}
		if($db_type==2 || $db_type==1 )
			{
			 if($rID )
			    {
					oci_commit($con);   
					echo "2**".$rID;
				}
				else{
					oci_rollback($con);
					echo "10**".$rID;
				}
			}
		disconnect($con);
		die;
	}
}
?>