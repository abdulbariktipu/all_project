<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function load(){
			//alert("Works");
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById('adiv').innerHTML = xmlhttp.responseText;
				}
			}

			xmlhttp.open('GET', 'include.php', true);
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

	<input type="submit" onclick="load();">
	<br>
	<div id="adiv"></div>
</body>
</html>