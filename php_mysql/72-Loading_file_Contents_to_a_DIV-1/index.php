<!-- <?php
	// if (isset($_GET['show'])) {
	// 	include $_GET['show'];
	//}
?>
<input type="submit" onclick="window.location='index.php?show=include.php'" name=""> -->


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function load(){
			alert('Work');
		}
	</script>
</head>
<body>
	<input type="submit" onclick="load();">
	<div id="adiv"></div>
</body>
</html>