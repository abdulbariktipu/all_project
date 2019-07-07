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
		function load(thediv, thefile){
			//alert('Work');
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			}else{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById('thediv').innerHTML = xmlhttp.responseText;
				}
			}

			xmlhttp.open('GET', thefile, true);
			xmlhttp.send();

		}
	</script>
</head>
<body>
	<input type="submit" onclick="load('anotherdiv', 'include.php');">
	<div id="anotherdiv"></div>
</body>
</html>