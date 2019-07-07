<?php
	/*CREATE TABLE `ajaxdata`.`test` (
	  `id` INT (11) NOT NULL AUTO_INCREMENT,
	  `name` INT (50) NOT NULL,
	  `email` INT (50) NOT NULL,
	  `gender` INT (100) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE = INNODB ;*/
	include('dbconnect.php');
	if (isset($_POST['insert_table']))
	{
		$table_name=mysql_real_escape_string($_POST['table_name']);
		$input_id=mysql_real_escape_string($_POST['input_id']);
		$col_one=mysql_real_escape_string($_POST['col_one']);
		$col_two=mysql_real_escape_string($_POST['col_two']);

		$query = "CREATE TABLE `ajaxdata`.`$table_name` (
			`$input_id` INT (11) NOT NULL AUTO_INCREMENT,
			`$col_one` INT (50) NOT NULL,
			`$col_two` INT (50) NOT NULL,
			PRIMARY KEY (`$input_id`)
		)";
        echo $query;//output and check your query
        mysql_query($query);
	}
?>




<!DOCTYPE html>
<html>
<head>
	<title>Table Create</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="table_name" id="table_name">
		<input type="text" name="input_id" id="input_id">
		<input type="text" name="col_one" id="col_one">
		<input type="text" name="col_two" id="col_two">
		<input type="submit" name="insert_table" value="Create Table">
	</form>
	
</body>
</html>