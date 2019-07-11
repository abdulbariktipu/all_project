<!DOCTYPE html>
<html>
<head>
	<title>Auto Suggest</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>  
$(document).ready(function(){  
    $("div").keyup(function(){  
        $("#results").fadeIn(3000);  
        // $("#div2").fadeIn("slow");  
        // $("#div3").fadeIn(3000);  
    });  
});  
</script>  
	<script type="text/javascript">
		function findmatch(){
			if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
			}else {
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById('results').innerHTML = xmlhttp.responseText;
				}
			}

			xmlhttp.open('GET', 'search.php?search_text='+document.search.search_text.value, true);
			xmlhttp.send();
		}
	</script>
</head>
<body>
	<form id="search" name="search">
		Type a name:<br>
		<input type="text" name="search_text" onkeyup="findmatch();">
		<div id="results"></div>
	</form>
</body>
</html>