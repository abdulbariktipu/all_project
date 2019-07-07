

<?php 

if (isset($_POST['user_password'])&&!empty($_POST['user_password'])) {
	$string = $_POST['user_password'];
	$string_hash = md5($string);

	echo $string_hash;
}else{
	echo 'please input password';
}

?>





<form action="md5_pass.php" method="POST">
		Password: <input type="text" name="user_password">
		<input type="submit" value="Submit">
	</form>

