<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		if (isset($_GET['show'])) {
			include $_GET['show'];
		}
	?>

	<input type="submit" onclick="window.location='172Loading_ file_Contents-1.php?show=include.php'">
</body>
</html>