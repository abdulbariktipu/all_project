<?php
	include ('dbconn.php');

	if (isset($_POST['submit'])) {
		$country_name = $_POST['country_name'];

		$result = mysql_query("INSERT INTO country (country_name) VALUES ('$country_name')");
	}

?>

<form action="" method="post">
	Country name: <input type="type" name="country_name" id="country_name">
	<input type="submit" name="submit" value="Insert">
</form>