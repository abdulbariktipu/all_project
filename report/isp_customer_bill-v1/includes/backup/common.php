<?php
error_reporting(0);
date_default_timezone_set("Asia/Dhaka");

$select_job_year_all=0;


 //require_once('db_functions_mysql.php');
 //require_once('db_functions_mssql.php');
require_once('db_mysql_function.php');
include('common_functions.php');
include('array_function.php');

$pc_time= date("H:i:s",time());

if($db_type==0) $pc_date_time = date("Y-m-d H:i:s",time());
	else $pc_date_time = date("d-M-Y h:i:s A",time());

		if($db_type==0) $pc_date = date("Y-m-d",time());
		else $pc_date = date("d-M-Y",time());

function sql_insertss( $strTable, $arrNames, $arrValues, $commit, $contain_lob )
{
	global $con ;
	if($contain_lob=="") $contain_lob=0;
	if( $contain_lob==0)
	{
		$tmpv=explode(")",$arrValues);
		if(count($tmpv)>2)
			$strQuery= "INSERT ALL \n";
		else
			$strQuery= "INSERT  \n";

		for($i=0; $i<count($tmpv)-1; $i++)
		{
			if( strpos(trim($tmpv[$i]), ",")==0)
				$tmpv[$i]=substr_replace($tmpv[$i], " ", 0, 1);
			$strQuery .=" INTO ".$strTable." (".$arrNames.") values ".$tmpv[$i].") \n";
		}

		if(count($tmpv)>2) $strQuery .= "SELECT * FROM dual";
	   //return $strQuery ;
	}
	else
	{
		$tmpv=explode(")",$arrValues);

		for($i=0; $i<count($tmpv)-1; $i++)
		{
			$strQuery="";
			$strQuery= "INSERT  \n";
			if( strpos(trim($tmpv[$i]), ",")==0)
				$tmpv[$i]=substr_replace($tmpv[$i], " ", 0, 1);
			$strQuery .=" INTO ".$strTable." (".$arrNames.") values ".$tmpv[$i].") \n";
			return $strQuery ;
			$stid =  oci_parse($con, $strQuery);
			$exestd=oci_execute($stid,OCI_NO_AUTO_COMMIT);
			if (!$exestd) return "0";
		}
		return "1";

	}
    //return  $strQuery; die;
	echo $strQuery;die;
	//$_SESSION['last_query']=$_SESSION['last_query'].";;".$strQuery;



	$stid =  oci_parse($con, $strQuery);
	$exestd=oci_execute($stid,OCI_NO_AUTO_COMMIT);
	if ($exestd)
		return "1";
	else
		return "0";
	die;

	if ( $commit==1 )
	{
		if (!oci_error($exestd))
		{
			$pc_time= add_time(date("H:i:s",time()),360);
			$pc_date_time = date("d-M-Y h:i:s",strtotime(add_time(date("H:i:s",time()),360)));
			$pc_date = date("d-M-Y",strtotime(add_time(date("H:i:s",time()),360)));

			$strQuery= "INSERT INTO activities_history ( session_id,user_id,ip_address,entry_time,entry_date,module_name,form_name,query_details,query_type) VALUES ('".$_SESSION['logic_erp']["history_id"]."','".$_SESSION['logic_erp']["user_id"]."','".$_SESSION['logic_erp']["pc_local_ip"]."','".$pc_date_time."','".$pc_date."','".$_SESSION["module_id"]."','".$_SESSION['menu_id']."','".encrypt($_SESSION['last_query'])."','0')";
			$resultss=oci_parse($con, $strQuery);
			oci_execute($resultss);
			$_SESSION['last_query']="";
			//oci_commit($con);
			return "0";
		}
		else
		{
			//oci_rollback($con);
			return "10";
		}
	}
	else return 1;
	die;
}

function mail_header()
{
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: platform_erp@asrotex.com' . "\r\n"; // Sender's Email Address
	$headers .= 'Return-Path: Admin <platform_erp@asrotex.com> /n'; // Indicates Return-path
	$headers .= 'Reply-To: Admin <platform_erp@asrotex.com> /n'; // Reply-to Address
	$headers .= 'X-Mailer: PHP/' . phpversion(); // For X-Mailer
	return $headers;
}

/**
 * [send_mail_mailer This method is responsible for sending SMTP authenticated auto mail]
 * @param  [string] $to       [defining receiver email]
 * @param  [string] $sub      [defining subject of the email]
 * @param  [string] $html     [defining body of the email]
 * @param  [string] $from     [defining sender email]
 * @param  [string] $host     [defining host name]
 * @param  [string] $username [defining smtp authenticated email username]
 * @param  [string] $pass     [defining smtp authenticated email password]
 * @return [string]           [defining email sending status]
 */
function send_mail_mailer($to, $sub, $html, $from){

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = '465'; //secure transfer enabled REQUIRED for Gmail
	$mail->Host = "mail.logicsoftbd.com";
	$mail->Port = '465'; // or 587
	$mail->IsHTML(true);
	$mail->Username = "info@logicsoftbd.com";
	$mail->Password = "asro@2018";

	if( $from=="" ) $from='info@logicsoftbd.com';
	$mail->setFrom( $from, 'PLATFORM ERP');
	$mail->addReplyTo( $from, 'PLATFORM ERP');
	$mail->Subject = $sub;
	$mail->AltBody = 'MAIL GENERATED FROM PLATFORM SERVER';
	$mail->Body = $html;
	$tos=explode(",",$to);
	for($i=0; $i<count($tos); $i++)
	{
		if( $tos[$i]!="") $mail->AddAddress($tos[$i],"PLATFORM USER");
	}

	if (!$mail->send()) {
		echo "****Mail Not Sent.---".date("Y-m-d");
	} else {
		echo "****Mail Sent.---".date("Y-m-d");
	}
}





?>