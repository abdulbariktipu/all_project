

<?php
	$user_name = "root";
	$password = "";
	$database = "mydatabase";
	$server = "localhost";

	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);


	if (isset($_GET['Update'])) {

		//print_r($_POST);
		$id = $_GET['edit'];
		$res = mysql_query("SELECT * FROM active");
		$row = mysql_fetch_assoc($res);
		while ( $row = mysql_fetch_assoc($result) )
	{ 
		echo $row;
	}

	}
?>

<form role="form"  method="POST" action="index.php">
	<label>Status</label>
	<input type="text" name="people" value="<?php echo $id?>">
	<input type="hidden" name="id" value="<?php echo $row[0]?>">
	<input type="submit" name="update" value="Update"/>
</form>




