<!DOCTYPE html>
<html>
<head>
	<title>Instant Search Tutorial</title>
</head>
<body>
	<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("pagination");

	$search = mysql_real_escape_string(htmlentities(trim($_POST['searchterm'])));
	$find_video = mysql_query("SELECT * FROM `paging_table` WHERE `name` LIKE '%$search%'");
	while ($row = mysql_fetch_assoc($find_video)) 
	{
		$name = $row['name'];
		echo "$name<br>";
	}
	?>
</body>
</html>