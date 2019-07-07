<?php
	require('connection.php');
?>

<?php
	$query = "SELECT `people`.`name`, `pets`.`pet` FROM people JOIN pets ON `people`.`id`=`pets`.`people_id`";
	$result = mysql_query($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Left Join</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Name</th>
			<th>Pet</th>
		</tr>
		<?php
			if (mysql_num_rows($result) > 0) {
				while ($row = mysql_fetch_array($result)) {
			?>		
			<tr>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo $row['pet'] ?></td>
			</tr>
			<?php		
				}
			}
			?>
	</table>
</body>
</html>

<h1>My Page</h1>