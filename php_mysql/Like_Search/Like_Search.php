<?php
	require('connection.php');

	if (isset($_POST['search_name'])) {
		$search_name = $_POST['search_name'];
		if (!empty($search_name)) {
			//echo 'ok';
			if (strlen($search_name)>=4) { //
				
				$query = "SELECT name FROM people WHERE name LIKE '%".mysql_real_escape_string($search_name)."%'";
				$query_run = mysql_query($query);

				$query_num_rows = mysql_num_rows($query_run);// Total found result count

				if ($query_num_rows>=1) {//if (mysql_num_rows($query_run)>=1) {
					echo $query_num_rows.' Results found:<br>';
					while ($query_row = mysql_fetch_assoc($query_run)) {
						echo $query_row['name'].'<br>';
					}
				}else {
					echo 'No record found';
				}

		}else{
			echo 'Your keyword must be 4 characters or more';
		}

		}else {
			echo 'Please input';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>
	<form action="" method="post">
		Name: <input type="text" name="search_name">
		<input type="submit" value="Search" name="submit">
	</form>
</body>
</html>