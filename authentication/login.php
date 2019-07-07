<!DOCTYPE html>
<html>
<head>
	<title>PHP MYSQL user authentication</title>
</head>
<body>
	<?php
	    $server = "localhost";
	    $db_user = "root";
	    $db_pass = "";
	    $db_name = "authentication";
	    $conn = mysql_connect($server,$db_user,$db_pass)&& mysql_select_db($db_name);
		
		if(isset($_POST['login_btn'])){
	    $username = $_POST['username'];
	    $password = $_POST['password'];
	    $query = "SELECT * FROM user WHERE username='$username' and password='$password'";
	    $result = mysql_query($query);
	    if (mysql_num_rows($result)==1) {
	    	session_start();
	    	$_SESSION['username'] = $username;//Seession User line
	    	echo 'Login Successfull';
	    	header('location:index.php');
	    }else{
	    	echo 'Wrong username or password';
	    }
	}
	?>

	<h1>Login</h1>
	<form action="" method="post">
		User Name: 
		<input type="text" name="username"><br>
		Password:
		<input type="password" name="password"><br>
		<input type="submit" name="login_btn" value="Login"><br>
	</form>
</body>
</html>
