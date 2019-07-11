<!DOCTYPE html>
<html>
<head>
	<title>MD5 Password</title>
</head>
<body>
	<?php
	$string = 'password';
	//echo md5($string);
		if (isset($_POST['submit'])&&!empty($_POST['password'])) {
			$user_pass = $_POST['password'];
			$filename = 'hash.txt';
			$handle = fopen($filename, 'r');
			$file_password = fread($handle, filesize($filename)); 

			if ($user_pass==$file_password) {
				echo 'ok';
			}else{
				echo 'Incorrect password';
			}

		}else{
			echo 'Please enter a password';
		}
	?>

	<form action="" method="post">
		<input type="text" name="password">
		<input type="submit" name="submit" value="Enter">
	</form>
</body>
</html>