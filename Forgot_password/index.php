<?php
session_start();
include_once 'database.php';
$message = '';
$invalid ='';
if(isset($_POST['submit']))
{
	$user_id = "";
	mysql_connect("localhost", "root", "") or die();
	mysql_select_db("library") or die();
	$user_id = $_REQUEST["user_id"];
	//echo $email; die();
	$query = mysql_query("select * from users where sid='$user_id'");
	$row = mysql_fetch_array($query);
	$fetch_user_id=$row['sid'];
	$email_id=$row['email'];
	$password=$row['password'];
	if($user_id==$fetch_user_id) {
		$to = $email_id;
		$subject = "Password";
		$txt = "Your password is : $password";
		$headers = "From: noreplaymail69@gmail.com" . "\r\n" .
		"CC: somebodyelse@example.com";
		mail($to,$subject,$txt,$headers);
		 $message='<div class="alert alert-success">Message Sent!</div>';
	}
	else{
		$invalid='<div class="alert alert-success">Invalid User ID! Message Not Sent!</div>';
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
	input{
		border:1px solid olive;
		border-radius:5px;
	}
	h1{
		color:darkgreen;
		font-size:22px;
		text-align:center;
	}
</style>
</head>
	<body>
		<h1>Forgot Password<h1>
		<form action='' method='post'>
			<table cellspacing='5' align='center'>
				<div class="alert col-sm-4 col-sm-offset-4">
	            	<span id="slide" style="text-align: center;"><?php echo "$message"; ?></span>
	            	<span id="slide" style="text-align: center; color: red"><?php echo "$invalid"; ?></span>
	        	</div>
				<tr><td>user id:</td><td><input type='text' name='user_id'/></td></tr>
				<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
			</table>
		</form>
	</body>
</html>