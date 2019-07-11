<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function load(thediv, thefile){
			//alert("Works");
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();// variable is xmlhttp
			} else {
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById(thediv).innerHTML = xmlhttp.responseText;
				}
			}

			xmlhttp.open('POST', thefile, true);//GET
			xmlhttp.send();

		}
	</script>
</head>
<body>

	<?php
		if (isset($_GET['show'])) {
			include $_GET['show'];
		}
	?>

	<input type="submit" onclick="load('anotherdiv', 'include.php');">
	<br>
	<div id="anotherdiv"></div>
</body>
</html>