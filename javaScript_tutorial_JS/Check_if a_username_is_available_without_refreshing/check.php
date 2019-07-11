<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		mysql_connect("localhost","root","");
		mysql_select_db("ajaxdata");

		$username = "";
		@$username = mysql_real_escape_string($_POST['username']);
		$check = mysql_query("SELECT username FROM users WHERE username='$username'");
		$check_num_rows = mysql_num_rows($check); // echo 

		if ($username==null) {
			echo "Choose a username";
		}
		else if (strlen($username)<=3) {
			echo "Too short";
		}
		else {
			if ($check_num_rows==0) {
				echo "Available";
			}
			else if($check_num_rows==1){
				echo "Not Available";
			}
		}
	?>
</body>
</html>